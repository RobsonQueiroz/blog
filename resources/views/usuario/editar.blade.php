@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-title">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('usuario.index') }}">Usuários</a></li>
                    <li class="active">Editar</li>
                </ol>

                <div class="panel-body">
                    
                    <form action="{{ route('usuario.atualizar', $usuario->id) }}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">

                        <div class="col-xs-2 col-md-2">
                            <a href="#" class="thumbnail">
                              <img src="/{{$usuario->foto}}" alt="...">
                            </a>
                            <div class="form-group {{$errors->has('foto')?'has-error':''}}">
                            <label for="nome">Foto:</label>
                            <input type="file" name="foto" id="foto" class="form-control" >
                            @if($errors->has('foto'))
                                <span class="help-block">
                                    <strong>{{$errors->first('foto')}} </strong>
                                </span>
                            @endif
                            </div>
                        </div>
                        
                        <div class="col-xs-10 col-md-10">
                            <div class="form-group{{$errors->has('name')?'has-error':''}}">
                                <label for="name">Nome:</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome do Usuário" value="{{$usuario->name}}">
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('name')}} </strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{$errors->has('email')?'has-error':''}}">
                                <label for="email">E-mail:</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail do Usuário" value="{{$usuario->email}}">
                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('email')}} </strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{$errors->has('data_de_nascimento')?'has-error':''}}">
                                    <label for="data_de_nascimento">Data de Nascimento: (dd-mm-aaaa)</label>
                                    <input format='Y-m-d' name="data_de_nascimento" class="form-control" placeholder="dd-mm-aaaa" value="{{date('d-m-Y', strtotime($usuario->data_de_nascimento)) }}">
                                    
                                    @if($errors->has('data_de_nascimento'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('data_de_nascimento')}} </strong>
                                        </span>
                                    @endif
                            </div>                     
                             
                            
                            
                        </div>
                        <button class="btn btn-info">Atualizar Usuário</button>
                    </form>
                    
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection