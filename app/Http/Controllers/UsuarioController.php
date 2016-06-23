<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	$usuarios = \App\User::paginate(10);
    	
    	return view('usuario.index', compact('usuarios'));
    }
    

    public function adicionar()
    {
        return view('usuario.adicionar');
    }


    public function detalhe($id)
    {
        $usuario = \App\User::find($id);
        return view('usuario.detalhe',compact('usuario'));
    }


    public function salvar(\App\Http\Requests\UsuarioRequest $request)
    {
        $file = $request->file('foto'); //$file recebe imagem enviada
        $table  = new \App\User; //instancia a tabela de novo usuário

        //verifica se existe arquivo e se é um arquivo válido
        if($request->hasFile('foto') && $file->isValid()) {
            $destinationPath = 'img/perfil/'; //caminho que a imagem será salva
            $extension = $file->getClientOriginalExtension(); // pega a extensão da imagem
            $fileName = rand(111,999).$file->getClientOriginalName(); // renomeia a imagem
            $file->move($destinationPath, $fileName); // move o arquivo para a pasta escolhida
            $table->foto = 'img/perfil/ '.$fileName;
        } else $table->foto = 'img/perfil/profile.jpg';               

            
        $table->name = $request->input('name');
        $table->email = $request->input('email');
        $table->password = bcrypt($request->input('senha'));
        $table->remember_token = $request->input('senha');
        $table->data_de_nascimento = $request->input('data_de_nascimento');            
        $table->save(); 


        \Session::flash('flash_message', [
                'msg'=> "Usuário adicionado com sucesso!",
                'class'=>"alert-success"
        ]);

        return redirect()->route('usuario.index');
    }


    public function editar($id)
    {         
        $usuario = \App\User::find($id);
        if(!$usuario){
             \Session::flash('flash_message', [
            'msg'=> "Usuário não está cadastrado! Deseja cadastrar um novo usuário?",
            'class'=>"alert-danger"
            ]);
             return redirect()->route('usuario.adicionar');
        }
        return view('usuario.editar', compact('usuario'));
    }


    public function atualizar(Request $request, $id)
    {
        

        //recebe todos os dados da requisição
        $input = $request->all();
        
        $file = $request->file('foto'); //$file recebe imagem enviada     
        //verifica se existe arquivo e se é um arquivo válido
        if($request->hasFile('foto') && $file->isValid()) {
            $destinationPath = 'img/perfil/'; //caminho que a imagem será salva
            $extension = $file->getClientOriginalExtension(); // pega a extensão da imagem
            $fileName = rand(111,999).$file->getClientOriginalName(); // renomeia a imagem
            $file->move($destinationPath, $fileName); // move o arquivo para a pasta escolhida
            $input['foto'] = 'img/perfil/'.$fileName;
        } else $input['foto'] = 'img/perfil/profile.jpg';

        $input['data_de_nascimento'] = date('Y-m-d', strtotime($input['data_de_nascimento']));
                       
        \App\User::find($id)->update($input);
        
            \Session::flash('flash_message', [
            'msg'=> "Usuário atualizado com sucesso!",
            'class'=>"alert-success"
            ]);

        return redirect()->route('usuario.index');     
        
    }


    public function deletar(Request $request, $id)
    {
        $usuario = \App\User::find($id);
        
        if(!$usuario->deletarPosts())
        {
            \Session::flash('flash_message', [
            'msg'=> "Registro não pode ser deletado",
            'class'=>"alert-danger"
            ]);
            return redirect()->route('usuario.adicionar');
        }
        
        $usuario->delete();

        \Session::flash('flash_message', [
            'msg'=> "Usuário deletado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('usuario.index');
    }
    
}
