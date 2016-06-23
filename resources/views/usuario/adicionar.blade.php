@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <ol class="breadcrumb panel-heading">
                <li><a href="{{ route('usuario.index') }}">Usuários</a></li>
                <li class="active">Adicionar</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Usuário</div>
                
                <div class="panel-body">
                    
                    <form action="{{ route('usuario.salvar') }}" enctype="multipart/form-data" method="post">
                       
                        {{ csrf_field() }}
                        

                        <div class="form-group {{$errors->has('nome')?'has-error':''}}" >
                            <label for="name">Nome:</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do Usuário">
                            @if($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{$errors->first('name')}} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('email')?'has-error':''}}">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail do Usuário">
                            @if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{$errors->first('email')}} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('data_de_nascimento')?'has-error':''}}">
                            <label for="data_de_nascimento">Data de Nascimento:</label>
                            <input data-format="d-m-Y" name="data_de_nascimento" class="form-control" placeholder="dd-mm-yyyy">
                            @if($errors->has('data_de_nascimento'))
                                <span class="help-block">
                                    <strong>{{$errors->first('data_de_nascimento')}} </strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('password')?'has-error':''}}">
                            <label for="password">Senha:</label>
                            <input type="password" name="password" class="form-control" placeholder="Digite sua senha">
                            @if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{$errors->first('password')}} </strong>
                                </span>
                            @endif
                        </div>

                         <div class="form-group {{$errors->has('imagem')?'has-error':''}}">
                            <label for="nome">Foto:</label>
                            <input type="file" name="foto" id="foto" class="form-control" >
                            @if($errors->has('imagem'))
                                <span class="help-block">
                                    <strong>{{$errors->first('imagem')}} </strong>
                                </span>
                            @endif
                        </div>
                        <button class="btn btn-primary">Adicionar Usuário</button>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection