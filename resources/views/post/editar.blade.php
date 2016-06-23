@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">


        
          
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Post</div>
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('usuario.index') }}">Usuários</a></li>
                    <li><a href="{{ route('usuario.detalhe',$post->user->id) }}">Detalhe</a></li>
                    <li class="active">Editar</li>
                </ol>
                <div class="panel-body">
                    <p> <b>Usuário: </b> {{$post->user->name}} </p>
                    <form action="{{ route('post.atualizar', $post->id) }}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">

                        <div class="col-xs-2 col-md-2">
                            <a href="#" class="thumbnail">
                              <img src="/{{$post->imagem}}" alt="...">
                            </a>

                            <div class="form-group {{$errors->has('imagem')?'has-error':' '}}">
                                <label for="nome">Alterar Imagem:</label>
                                    <input type="file" name="imagem" id="imagem"  class="form-control" placeholder="Url da Imagem"  >
                                    @if($errors->has('imagem'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('imagem')}} </strong>
                                        </span>
                                    @endif
                            </div>   
                        </div>

                        <div class="col-xs-8 col-md-8">
                              

                            <div class="form-group {{$errors->has('titulo')?'has-error':' '}}">
                                <label for="nome">Título:</label>
                                <input type="text" name="titulo" class="form-control" placeholder="Título do Post" value="{{$post->titulo}}">
                                 @if($errors->has('titulo'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('titulo')}} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('conteudo')?'has-error':' '}}">
                                <label for="nome">Conteúdo:</label>
                                <textarea rows="5" cols="40" name="conteudo" class="form-control"  >{{$post->conteudo}}</textarea>
                                @if($errors->has('conteudo'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('conteudo')}} </strong>
                                    </span>
                                @endif
                            </div>                        
                       </div>

                        <button class="btn btn-info">Atualizar Post</button>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection