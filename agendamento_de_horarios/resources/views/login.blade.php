@extends('layout.layout')

@section('content')

 <!--- formulário de login --->
 <div id="entrar_login" class="align-self-center col-sm-3 col-lg-5 col-3" style="width: 50%;">
    <div class=" d-flex justify-content-start">
        <button class="mb-3" id="fechar_entrar" onclick="location.href = '/'">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
            </svg>
        </button>
    </div>
    <form method="POST" style="width: 100%;" action="/auth" id="formulario_de_login">
        @csrf
        <input type="email" id="email_login" name="email" class="form-control border border-dark text-dark mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Email">
        <input type="password" id="password_login" name="password" class="form-control border border-dark text-dark mb-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Senha">
        <button type="button" id="logar" class="btn btn-dark btn-sm d-block m-auto mb-3 mt-0 w-100 mt-2">Entrar</button>
        <a href="/recuperar">Esqueceu sua senha ?</a>
    </form>
    <p id="erros_login" class="text-danger"></p>
</div>
<!--- fim formulário de login --->

@endsection