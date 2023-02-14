<!DOCTYPE html>
<html>
<!-- multistep form -->css
<head>

    <!--Fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!--Titulo-->
    <title>Achado & Perdidos</title>

  </head>

  <body style="font-family: sans-serif; background-color: #fff ;">

    <header>
      <!-- Barra de navegação -->
      <nav class="navbar fixed-top">

        <div class="container-fluid">

          <a class="navbar-brand" href="{{route('site.home')}}">
            <img src="imagens/logzin.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
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




    <div class="gatotrascontainer">
      <img class src="imagens/gatoleria.png" alt="imagens/gatoleria.png">
    </div>

    <div class="dogplaconteiner">
      <img class src="imagens/dogplaca.png" alt="imagens/gatoleria.png">
    </div>

    <div class="dogemcimacontainer">
      <img class src="imagens/catdogplac.png" alt="imagens/gatoleria.png">
    </div>

    <div class="gatoleria2">
      <img class src="imagens/gatoleria2.png" alt="imagens/gatoleria.png">
    </div>

    <div class="dogcatplactudum">
      <img class src="imagens/dogcatplactudum.png" alt="imagens/gatoleria.png">
    </div>

    <div class="cachorroapoio">
      <img class src="imagens/cachorroapoio.png" alt="imagens/gatoleria.png">
    </div>

    <br><br><br>  <br>

    <h3 class="achados-main-title"
    style="line-height: 1.5;
    font-weight: 400;
    font-family: Lato, Arial, sans-serif;">Achados</h3>

    <br><br><br>

    <div class="gallery-container1" class="img img-responsive">

        @foreach ($postsAchado as $post)

        @if ($post->aproved == true)

            <a href="{{route('site.galeria.achado.post-individual', ['post' => $post])}}">
                <img src="{{asset($post->img_Animal)}}" alt="{{asset($post->img_Animal)}}">
            </a>

        @endif

        @endforeach

    </div>

    <br><br><br>  <br><br>   <br><br> <br> <br><br><br><br>  <br>

    <h3 class="perdidos-main-title" style="line-height: 1.5; font-weight: 400;	font-family: Lato, Arial, sans-serif;">Perdidos</h3>

    <br><br><br>

    <div class="gallery-container2">

        @foreach ($postsPerdido as $post)

        @if ($post->aproved == true)

        <a href="{{route('site.galeria.perdido.post-individual', ['post' => $post])}}">
            <img src="{{asset($post->img_Animal)}}" alt="{{asset($post->img_Animal)}}">
        </a>

        @endif

        @endforeach

    </div>



  </body>

  <!--Scripts-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

  <!--Font Awesome-->
  <script src="https://kit.fontawesome.com/362d3e387c.js" crossorigin="anonymous"></script>

  <!--Progress Bar-->
  <script src="{{asset('js/progessbar.min.js')}}"></script>

  <script src="{{asset('js/postar.js')}}"></script>

  <!--Rodapé da pagina-->
  <div style="position: absolute; bottom: -110%; width: 100%; height: 2.5rem;">
    <footer class="bg-light text-center text-white">

      <!-- Sites-->
      <div class="text-center p-3" style="background-color: #7fab7cc4">
        <section id="section" class="mb-4">

          <!-- Facebook -->
          <a
            class="btn btn-primary btn-floating m-1"
            style="background-color: #3b5998;"
            href="#!"
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
            href="#!"
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

</html>
