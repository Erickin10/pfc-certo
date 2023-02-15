@extends('layouts.site')

@section('title', 'Meu Perfil')
@section('content')

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
<div style="position: absolute; bottom: -100%; width: 100%; height: 0 rem; left: 0">
    <footer class="bg-light text-center text-white" >

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
