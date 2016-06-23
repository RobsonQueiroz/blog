@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb panel-heading">
                <li class="active">Usuários</li>
            </ol>   
            <div class="panel panel-primary">
                <div class="panel-heading">Usuários cadastrados no sistema</div>                     

                <div class="panel-body">
                    @if(Session::has('sucesso'))
                        {!! Session::get('sucesso') !!}
                    @endif 
                                        

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
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{date('d-m-Y', strtotime($usuario->data_de_nascimento))}}</td>
                                <td>                                        
                                    <a class="btn btn-default btn-info" href=" {{ route('usuario.detalhe', $usuario->id)}} ">Ver posts</a>
                                    <a class="btn btn-default" href=" {{ route('usuario.editar', $usuario->id)}} ">Editar</a>         
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse usuário?')? window.location.href='{{route('usuario.deletar', $usuario->id)}}':false)">Deletar</a>
                                </td>
                            </tr>

                            @endforeach
                                   
                        </tbody>
                    </table>
                    <p> 
                        <a class="btn btn-primary" href="{{ route('usuario.adicionar') }}">Adicionar novo Usuário</a>
                    </p>

                    <div align="center">
                        {!! $usuarios->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection