@extends('layouts.site')

@section('title', 'Editar Postagem')
@section('content')
  <br><br><br><br>

  <h3 class="main-title-p"> Editar Perdido </h3>

  <!-- Formulário de passos de progressão -->
  <form action="{{route('site.editar-perdido.postar', ['id'=> $post->id])}}" method="POST" enctype="multipart/form-data" class="msform-post" id="msform-post">
    @csrf
    @method('PUT')

    <!-- Barra de progressão -->
    <ul id="progressbar">
      <li class="active">Idenficicação</li>
      <li>Reconhecimento</li>
      <li>Observações</li>
    </ul>

    <!-- Fieldsets -->

    <!-- Fieldset 1 -->
    <fieldset align-items: center>

      <h2 class="fs-title-post">Passo 1</h2>
      <h3 class="fs-subtitle-post">Nos conte sobre o seu pet</h3>
      <label class="labels-user" for="inputElement">Animal:</label>
      <select name="type_Animal" id="select-input">
        <option value="Gatoucachorro">É um gato ou um cachorro?</option>
        <option value="Gato" {{$post->type_Animal == 'Gato' ? "selected = 'selected'" : "" }}>Gato</option>
        <option value="Cachorro" {{$post->type_Animal == 'Cachorro' ? "selected = 'selected'" : "" }}>Cachorro</option>
      </select>
      <label class="labels-user" for="inputElement">Nome:</label>
      <input type="text" name="name_Animal" placeholder="Qual é o nome dele?" value="{{$post->name_Animal}}" />
      <label class="labels-user" for="inputElement">Raça:</label>
      <input type="text" name="breed_Animal" placeholder="Qual é a raça dele?" value="{{$post->breed_Animal}}" />
      <label class="labels-user" for="inputElement">Cor:</label>
      <input type="text" name="color_Animal" placeholder="Qual é a cor dele?" value="{{$post->color_Animal}}" />
      <label class="labels-user" for="inputElement">Idade:</label>
      <input type="text" name="age_Animal" id="idade" placeholder="Quantos anos ele tem?" value="{{$post->age_Animal}}"/>
      <label class="labels-user" for="inputElement">Gênero:</label>
      <select name="gender_Animal" id="select-input" >
          <option value="Genero">Qual é gênero dele?</option>
          <option value="Macho" {{$post->gender_Animal == 'Macho' ? "selected = 'selected'" : "" }}>Macho</option>
          <option value="Fêmea" {{$post->gender_Animal == 'Fêmea' ? "selected = 'selected'" : "" }}>Fêmea</option>
      </select>
      <label class="labels-user" for="inputElement">Porte:</label>
      <select name="size_Animal" id="select-input">
          <option value="Porte">Qual é o porte dele?</option>
          <option value="Grande" {{$post->size_Animal == 'Grande' ? "selected = 'selected'" : "" }}>Grande</option>
          <option value="Médio" {{$post->size_Animal == 'Médio' ? "selected = 'selected'" : "" }}>Médio</option>
          <option value="Pequeno" {{$post->size_Animal == 'Pequeno' ? "selected = 'selected'" : "" }}>Pequeno</option>
      </select>
      <img src="{{asset('imagens/dogcatsob.png')}}" alt="cachorro" id="imagem-dogcatsob1">

      <input type="button" name="next" class="next action-button" value="Próximo" />

    </fieldset>

    <!-- Fieldset 2 -->
    <fieldset>

      <h2 class="fs-title-post">Passo 2</h2>
      <h3 class="fs-subtitle-post">Nos mostre seu pet</h3>

      <div class="card-foto-post">

        <img src="{{asset('imagens/dogcatsob.png')}}" alt="cachorro" id="imagem-dogcatsob2">

        <div class="top-foto-foto">

    		<button type="button">Upload</button>

    	</div>
    	<div class="drag-area-foto">

    		<span class="visible-foto-post">
				Solte as imagens aqui ou
				<span class="select-fotopost" role="button" >Busque</span>
			</span>
			<span class="on-drop-fotopost">Solte as imagens aqui</span>

        <input name="img_Animal[]" type="file" class="file-fotopost" multiple="multiple" />
    	</div>

	    <!-- IMAGE PREVIEW CONTAINER -->
    	<div class="container"></div>

    </div>

    <script src="{{asset('app.js')}}"></script>

      <input type="button" name="previous" class="previous action-button" value="Anterior" />
      <input type="button" name="next" class="next action-button" value="Próximo" />

    </fieldset>

    <!-- Fieldset 3 -->
    <fieldset >

        <h2 class="fs-title-post">Passo 3</h2>
        <h3 class="fs-subtitle-post">Nos conte outros detalhes</h3>
        <img src="{{asset('imagens/dogcatsob.png')}}" alt="cachorro" id="imagem-dogcatsob3">
        <label class="labels-user" for="inputElement">Local:</label>
        <input type="text" name="local_Lost_Animal" placeholder="Onde ele foi perdido?" value="{{$post->local_Lost_Animal}}" />
        <label class="labels-user" for="inputElement">Observações (contato):</label>
        <input type="text" name="post_Description" placeholder="Observações + Informaçoes para contato" value="{{$post->post_Description}}" />
        <label class="labels-user" for="inputElement">Recompensa:</label>
        <input type="number" name="bounty_Animal" step="1" min="0" max="99999.99" id="recompensa" placeholder="Recompensa(opcional)" value="{{$post->bounty_Animal}}" />
        <input type="hidden" name="id_Usuario" value="{{Auth::user()->id}}"/>
        <input type="hidden" name="type_Post" value="perdido">
       <input type="button" name="previous" class="previous action-button" value="Anterior" />
       <button type="submit" class="submit action-button">Editar</button>

    </fieldset>

  </form>

  <main>
  </main>

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

@endsection
