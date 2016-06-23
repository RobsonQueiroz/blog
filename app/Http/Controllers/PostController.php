<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function __construct()
    {
        //não autentica para que os posts sejam exibidos na página inicial
        //as rotas estão responsáveis por fazer esse controle
    	//$this->middleware('auth');
    }
 
    public function index()
    {
        //busca os posts do BD filtrando pelos mais recentes e ativa a paginação
        $posts = \App\Post::orderBy('id', 'DESC')->paginate(5);
        //retorna a página inicial com os dados dos posts
        return view('welcome', compact('posts'));
    }
    //prepara a página com a postagem selecionada
    public function postUnico($id){
        $post = \App\Post::find($id);        
        return view('post-unico', compact('post'));
    }

    public function adicionar($id)
    {
        //busca o usuário autor do post de acordo com o id
    	$usuario = \App\User::find($id);
        //retorna a página para adicionar o post vinculando ao usuário(autor)
    	return view('post.adicionar', compact('usuario'));
    }


    
    public function salvar(\App\Http\Requests\PostRequest $request, $id)
    {
        //file recebe o campo de imagem             
        $file = $request->file('imagem');
        //instancia um novo post
        $post = new \App\Post;
        //verifica se alguma imagem foi enviada
        if($request->hasFile('imagem') && $file->isValid()) {
            //configura a pasta que irá a imagem de acordo com o mês e ano atual
            $pastaDestino = 'img/'.date('Y').'/'.date('m') .'/';
            //adiciona um número random ao nome do arquivo para evitar erros            
            $nomeArquivo = rand(111,999).$file->getClientOriginalName();
            //move o arquivo para a pasta especificada
            $file->move($pastaDestino, $nomeArquivo); 
            //atualiza o campo que será guardado no banco de dados
            $post->imagem = $pastaDestino.$nomeArquivo;
        } else $post->imagem = 'img/padrao.png'; //caso não exista imagem será adicionada uma padrão
        
        //resgata os valores da requisição
    	$post->titulo = $request->input('titulo');
    	$post->conteudo = $request->input('conteudo');
        $post->data_publicacao = date('Y-m-d');//coloca a data atual
        
        //chama o model e passa os dados para serem adicionados no banco
    	\App\User::find($id)->addPost($post);       

        //Atualiza a mensagem para ser exibida na tela
    	\Session::flash('flash_message', [
            'msg'=> "Post adicionado com sucesso!",
            'class'=>"alert-success"
        ]);
        //retorna
        return redirect()->route('usuario.detalhe', $id);    	
    }

    public function atualizar(\App\Http\Requests\PostRequest $request, $id)
    {
        //recebe a imagem
        $file = $request->file('imagem');
        //recebe os dados da requisição para manipulá-los
        $input = $request->all();         
        
        //verifica se o campo imagem contém arquivo e altera a url da imagem no BD
       if($request->hasFile('imagem') && $file->isValid()) {
            $pastaDestino = 'img/'.date('Y').'/'.date('m') .'/';            
            $nomeArquivo = rand(111,999).$file->getClientOriginalName();
            $file->move($pastaDestino, $nomeArquivo); // atualiza local do arquivo
            $input['imagem'] = $pastaDestino.$nomeArquivo;
       }                  
               
        //seleciona o post por id
        $post = \App\Post::find($id);
        //atualiza com os dados alteardos do input
        $post->update($input);
        
        //confirma a atualização
        \Session::flash('flash_message', [
            'msg'=> "Post atualizado com sucesso!",
            'class'=>"alert-success"
        ]);
        //devolve a tela ao usuário
        return redirect()->route('usuario.detalhe', $post->user->id);     
        
    }


    public function editar($id)
    {

        $post = \App\Post::find($id);
        if(!$post){
             \Session::flash('flash_message', [
            'msg'=> "O post que você procura não está disponível.",
            'class'=>"alert-danger"
            ]);
             return redirect()->route('post.adicionar', $post->user->id);
        }
        return view('post.editar', compact('post'));
    }
    

    
    public function deletar(Request $request, $id)
    {
        $post = \App\Post::find($id);       
       
        
        $post->delete();

        \Session::flash('flash_message', [
            'msg'=> "Post deletado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('usuario.detalhe', $post->user->id);
    }
}
