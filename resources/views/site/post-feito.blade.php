@extends('layouts.site')

@section('title', 'Post Concluido')
@section('content')
  <!-- Campo que contem as infromações -->
  <form id="msform-post-certo">
    <fieldset class="sucesso" align-items: center>

        <img src="imagens/catdog.png" alt="gato" class="img-fluid img-post-certo" id="imagem-catdog">
        <br><br><br> <br>
        <h3 class="main-title-post-certo"> Postagem feita com sucesso!</h3>
        <br>
        <a href="{{route('site.home')}}" class="submit action-button" target="_top">OK</a>
        <br><br><br>
    </fieldset>
  </form>

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
@endsection
