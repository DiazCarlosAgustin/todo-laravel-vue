<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #22223B;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .btn-principal{
                background-color: #FF7477;
                opacity: 1;
                color:white;
            }
            .btn-principal:hover{
                color: white;
            }
            .btn-secundario{
                border: #FF7477 solid 2px;
                color:white;
            }
            .btn-secundario:hover{
                color:white;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="container aling-center">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h1 >Bienvenido</h1>
                    </div>
                    <div class="col-12 text-center text-white">
                        <h2>¿Quieres administrar tus trabajos?</h2>
                    </div>
                    <div class="col-12 text-center">
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-principal btn-lg mt-3">Administrar trabajos</a>
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-secundario btn-lg mx-2 mt-3">Registrarse</a>
                            @endif
                            <a href="{{ url('/login') }}" class="btn btn-principal btn-lg mx-2 mt-3">Acceder</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
