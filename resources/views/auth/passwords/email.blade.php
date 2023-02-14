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

            {{--
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            --}}

            <form method="POST" action="{{ route('password.email') }}" id="msform-cadredef">
            @csrf

                <h6 class="fs-title-cad">Esqueceu sua senha?</h6>
                <h6>Insira seu e-mail para receber o codigo e redefinir sua senha</h6>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" class="submit action-button">Enviar Link</button>


            </form>
        </div>

    </body>
