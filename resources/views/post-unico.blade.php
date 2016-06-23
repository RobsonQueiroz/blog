@extends('layouts.app')

@section('content')
   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                
                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->titulo}}</h1>

                <!-- Author -->
                <p class="lead">
                    Autor: <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> 
                    Publicado em {{date('d/m/Y', strtotime($post->created_at))}} 
                    às {{date('H:i', strtotime($post->created_at))}}
                </p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="../{{$post->imagem}}" alt="{{$post->titulo}}">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{str_limit(strip_tags($post->conteudo), 100)}}</p>                
                <p>{{$post->conteudo}} </p>                

                <hr>              


                

            </div>

            @include('layouts._includes._sidebar')

        </div>
        

        <hr>
 
@endsection
