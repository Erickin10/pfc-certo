@extends('layouts.site')

@section('title', 'Post Perdido')
@section('content')

        <!-- ==============================================
        Hero
        =============================================== -->
        <div class="conti">
            @php
                use App\Models\LostImage;
            @endphp
            <div class="conti-card">
                <div class="verpost-header">
                    <strong>{{$post->name_Animal}}</strong>
                </div>
                <div class="slider">
                    <div class="container">
                      <div class="slick_slide-individual">

                        @php
                            {{$img = LostImage::where([['id_Perdido', 'like', $post->id]])->get();}}
                        @endphp
                        @foreach ($img as $img)

                            <div class="col-3">
                                <img src="{{asset($img->name_Img)}}" alt="" class="img-fluid">
                            <a href="#"></a>
                            </div>
                        @endforeach


                      </div>
                    </div>
                  </div>
                <div class="cardverpost-body">
                    <strong>Animal: </strong>{{$post->type_Animal}}<br>
                    <strong>Raça: </strong>{{$post->breed_Animal}}<br>
                    <strong>Cor: </strong>{{$post->color_Animal}}<br>
                    <strong>Idade: </strong>{{$post->age_Animal}}<br>
                    <strong>Genero: </strong>{{$post->gender_Animal}}<br>
                    <strong>Porte: </strong>{{$post->size_Animal}}<br>
                    <strong>Onde foi perdido? </strong>{{$post->local_Lost_Animal}}<br>
                    <strong>Recompensa: </strong>{{$post->bounty_Animal}}<br>
                    <strong>Observaçoes: </strong>{{$post->post_Description}}<br><br>
                </div>
                <div class="verpost-footer">


                    {{-- ADM COM POST NAO APROVADO --}}
                    @if (Auth::user()->role == 'adm' && $post->aproved == false)

                        <form action="{{route('site.post-perdido.deletar', ['id'=> $post->id])}}" method="POST">
                            @csrf
                            @method ('DELETE')

                            <button type="submit" class="botao-delete" onclick="confirmDelete(event)">deletar</button>
                        </form>

                        <form action="{{route('site.post-perdido.aprovar', ['id'=> $post->id])}}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button class="botao-aprovar" type="submit">aprovar</button>
                        </form>

                    {{-- CLIENTE COM POST DELE --}}
                    @elseif ($post->id_Usuario == Auth::user()->id)

                    {{-- VOLTAR --}}
                    <a href="{{route('site.galeria')}}" class="voltar-btn">voltar</a>

                    <form action="{{route('site.post-perdido.deletar', ['id'=> $post->id])}}" method="POST">
                        @csrf
                        @method ('DELETE')

                        {{-- DELETAR --}}
                        <button type="submit" class="botao-delete-aprovado" onclick="confirmDelete(event)">deletar</button>
                    </form>

                    {{-- EDITAR --}}
                    <a href="{{route('site.editar-perdido', ['id'=> $post->id])}}" class="botao-editar-aprovado">
                        Editar
                    </a>

                    {{-- ADM COM POST DELE MESMO JA APROVADO  --}}
                    @elseif (Auth::user()->role == 'adm' && $post->aproved == true && $post->id_Usuario == Auth::user()->id)

                        <form action="{{route('site.post-perdido.deletar', ['id'=> $post->id])}}" method="POST">
                            @csrf
                            @method ('DELETE')

                            <button type="submit" class="botao-delete" onclick="confirmDelete(event)">deletar</button>
                        </form>

                    {{-- ADM COM POST JA APROVADO --}}
                    @elseif (Auth::user()->role == 'adm' && $post->aproved == true && $post->id_Usuario != Auth::user()->id)

                        <form action="{{route('site.post-perdido.deletar', ['id'=> $post->id])}}" method="POST">
                            @csrf
                            @method ('DELETE')

                            <button type="submit" class="botao-delete-adm" onclick="confirmDelete(event)">deletar</button>
                        </form>

                        {{-- VOLTAR --}}
                        <a href="{{route('site.galeria')}}" class="voltar-btn-adm">voltar</a>

                    {{-- CLIENTE COM POST DOS OUTROS --}}
                    @elseif ($post->id_Usuario != Auth::user()->id && $post->aproved == true)

                    {{-- VOLTAR --}}
                    <a href="{{route('site.galeria')}}" class="voltar-btn-cliente">voltar</a>

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

<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

<!--Rodapé da pagina-->
<div style="
width: 100%;
left: 50%;
top: 193%;
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
