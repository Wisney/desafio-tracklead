<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desafio Tracklead</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    @livewireStyles
</head>

<body>
    <header>
        <nav>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="float-end">
                        @if (Auth::check())
                            Você está logado, <a class="btn btn-danger text-white" href="/logout"> Deslogar</a>
                        @endif
                    </span>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>
    @livewireScripts
</body>

</html>
