@extends('layout.layout')

@section('content')

    <!--- tabela de horários --->

    <div id="tabela_adm" class="tabela align-self-center mt-2 col-xs-2 col-sm-2 col-lg-5 col-2" style="width: 50%;">
        <div class=" d-flex justify-content-start">
            <button class="mb-3" id="fechar_cadastro" onclick="location.href = '/home'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                </svg>
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>Hora</td>
                    <td>Nome</td>
                    <td celspan="2">Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                <td>{{ $usuario->horario_marcada }}</td>
                <td>{{ $usuario->name }}</td>
                <td><button type="button" class="btn btn-danger" id="excluir" onclick="location.href = '/excluir_usuario/{{ $usuario->id }}'" ><i class="bi bi-trash-fill"></i></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$usuarios->links()}}
    </div>
    <!--- fim tabela de horarios --->
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/responsivo.js') }}"></script>

@endsection