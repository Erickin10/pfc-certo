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
        <title> @yield('title') </title>

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

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">
                            Logout
                        </a>
                    </li>

                </ul>

                <!-- Barra de pesquisa da barra de navegação -->
                <form method="GET" action="{{route('site.ong')}}" class="d-flex mt-3" role="search">

                    <select  name="search" id="select-estadoong" aria-label="Procure uma ONG" class="form-control me-2" required>
                        <option value="" selected>Procure ONG's no seu Estado</option>
                        <option value="Estado">Mostrar Todas</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito-Federal</option>
                        <option value="ES">Espirito Santo</option>
                        <option value="GO">Goiais</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grando do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                    <button class="btn btn-success" type="submit">Procurar</button>

                </form>
                </div>
            </div>
            </div>
        </nav>
        </header>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="perfilong">

                @php
                use App\Models\User;
                use App\Models\EnderecoUser;

                $usuario = Auth::user()->id;

                {{$user = User::where([['id', 'like', $usuario]])->first();}}
                {{$enderecoUser = EnderecoUser::where([['id_Usuario', 'like', $usuario]])->first();}}
                @endphp

                <form method="POST" action="{{ route('site.perfil.editar', ['enderecoUser_id' => $enderecoUser->id])}}">
                @csrf
                @method('PUT')

                <!-- Fieldset em cima do formulario -->
                <br><br><br><br><br><br><br>
                <fieldset class="fieldset-perfilong">

                    <h6 class="fs-title-cad">Meu Perfil</h6>

                    <!-- Inputs-->
                    <div class="input-group">

                        <!-- Nome -->
                        <div class=" ">
                        <label class="labels-user" for="inputElement">Nome:</label>
                            <input style="text-align: center;" id="nomeuser" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="input-box-perfil">
                        <label class="labels-user" for="inputElement">Email:</label>
                            <input style="text-align: center;" id="emailuser" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" placeholder="E-mail">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <!-- Telefone -->
                        <div class="input-box-perfil">
                        <label class="labels-user" for="inputElement">Telefone:</label>
                            <input style="text-align: center;" id="telefoneuser" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" maxlength="14" placeholder="Telefone: (XX)XXXXX-XXXX" >

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- CEP -->
                        <div class="input-box-perfil">
                        <label class="labels-user" for="inputElement">CEP:</label>
                            <input style="text-align: center;"  id="cepuser" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ $enderecoUser->cep }}" required autocomplete="cep" placeholder="Cep" >

                            @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Rua -->
                        <div class="input-box-perfil">
                        <label class="labels-user" for="inputElement">Rua:</label>
                            <input style="text-align: center;"  id="ruauser" type="text" class="form-control @error('rua') is-invalid @enderror" name="rua" value="{{ $enderecoUser->rua }}" required autocomplete="rua" placeholder="Nome da Rua" >

                            @error('rua')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Bairro -->
                        <div class="input-box-perfil">
                        <label class="labels-user" for="inputElement">Bairro:</label>
                            <input  style="text-align: center;" id="bairrouser" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ $enderecoUser->bairro }}" required autocomplete="bairro" placeholder="Nome do Bairro" >

                            @error('bairro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Cidade -->
                        <div class="input-box-perfil">
                        <label class="labels-user" for="inputElement">Cidade:</label>
                            <input style="text-align: center;" id="cidadeuser" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ $enderecoUser->cidade }}" required autocomplete="cidade" placeholder="Cidade" >

                            @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Complemento -->
                        <div class="input-box-perfil">
                        <label class="labels-user" for="inputElement">Complemento:</label>
                            <input style="text-align: center;" id="complementouser" type="text" class="form-control @error('complemento') is-invalid @enderror" name="complemento" value="{{ $enderecoUser->complemento }}" required autocomplete="complemento" placeholder="Complemento" >

                            @error('complemento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Numero da casa-->
                        <div class="input-box-perfil">
                        <label class="labels-user" for="inputElement">Número:</label>
                            <input style="text-align: center;" id="numerouser" type="number" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ $enderecoUser->numero }}" required autocomplete="numero" placeholder="Numero" >

                            @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Senha -->
                        <div class="input-box-perfil">
                        <label class="labels-user" for="inputElement">Senha:</label>
                            <input style="text-align: center;" id="senhauser" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Digite sua senha">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirmar senha -->
                        <div class="input-box-perfil">
                        <label class="labels-user" for="inputElement">Confirmar senha:</label>
                            <input style="text-align: center;" id="confrimauser" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Digite sua senha novamente">
                        </div>

                        <input type="hidden" name="enderecoId" value="{{$enderecoUser->id}}">
                        <input type="hidden" name="userId" value="{{$user->id}}">

                    </div>

                    <!-- Botão de enviar dados -->
                    <button class="btn-salvar-dados" target="_top">Salvar Dados</button>
                    <br><br>
                </fieldset>

                </form>
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

        <script src="js/cadastrong.js"></script>

</div>


</html>
