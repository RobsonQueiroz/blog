<!--<nav class="navbar navbar-default navbar-static-top">-->
<nav class="navbar navbar-inverse navbar-static-top" >

        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                
                <a class="navbar-brand" href="{{ url('/') }}">
                    Blog GEQ
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!--verifica se o usuário está logado para exibir um menu com crud-->
                    @if (!Auth::guest())
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Usuários 
                            <span class="caret"></span>
                        </a>
                         <ul class="dropdown-menu">
                            <li>
                                <a href="{{  route('usuario.index')  }}">Ver todos os Usuários</a>
                                <a href="{{route('usuario.adicionar') }}">Adicionar Novo Usuário</a>                                
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Posts 
                            <span class="caret"></span>
                        </a>
                         <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('post.adicionar', Auth::user()->id ) }}">Adicionar Novo Post</a>
                                <a href="{{ route( 'usuario.detalhe', Auth::user()->id) }}">Ver meus posts</a>
                                <a href="{{ route('post.index' ) }}">Ver todos posts</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Entrar</a></li>                        
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>