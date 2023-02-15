@extends('layouts.site')

@section('title', 'Achado&Perdidos')
@section('content')

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

        @php
            use App\Models\FoundImage;
        @endphp

        @foreach ($postsAchado as $post)

        @php
            {{$img = FoundImage::where([['id_Achado', 'like', $post->id]])->first();}}
        @endphp

        @if ($post->aproved == true)

            <a href="{{route('site.galeria.achado.post-individual', ['post' => $post])}}">
                <img src="{{asset($img->name_Img)}}" alt="{{asset($img->name_Img)}}">
            </a>

        @endif

        @endforeach

    </div>

    <br><br><br>  <br><br>   <br><br> <br> <br><br><br><br>  <br>

    <h3 class="perdidos-main-title" style="line-height: 1.5; font-weight: 400;	font-family: Lato, Arial, sans-serif;">Perdidos</h3>

    <br><br><br>

    <div class="gallery-container2">
        @php
            use App\Models\LostImage;
        @endphp

        @foreach ($postsPerdido as $post)

        @php
            {{$img = LostImage::where([['id_Perdido', 'like', $post->id]])->first();}}
        @endphp

        @if ($post->aproved == true)

        <a href="{{route('site.galeria.perdido.post-individual', ['post' => $post])}}">
            <img src="{{asset($img->name_Img)}}" alt="{{asset($post->img_Animal)}}">
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
  <div style="position: absolute; bottom: -110%; height: 2.5rem;">
    <footer class="bg-light text-center text-white" style=" width: 98.7vw;">

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
@endsection
