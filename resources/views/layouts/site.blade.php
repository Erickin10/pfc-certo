<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">

        <!--Fonte-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!--Titulo-->
        <title> @yield('title') </title>

    </head>

    <body>

        <header>
        <!-- Barra de navegação -->
        <nav class="navbar fixed-top">

            <div class="container-fluid">

            <a class="navbar-brand" href="{{route('site.home')}}">
                <img src="{{asset('imagens/logzin.png')}}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                SOCÃES&GATOS
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLightNavbar" aria-controls="offcanvasLightNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabhome="-1" id="offcanvasLightNavbar" aria-labelledby="offcanvasLightNavbarLabel">

                <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLightNavbarLabel">SOCÃES&GATOS </h5>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <!-- Menu da bara de navegação -->
                <div class="offcanvas-body">

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                    <li class="nav-item">
                    <a class="nav-link" href="{{route('site.home')}}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li><a class="dropdown-item" href="{{route('site.perfil')}}">Meu Perfil</a></li>
                          <li><a class="dropdown-item" href="{{route('site.perfil.meus-posts')}}">Meus posts</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Postar</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="{{route('site.postar-achado')}}">Achado</a></li>
                            <li><a class="dropdown-item" href="{{route('site.postar-perdido')}}">Perdido</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="{{route('site.galeria')}}">Achados e perdidos</a>
                    </li>

                    @if (Auth::user()->role == 'adm')

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('site.confirmacao')}}">Aprovar Posts</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('site.ong')}}">Aprovar Ongs</a>
                    </li>

                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">
                            Logout
                        </a>
                    </li>

                </ul>

                <!-- Barra de pesquisa da barra de navegação -->
                <form method="GET" action="{{route('site.ong')}}" class="d-flex mt-3" role="search">

                    <select  name="search" id="select-estadoong" aria-label="Procure uma ONG" class="form-control me-2" required>
                        <option value="" selected>Procure ONG's no seu Estado</option>
                        <option value="Todas">Mostrar Todas</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito-Federal</option>
                        <option value="ES">Espirito Santo</option>
                        <option value="GO">Goiais</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grando do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                    <button class="btn btn-success" type="submit">Procurar</button>

                </form>
                </div>
            </div>
            </div>
        </nav>
        </header>

        @yield('content')

 