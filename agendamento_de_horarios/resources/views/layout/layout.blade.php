<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!--- bootstrap --->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       
        <!--- css --->
        <link rel="stylesheet" href="/css/btn.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            #fechar_entrar {
            border: none;
            background: none;
            }
            #fechar_cadastro {
            border: none;
            background: none;
            }
            #agendamento{
            margin-left: 50px
            }
        </style>

    </head>
    <body class="antialiased">
        <div class="container-fluid p-0">
            <!--- header start --->
            <header>
            <!--- nav start --->
                <nav class="navbar navbar-dark bg-dark" style="height: 100px">
                    <div id="linha_agendamentos" class="row container-fluid" style="width: 20%;">
                        <a id="agendamento" class="navbar-brand col-4" href="#">Agendamentos</a>
                    </div>
                    <div id="linha_sair" class="row container-fluid p-0" style="width: 10%;">
                        <div class="navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    @if (session()->get('usuario'))
                                    <a class="nav-link" id="sair" href="/logout">Sair</a>
                                    @else
                                    <a class="nav-link disabled" id="sair_disabled" href="#">Sair</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--- end nav --->
            </header>
            <!--- end header --->
              <!--- main start ---> 
              <main>
                <div class="container">
                    <div class="row text-center align-items-end justify-content-between" style="height:70vh;">
                        
                        <!--- img --->
                        <div class="col-2 p-0 col-sm-3 col-md-3 col-lg-3 align-self-center ">
                            <img src="/img/poste_barbeiro.jpg" class="img-fluid">
                        </div>
                        <!--- fim img --->

                        @yield('content')

                        <!--- img --->
                        <div class="col-2 p-0 col-sm-3 col-md-3 col-lg-3 align-self-center">
                            <img src="/img/poste_barbeiro.jpg" class="img-fluid">
                        </div>
                        <!--- fim img --->
                    </div>
                </div>
            </main>
            <!--- END MAIN --->
            <script src="{{ asset('/js/jquery.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
            <script src="{{ asset('/js/validando_cadastro.js') }}"></script>
            <script src="{{ asset('/js/validando_login.js') }}"></script>
            <script src="{{ asset('/js/recuperar_senha.js') }}"></script>
            <script src="{{ asset('/js/validando_redefinicao.js') }}"></script>
            <script src="{{ asset('/js/adicionar_hora.js') }}"></script>
    </body>
</html>
