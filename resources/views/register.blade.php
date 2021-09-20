<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/balloon-css/balloon.min.css">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body >
        <div>
            <div class="flex flex-col bg-blue-200">
                <form class="flex flex-col w-1/2 mx-auto" action="{{route('register')}}" method="POST">
                    @csrf

                    @if ($errors->any())
                    <div>
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name">

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
    
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password">

                    <label for="password_confirmation">Confirmar Senha:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">

                    <button type="submit">
                        Enviar
                    </button>
                </form>
            </div>
        </div>
    </body>

    <script></script>
</html>
