@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                        <li class="active">Blog</li>
                </ol>


                <div class="panel-body">
                
                    <p> 
                        <a class="btn btn-info" href="{{ route('usuario.adicionar') }}">Adicionar novo Usuário</a>
                    </p>                    

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Data de nascimento</th>
                                <th>Ação</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <th scope="row">{{$usuario->id}}</th>
                                <td>{{$usuario->nome}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->data_de_nascimento}}</td>
                                <td>
                                        
                                    <a class="btn btn-default" href=" {{ route('usuario.detalhe', $usuario->id)}} ">Detalhe</a>
                                    <a class="btn btn-default" href=" {{ route('usuario.editar', $usuario->id)}} ">Editar</a>         
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse usuário?')? window.location.href='{{route('usuario.deletar', $usuario->id)}}':false)">Deletar</a>
                                </td>
                            </tr>

                            @endforeach
                            
                        </tbody>
                    </table>

                    <div align="center">
                        {!! $usuarios->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection