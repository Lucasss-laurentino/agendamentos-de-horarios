@extends('layout.layout')

@section('content')

    <!--- botão entrar e cadastrar ---> 
    <div id="botoes" class="align-self-center col-sm-3 col-lg-5 col-3" style="width: 50%;">
        <button type="button" id="entrar" class="btn btn-dark btn-sm d-block m-auto mb-3 mt-0 w-100" onclick="location.href = '/login'">Entrar</button>
        <button type="button" id="cadastro" class="btn btn-dark btn-sm d-block m-auto w-100" onclick="location.href = '/cadastrar'">Cadastrar</button>
    </div>
    <!--- fim botão entrar e cadastrar --->

@endsection