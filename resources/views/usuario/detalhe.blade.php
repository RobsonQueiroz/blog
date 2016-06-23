@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('usuario.index') }}">Usuários</a></li>
                    <li class="active">Detalhe</li>
                </ol>


                <div class="panel-body">
                    <div class="col-xs-2 col-md-2">
                        <p class="thumbnail">
                            <img src="/{{$usuario->foto}}" alt="...">
                        </p>
                    </div>
                    <div class="col-xs-2 col-md-2">
                
                        <p><b>Usuário: </b> {{$usuario->name}} </p>               
                        <p><b>E-mail: </b> {{$usuario->email}} </p>               
                        <p><b>Data de Nascimento: </b> {{$usuario->data_de_nascimento}} </p>
                        <p>
                            <a class="btn btn-info" href=" {{ route('usuario.editar', $usuario->id)}} ">Editar Usuário</a>
                        </p>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Conteúdo</th>                                
                                <th>Data de publicação</th>
                                <th>Ação</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuario->posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->titulo}}</td>
                                <td>{{$post->conteudo}}</td>
                                <td>{{$post->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('post.editar', $post->id) }} ">Editar</a> 
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse post?')? window.location.href='{{route('post.deletar', $post->id)}}':false) ">Deletar</a>
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                    <p> 
                        <a class="btn btn-info" href="{{route('post.adicionar',$usuario->id) }} ">Adicionar post</a>
                    </p>                      

                </div>
            </div>
        </div>
    </div>
</div>
@endsection