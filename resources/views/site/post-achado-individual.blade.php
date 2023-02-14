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
        <title> Post Individual </title>

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

                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            Logout
                        </a>
                    </li>

                </ul>

                <!-- Barra de pesquisa da barra de navegação -->
                <form class="d-flex mt-3" role="search">

                    <input class="form-control me-2" type="Procure uma ONG" placeholder="Procure uma ONG" aria-label="Procure uma ONG">
                    <button class="btn btn-success" type="submit">Procurar</button>

                </form>
                </div>
            </div>
            </div>
        </nav>
        </header>

        <!-- ==============================================
        Hero
        =============================================== -->
        <div class="conti">
            <div class="conti-card">
                <div class="verpost-header">
                    <strong>{{$post->name_Animal}}</strong>
                </div>
                <img src="{{asset($post->img_Animal)}}" class="card-img-top" alt="Imagem de Capa">
                <div class="cardverpost-body">
                    <strong>Animal: </strong>{{$post->type_Animal}}<br>
                    <strong>Raça: </strong>{{$post->breed_Animal}}<br>
                    <strong>Cor: </strong>{{$post->color_Animal}}<br>
                    <strong>Idade: </strong>{{$post->age_Animal}}<br>
                    <strong>Genero: </strong>{{$post->gender_Animal}}<br>
                    <strong>Porte: </strong>{{$post->size_Animal}}<br>
                    <strong>Onde foi achado? </strong>{{$post->local_Found_Animal}}<br>
                    <strong>Observaçoes: </strong>{{$post->post_Description}}<br><br>
                </div>
                <div class="verpost-footer">
                    <a href="{{route('site.galeria')}}" class="verpost-btn btn">ok</a>


                    {{-- ADM COM POST NAO APROVADO --}}
                    @if (Auth::user()->role == 'adm' && $post->aproved == false)

                        <form action="{{route('site.post-achado.deletar', ['id'=> $post->id])}}" method="POST">
                            @csrf
                            @method ('DELETE')

                            <button type="submit" class="btn btn-danger delete-btn">deletar</button>
                        </form>

                        <form action="{{route('site.post-achado.aprovar', ['id'=> $post->id])}}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button type="submit">aprovar</button>
                        </form>

                    {{-- USUARIO COM POST DELE --}}
                    @elseif ($post->id_Usuario == Auth::user()->id)

                    <form action="{{route('site.post-achado.deletar', ['id'=> $post->id])}}" method="POST">
                        @csrf
                        @method ('DELETE')

                        <button type="submit" class="btn btn-danger delete-btn">deletar</button>
                    </form>

                    <a href="{{route('site.editar-achado', ['id'=> $post->id])}}" class="btn btn-info edit-btn">
                        Editar
                    </a>

                    {{-- ADM COM POST JA APROVADO --}}
                    @elseif (Auth::user()->role == 'adm' && $post->aproved == true )

                        <form action="{{route('site.post-achado.deletar', ['id'=> $post->id])}}" method="POST">
                            @csrf
                            @method ('DELETE')

                            <button type="submit" class="btn btn-danger delete-btn">deletar</button>
                        </form>

                    @endif

                </div>
            </div>
        </div>

    </body>
    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/362d3e387c.js" crossorigin="anonymous"></script>

    <!--Progress Bar-->
    <script src="js/progessbar.min.js"></script>

    <!--Parallax-->
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>

    <script src="js/slick.min.js"></script>
    <script src="js/custom.js"></script>

<!--Rodapé da pagina-->
<div style="
width: 100%;
left: 50%;
top: 143%;
transform: translate(-50%, -50%);
position: absolute;">
    <footer class="bg-light text-center text-white">

    <!-- Sites-->
    <div class="text-center p-3" style="background-color: #7fab7cc4">
        <section id="section" class="mb-4">

        <!-- Facebook -->
        <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #3b5998;"
            href="https://www.facebook.com/profile.php?id=100089471120038"
            role="button"
        >
            <i class="fab fa-facebook-f"></i>
        </a>

        <!-- Google -->
        <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #dd4b39;"
            href="#!"
            role="button"
        >
            <i class="fab fa-google"></i>
        </a>

        <!-- Instagram -->
        <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #ac2bac;"
            href="https://www.instagram.com/socaes.gatos/"
            role="button"
            >
            <i class="fab fa-instagram"></i>
            </a>

        <!-- Linkedin -->
        <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #0082ca;"
            href="#!"
            role="button"
        >
            <i class="fab fa-linkedin-in"></i>
        </a>

        </section>

        <!-- Copyright -->
        © 2023 Copyright:
        <a class="text-white" href="home.html">SOCÃES&GATOS</a>
    </div>
    </footer>
</div>
</html>
