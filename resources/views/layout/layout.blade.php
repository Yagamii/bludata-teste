<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c940f39f00.js" crossorigin="anonymous"></script>
    <?php date_default_timezone_set('America/Sao_Paulo');  ?>
    <title>Lista de fornecedores</title>
</head>
<body>
    
    <div class="container">
        <main role="main">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/fornecedores">Fornecedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/empresas">Empresas</a>
                    </li>
                </ul>
            </nav>

            <div class="body clearfix">
                @hasSection('body')
                    @yield('body')
                @endif
            </div>
        </main>
    </div>

    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/funcoes.js')}}" type="text/javascript"></script>
</body>
</html>