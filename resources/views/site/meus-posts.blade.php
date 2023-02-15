@extends('layouts.site')

@section('title', 'Meus Posts')
@section('content')

    <div class="cachorroparede">
        <img class src="{{asset('imagens/cachorroparede2.png')}}" alt="imagens/gatoleria.png">
    </div>

    <div class="gatoparede">
        <img class src="{{asset('imagens/gatoparede.png')}}" alt="imagens/gatoleria.png">
    </div>

    <br><br><br>  <br>

     <h3 class="meusposts-main-title" style="line-height: 1.5; font-weight: 400;
     font-family: Lato, Arial, sans-serif;">
        Meus posts
    </h3>

    <br><br><br>

    <div class="meusposts-container" class="img img-responsive">

        @php
            use App\Models\FoundImage;
            use App\Models\LostImage;
        @endphp

        @foreach ($postsAchado as $post)

            @php
                {{$img = FoundImage::where([['id_Achado', 'like', $post->id]])->first();}}
            @endphp

            @if( $post->id_Usuario == Auth::user()->id)

            <a href="{{route('site.galeria.achado.post-individual', ['post' => $post])}}">
                <img src="{{asset($img->name_Img)}}" alt="{{asset($img->name_Img)}}">
            </a>

            @endif

        @endforeach

        @foreach ($postsPerdido as $post)

            @php
                {{$img = LostImage::where([['id_Perdido', 'like', $post->id]])->first();}}
            @endphp

            @if( $post->id_Usuario == Auth::user()->id)

            <a href="{{route('site.galeria.perdido.post-individual', ['post' => $post])}}">
                <img src="{{asset($img->name_Img)}}" alt="{{asset($img->name_Img)}}">
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
  <script src="js/progessbar.min.js"></script>

  <script src="js/postar.js"></script>

<!--Rodapé da pagina-->
<div style="position: absolute; bottom: 0;  height: 2.5rem;">
    <footer class="bg-light text-center text-white" style="width: 98.7vw;">

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
@endsection
