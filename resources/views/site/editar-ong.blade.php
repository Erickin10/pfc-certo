<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>Edite a Ong</title>

</head>
<body class="img js-fullheight"
style="background-image: url({{asset('imagens/doguinhologin.jpg')}});
width: 100%;
height: 100vh;
display: flex;
justify-content: center;
align-items: center;
background-size: cover;">

    <div class="container-cad">

        <div class="form-image">
            <img src="{{asset('imagens/CADASTROP.png')}}" alt="">
        </div>

        <div class= "form-cad">

            @php
                use App\Models\Ong;

                {{$ong = Ong::where([['id_Endereco', 'like', $endereco_ong->id]])->first();}}

            @endphp

            <form id="msform-cad" action="{{route('site.ong.editar.postar', ['id'=> $endereco_ong->id])}}" method="POST" >
            @csrf
            @method('PUT')

                <fieldset align-items: center>

                    <h6 class="fs-title-cad">Edite a ONG</h6>

                    <!-- Inputs-->

                    <div class="input-group">


                        <!-- Nome -->

                        <div class="input-box">
                        <label class="labels-user" for="inputElement">Nome:</label>
                            <input id="nomeong"
                                type="text"
                                name="name"
                                placeholder="Nome"
                                value="{{$ong->name}}"
                                required>
                        </div>

                        <!-- Email -->

                        <div class="input-box">
                        <label class="labels-user" for="inputElement">Email:</label>
                            <input id="emailong"
                                type="email"
                                name="email"
                                placeholder="E-mail"
                                value="{{$ong->email}}"
                                required>
                        </div>

                        <!-- Descrição -->

                        <div class="input-box">
                        <label class="labels-user" for="inputElement">Descrição:</label>
                            <input id="descricaoong"
                                type="text"
                                name="description"
                                placeholder="Descricão"
                                value="{{$ong->description}}"
                                required>
                        </div>

                        <!-- Telefone -->

                        <div class="input-box">
                        <label class="labels-user" for="inputElement">Telefone:</label>
                            <input id="telefoneONG"
                                name="phone"
                                maxlength="14"
                                placeholder="Telefone com (DDD)"
                                value="{{$ong->phone}}"
                                required>
                        </div>

                        <!-- CNPJ -->

                        <div class="input-box">
                        <label class="labels-user" for="inputElement">CNPJ:</label>
                            <input id="cnpjong"
                            name="cnpj"
                            maxlength="18"
                            placeholder="CNPJ"
                            value="{{$ong->cnpj}}"
                            required>
                        </div>

                        <!-- CEP -->
                        <div class="input-box">
                        <label class="labels-user" for="inputElement">CEP:</label>
                                <input
                                type="text"
                                class="form-control shadow-none"
                                id="cepong"
                                name="cep"
                                placeholder="CEP"
                                maxlength="9"
                                value="{{$endereco_ong->cep}}"
                                required>

                        </div>

                        <!-- Rua -->
                        <div class="input-box">
                        <label class="labels-user" for="inputElement">Rua:</label>
                                <input id="enderecong"
                                type="text"
                                class="form-control shadow-none"
                                id="enderecong"
                                name="rua"
                                placeholder="Rua"
                                value="{{$endereco_ong->rua}}"
                                required>

                        </div>

                        <!-- Bairro -->
                        <div class="input-box">
                        <label class="labels-user" for="inputElement">Bairro:</label>
                            <input
                            type="text"
                            class="form-control shadow-none"
                            id="bairrong"
                            name="bairro"
                            placeholder="Bairro"
                            value="{{$endereco_ong->bairro}}"
                            required>
                        </div>

                        <!-- Estado -->

                        <div class="input-box">
                                <label class="labels-user" for="inputElement">Estado:</label>
                                    <select class="select-estados" name="estado"
                                    id="regiaoONG"
                                    class="form-control shadow-none"
                                    required>
                                    <option value="" selected>Estado</option>
                                    <option value="AC" {{$endereco_ong->estado == 'AC' ? "selected = 'selected'" : "" }}>Acre</option>
                                    <option value="AL" {{$endereco_ong->estado == 'AL' ? "selected = 'selected'" : "" }}>Alagoas</option>
                                    <option value="AP" {{$endereco_ong->estado == 'AP' ? "selected = 'selected'" : "" }}>Amapá</option>
                                    <option value="AM" {{$endereco_ong->estado == 'AM' ? "selected = 'selected'" : "" }}>Amazonas</option>
                                    <option value="BA" {{$endereco_ong->estado == 'BA' ? "selected = 'selected'" : "" }}>Bahia</option>
                                    <option value="CE" {{$endereco_ong->estado == 'CE' ? "selected = 'selected'" : "" }}>Ceará</option>
                                    <option value="DF" {{$endereco_ong->estado == 'DF' ? "selected = 'selected'" : "" }}>Distrito-Federal</option>
                                    <option value="ES" {{$endereco_ong->estado == 'ES' ? "selected = 'selected'" : "" }}>Espirito Santo</option>
                                    <option value="GO" {{$endereco_ong->estado == 'GO' ? "selected = 'selected'" : "" }}>Goiais</option>
                                    <option value="MA" {{$endereco_ong->estado == 'MA' ? "selected = 'selected'" : "" }}>Maranhão</option>
                                    <option value="MT" {{$endereco_ong->estado == 'MT' ? "selected = 'selected'" : "" }}>Mato Grosso</option>
                                    <option value="MS" {{$endereco_ong->estado == 'MS' ? "selected = 'selected'" : "" }}>Mato Grosso do Sul</option>
                                    <option value="MG" {{$endereco_ong->estado == 'MG' ? "selected = 'selected'" : "" }}>Minas Gerais</option>
                                    <option value="PA" {{$endereco_ong->estado == 'PA' ? "selected = 'selected'" : "" }}>Pará</option>
                                    <option value="PB" {{$endereco_ong->estado == 'PB' ? "selected = 'selected'" : "" }}>Paraíba</option>
                                    <option value="PR" {{$endereco_ong->estado == 'PR' ? "selected = 'selected'" : "" }}>Paraná</option>
                                    <option value="PE" {{$endereco_ong->estado == 'PE' ? "selected = 'selected'" : "" }}>Pernambuco</option>
                                    <option value="PI" {{$endereco_ong->estado == 'PI' ? "selected = 'selected'" : "" }}>Piauí</option>
                                    <option value="RJ" {{$endereco_ong->estado == 'RJ' ? "selected = 'selected'" : "" }}>Rio de Janeiro</option>
                                    <option value="RN" {{$endereco_ong->estado == 'RN' ? "selected = 'selected'" : "" }}>Rio Grande do Norte</option>
                                    <option value="RS" {{$endereco_ong->estado == 'RS' ? "selected = 'selected'" : "" }}>Rio Grando do Sul</option>
                                    <option value="RO" {{$endereco_ong->estado == 'RO' ? "selected = 'selected'" : "" }}>Rondônia</option>
                                    <option value="RR" {{$endereco_ong->estado == 'RR' ? "selected = 'selected'" : "" }}>Roraima</option>
                                    <option value="SC" {{$endereco_ong->estado == 'SC' ? "selected = 'selected'" : "" }}>Santa Catarina</option>
                                    <option value="SP" {{$endereco_ong->estado == 'SP' ? "selected = 'selected'" : "" }}>São Paulo</option>
                                    <option value="SE" {{$endereco_ong->estado == 'SE' ? "selected = 'selected'" : "" }}>Sergipe</option>
                                    <option value="TO" {{$endereco_ong->estado == 'TO' ? "selected = 'selected'" : "" }}>Tocantins</option>
                                    </select>
                                 </div>

                        <!-- Cidade -->
                        <div class="input-box">
                        <label class="labels-user" for="inputElement">Cidade:</label>
                            <input
                            type="text"
                            class="form-control shadow-none"
                            id="cidadong"
                            name="cidade"
                            placeholder="Cidade"
                            value="{{$endereco_ong->cidade}}"
                            required>
                        </div>

                        <!-- Complemento -->
                        <div class="input-box">
                        <label class="labels-user" for="inputElement">Complemento:</label>
                            <input id="complementong"
                            type="text"
                            name="complemento"
                            placeholder="Complemento"
                            value="{{$endereco_ong->complemento}}"
                            required>
                        </div>

                        <!-- Numero da casa-->
                        <div class="input-box">
                        <label class="labels-user" for="inputElement">Número:</label>
                            <input id="numeroong"
                            type="number"
                            name="numero"
                            placeholder="Número da casa"
                            value="{{$endereco_ong->numero}}"
                            required>
                        </div>
                        <input type="hidden" name="idOng" value="{{$ong->id}}">

                    </div>

                    <!-- Botão de enviar dados -->
                    <button class="cadastro-btn" target="_top">Editar</button>

                    <br><br>

                </fieldset>

            </form>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<script src="{{asset('js/cadastrong.js')}}"></script>
</html>
