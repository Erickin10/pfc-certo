<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Scripts -->
</head>
<body class="img js-fullheight" style="background-image: url(imagens/doguinhologin.jpg);">
    <div class="body">

        <section class="ftco-section">
			<div class="container-login">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
                    <img src="imagens/logzin.png" alt="Logo" width="70" height="64" class="logo-login">						

						
						<h2 class="socaesegatos-login-title" style="line-height: 1.5; font-weight: 400;	font-family: Lato, Arial, sans-serif;">
							SOCÃES&GATOS
						</h2>

					</div>
				</div>
                <div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">

                        <h3 class="temconta-title" style="line-height: 1.5; font-weight: 400; font-family: 'Lato', Arial, sans-serif;">
								Tem uma conta?
							</h3>

                            <form method="POST" action="{{ route('login') }}" class="signin-form">
                            @csrf

								<div class="form-group">
                                    <input id="email" type="email" class="form-control-login @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
								</div>
								<div class="form-group">
                                    <input id="password" type="password" class="form-control-login @error('password') is-invalid @enderror"
                                    name="password" placeholder="Senha" required autocomplete="current-password">

                           
                                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password invalid-feedback" role="alert">
                                         
                                        </span>
                                
                                 
								</div>

								<div class="form-group d-md-flex ">
									<div class="w-50">

                                        <label class="checkbox-wrap checkbox-primary">Lembrar de mim
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }} checked>
											<span class="checkmark"></span>
                                        </label>
                                    <br>
                                    <br>
									</div>
									<div class="w-50 text-md-right">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Esqueci minha senha
                                            </a>
                                        @endif
									</div>
								</div>

						</div>
						<div class="grupodologin" >
                                <button type="submit" class="form-control-login btn btn-primary submit px-3">
                                    Login
                                </button>
                            </form>
							<br>
                            <br>
							@if (Route::has('register'))
                                    <a class="cadastrese-login" href="{{ route('register') }}">Cadastre-se</a>
                            @endif
							<a  class="ou" >ou</a> 
							<a class="cadastrong-login" href="{{ route('site.cadastrar-ong') }}">Cadastre sua ONG</a>

						</div>
					</div>
				</div>
			</div>
		</section>
        <!-- Deixa a o site/fundo mais escuro ou opaco -->
		<style>
			body::after{
				position: fixed;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				content: '';
				background: #000;
				opacity: .3;
				z-index: -1; 
			}
		</style>
	</div>
	</body>

    <script src="{{'js/jquery.min.js'}}"></script>
    <script src="{{'js/popper.js'}}"></script>
    <script src="{{'js/bootstrap.min.js'}}"></script>
    <script src="{{'js/main.js'}}"></script>


</html>

