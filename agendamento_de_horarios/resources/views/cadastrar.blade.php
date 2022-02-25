@extends('layout.layout')

@section('content')

    <!--- formulário de cadastro ---> 
    <div id="cadastrar" class="col-3 p-0 col-sm-3 col-md-5 col-lg-6 align-self-center">
        <div class="d-flex justify-content-start">
            <button class="mb-3" id="fechar_cadastro" onclick="location.href = '/'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                </svg>
            </button>
        </div>
        <form style="width: 100%;" method="post" id="formulario_de_cadastro">
            @csrf
            <input type="text" name="name" id="login_cadastrar" class="form-control border border-dark text-dark mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Nome">
            <input type="email" name="email" id="email_cadastrar" class="form-control border border-dark text-dark mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Exemplo@exemplo.com">
            <input type="password" name="password" id="senha_cadastrar" class="form-control border border-dark text-dark mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Senha">
            <button type="button" id="cadastrar_usuario" class="btn btn-dark btn-sm d-block m-auto mb-2 mt-0 w-100 mt-2" data-toggle="modal" data-target="#exampleModalCenter">Cadastrar</button>
            <p id="erros" class="text-danger m-0"></p>
        </form>
    </div>
    <!--- fim formulário de cadastro --->

     <!--- modal --->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="titulo_modal">Cadastrado com sucesso</h5>
                </div>
                <div class="modal-body">
                    <p id="frase_modal" class="text-center">Você será redirecionado para a página de login</p>
                </div>
            </div>
        </div>
    </div>
    <!--- fim modal --->

@endsection