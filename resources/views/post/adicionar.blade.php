@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('usuario.index') }}">Usuários</a></li>
                    <li><a href="{{ route('usuario.detalhe',$usuario->id) }}">Detalhe</a></li>
                    <li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
                    @if (session('erro'))
                            <div class="alert alert-danger">
                                {{session('erro')}}
                            </div>
                    @endif
                     <p> <b>Usuário: </b> {{$usuario->name}} </p>
                    <form action="{{ route('post.salvar', $usuario->id) }}" enctype="multipart/form-data" method="post">
                       
                        {{ csrf_field() }}

                        <div class="form-group {{$errors->has('titulo')?'has-error':''}}">
                            <label for="nome">Título:</label>
                            <input type="text" name="titulo" class="form-control" placeholder="Título do Post">
                            @if($errors->has('titulo'))
                                <span class="help-block">
                                    <strong>{{$errors->first('titulo')}} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('conteudo')?'has-error':''}}">
                            <label for="nome">Conteúdo:</label>
                            <textarea rows="5" cols="40" name="conteudo" class="form-control" placeholder="Corpo do post"></textarea>
                            @if($errors->has('conteudo'))
                                <span class="help-block">
                                    <strong>{{$errors->first('conteudo')}} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('imagem')?'has-error':''}}">
                            <label for="nome">Imagem:</label>
                            <input type="file" name="imagem" id="imagem" class="form-control" >
                            @if($errors->has('imagem'))
                                <span class="help-block">
                                    <strong>{{$errors->first('imagem')}} </strong>
                                </span>
                            @endif
                        </div>
                       
                        <button class="btn btn-info">Adicionar Post</button>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection