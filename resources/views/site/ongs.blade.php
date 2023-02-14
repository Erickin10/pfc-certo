@extends('layouts.site')

@section('title', 'Ongs')
@section('content')

@php
use App\Models\Ong;
use App\Models\User;
@endphp

    <!-- Team -->
    <section id="team" class="pb-5">
        <div class="container">
            <h5 class="section-title h1">ONGs</h5>
            <div class="row">
                <!-- Team member -->
                @foreach ($endereco_ong as $endereco)

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" >
                        <div class="mainflip flip-0">

                            @php
                                {{$ong = Ong::where([['id_Endereco', 'like', $endereco->id]])->first();}}
                            @endphp

                            @if (Auth::user()->role == 'adm' && $ong->aproved == false)

                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="card-title">{{$ong->name}}</h4>
                                            <p class="card-text">
                                                {{$ong->description}}
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
                                            <h4 class="card-title">{{$ong->name}}</h4>

                                            <p class="card-text">
                                                <strong>Estado: </strong>{{$endereco->estado}}
                                                <strong>Cidade: </strong>{{$endereco->cidade}}
                                                <strong>Bairro: </strong>{{$endereco->bairro}}<br>
                                                <strong>Rua: </strong>{{$endereco->rua}}<br>
                                                <strong>Numero: </strong>{{$endereco->numero}}<br>
                                                <strong>Telefone: </strong>{{$ong->phone}}<br>
                                                <strong>Email: </strong>{{$ong->email}}<br>
                                                <strong>Cnpj: </strong>{{$ong->cnpj}}<br>
                                            </p>
                                            <form action="{{route('site.ong.deletar', ['id'=> $ong->id])}}" method="POST">
                                                @csrf
                                                @method ('DELETE')

                                                <button type="submit" class="btn btn-danger delete-btn">deletar</button>
                                            </form>

                                            <form action="{{route('site.ong.aprovar', ['id'=> $ong->id])}}" method="POST">
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit">aprovar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                            @elseif(Auth::user()->role == 'cliente' && $ong->aproved == false)



                            @elseif ($ong->aproved == true)

                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">{{$ong->name}}</h4>
                                        <p class="card-text">
                                            {{$ong->description}}
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
                                        <h4 class="card-title">{{$ong->name}}</h4>

                                        <p class="card-text">
                                            <strong>Estado: </strong>{{$endereco->estado}}
                                            <strong>Cidade: </strong>{{$endereco->cidade}}
                                            <strong>Bairro: </strong>{{$endereco->bairro}}<br>
                                            <strong>Rua: </strong>{{$endereco->rua}}<br>
                                            <strong>Numero: </strong>{{$endereco->numero}}<br>
                                            <strong>Telefone: </strong>{{$ong->phone}}<br>
                                            <strong>Email: </strong>{{$ong->email}}<br>
                                            <strong>Cnpj: </strong>{{$ong->cnpj}}<br>
                                        </p>
                                        @if (Auth::user()->role == 'adm')

                                        <a href="{{route('site.ong.editar', ['id'=> $endereco->id])}}"
                                        class="btn btn-info edit-btn">
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

    <script src="js/postar.js"></script>

@endsection
