@extends('layout.layout')

@section('content')

<div id="botoes" class="align-self-center col-sm-3 col-lg-5 col-3" style="width: 50%;">
    <button type="button" id="entrar" class="btn btn-dark btn-sm d-block m-auto mb-3 mt-0 w-100" onclick="location.href = '/todos_horarios'">Horarios</button>
    <button type="button" id="cadastro" class="btn btn-dark btn-sm d-block m-auto w-100" onclick="location.href = '/todos_usuarios'">Usuarios</button>
</div>

@endsection