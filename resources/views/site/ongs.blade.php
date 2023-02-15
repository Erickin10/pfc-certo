@extends('layouts.site')

@section('title', 'Ongs')
@section('content')

@php
use App\Models\Ong;
use App\Models\EnderecoOng;
use App\Models\User;
@endphp

    <!-- Team -->
    <section id="team" class="pb-5">
        <div class="container">
            <h5 class="section-title h1">ONGs</h5>
            <div class="row">



                <!-- Team member -->
                @foreach ($endereco_ong as $endereco)

                @php
                    {{$ongNow = Ong::where([['id', 'like', $endereco->id_Ong]])->first();}}
                @endphp

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" >
                        <div class="mainflip flip-0">


                            @if (Auth::user()->role == 'adm' && $ongNow->aproved == false)

                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="card-title">{{$ongNow->name}}</h4>
                                            <p class="card-text">
                                                {{$ongNow->description}}
                                            </p>
                                            <a href="#" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-justify mt-4">
                                            <h4 class="card-title">{{$ongNow->name}}</h4>

                                            <p class="card-text">
                                                <strong>Estado: </strong>{{$endereco->estado}}
                                                <strong>Cidade: </strong>{{$endereco->cidade}}
                                                <strong>Bairro: </strong>{{$endereco->bairro}}<br>
                                                <strong>Rua: </strong>{{$endereco->rua}}<br>
                                                <strong>Numero: </strong>{{$endereco->numero}}<br>
                                                <strong>Telefone: </strong>{{$ongNow->phone}}<br>
                                                <strong>Email: </strong>{{$ongNow->email}}<br>
                                                <strong>Cnpj: </strong>{{$ongNow->cnpj}}<br>
                                            </p>
                                            <form id="delete-form" action="{{route('site.ong.deletar', ['id'=> $endereco->id])}}" method="POST">
                                                @csrf
                                                @method ('DELETE')

                                                <button type="submit" class="btn btn-danger delete-btn" onclick="confirmDelete(event)">deletar</button>
                                            </form>

                                            <form action="{{route('site.ong.aprovar', ['id'=> $ongNow->id])}}" method="POST">
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" class="botao-aprovar-ong">aprovar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                            @elseif(Auth::user()->role == 'cliente' && $ongNow->aproved == false)



                            @elseif ($ongNow->aproved == true)

                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">{{$ongNow->name}}</h4>
                                        <p class="card-text">
                                            {{$ongNow->description}}
                                        </p>
                                        <a href="#" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-justify mt-4">
                                        <h4 class="card-title">{{$ongNow->name}}</h4>

                                        <p class="card-text">
                                            <strong>Estado: </strong>{{$endereco->estado}}
                                            <strong>Cidade: </strong>{{$endereco->cidade}}
                                            <strong>Bairro: </strong>{{$endereco->bairro}}<br>
                                            <strong>Rua: </strong>{{$endereco->rua}}<br>
                                            <strong>Numero: </strong>{{$endereco->numero}}<br>
                                            <strong>Telefone: </strong>{{$ongNow->phone}}<br>
                                            <strong>Email: </strong>{{$ongNow->email}}<br>
                                            <strong>Cnpj: </strong>{{$ongNow->cnpj}}<br>
                                        </p>
                                        @if (Auth::user()->role == 'adm')

                                        <form id="delete-form" action="{{route('site.ong.deletar', ['id'=> $ongNow->id])}}" method="POST">
                                            @csrf
                                            @method ('DELETE')

                                            <button type="submit" style="margin: 3px" class="btn btn-danger delete-btn" onclick="confirmDelete(event)">deletar</button>
                                        </form>

                                        <a href="{{route('site.ong.editar', ['id'=> $ongNow->id])}}"
                                        class="btn btn-info edit-btn" style="margin: 3px">
                                            Editar
                                        </a>

                                        @endif

                                    </div>
                                </div>
                            </div>

                            @endif



                        </div>
                    </div>
                </div>

                @endforeach
                <!-- ./Team member -->

            </div>
        </div>
    </section>
    <!-- Team -->

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
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="js/postar.js"></script>

    <div style="width: 100vw;">
        <footer class="bg-light text-center text-white" style="width: 100vw; color: #0082c;">

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
