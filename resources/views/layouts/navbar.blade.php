<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">HOME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @can('access')
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">

                <li class="nav-item dropdown">
                    <div class="dropdown mx-1">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Editoras
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('editoras.index') }}">Ver</a></li>
                            <li><a class="dropdown-item" href="{{ route('editoras.create') }}">Cadastrar</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <div class="dropdown mx-1">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Autores
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('autors.index') }}">Ver</a></li>
                            <li><a class="dropdown-item" href="{{ route('autors.create') }}">Cadastrar</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <div class="dropdown mx-1">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categoria
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Ver</a></li>
                            <li><a class="dropdown-item" href="{{ route('categorias.create') }}">Cadastrar</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <div class="dropdown mx-1">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Emprestimos
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('emprestimos.index') }}">Ver</a></li>
                            <li><a class="dropdown-item" href="{{ route('emprestimos.create') }}">Cadastrar</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <div class="dropdown mx-1">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Livros
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('livros.index') }}">Ver</a></li>
                            <li><a class="dropdown-item" href="{{ route('livros.create') }}">Cadastrar</a></li>
                        </ul>
                    </div>
                </li>
                @endcan


            </ul>

            <div class="my=2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Editar Perfil</a></li>
                                <li><a class="dropdown-item" href="#"
                                        onclick="document.querySelector('form.logout').submit();">Sair</a>
                                    <form action="{{ route('logout') }}" class="logout" method="POST"
                                        style="display:none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
