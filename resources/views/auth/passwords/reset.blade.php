<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Redefenir senha</title>

    </head>

    <body class="img js-fullheight"
        style="background-image: url({{asset('imagens/doguinhologin.jpg')}});
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    background-size: cover;">

        <div class= "form-cadredef">

            <form method="POST" action="{{ route('password.update') }}" id="msform-cadredef">
            @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <h6 class="fs-title-cad">Esqueceu sua senha?</h6>
                <h6>Insira seu e-mail e sua nova senha</h6>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                placeholder="E-mail">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password" type="password" class="form-control
                @error('password') is-invalid @enderror" name="password"
                placeholder="Senha" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password-confirm" type="password" class="form-control"
                name="password_confirmation"required autocomplete="new-password" placeholder="Confirme a Senha">

                <button type="submit" class="submit action-button">Redefinir Senha</button>

            </form>
        </div>
    </body>
