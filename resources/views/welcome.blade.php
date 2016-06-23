@extends('layouts.app')

@section('content')
   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                @foreach($posts as $post)
                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <p class="thumbnail">
                            <img src="/{{$post->imagem}}" alt="...">
                        </p>
                    </div>
                    <div class="col-xs-8 col-md-8">
                        <h3><a href="{{route('post.unico',$post->id)}}">{{$post->titulo}}</a></h3>
                        <p>{{str_limit(strip_tags($post->conteudo), 200)}} </p>
                        <p><a class="btn btn-primary" href="{{route('post.unico',$post->id)}}" role="button">Ler matéria</a></p>
                    </div>
                    </div>
                               
                @endforeach
                <div align="center">
                        {!! $posts->links() !!}
                    </div>
            </div>

           @include('layouts._includes._sidebar')

        </div>
    </div>
 
@endsection
