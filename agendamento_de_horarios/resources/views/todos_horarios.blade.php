@extends('layout.layout')

@section('content')

    <!--- tabela de horários --->

    <div id="tabela" class="tabela align-self-start mt-5 col-xs-2 col-sm-2 col-lg-5 col-2" style="width: 50%;">
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
                    <td><h4>Horários</h4></td>
                    <td><h4>Ações</h4></td>
                </tr>
            </thead>
            <tbody>
                @foreach($horarios as $horario)
                <tr>
                    <td><button class="btn_hora">{{ $horario->hora; }}</button></td>
                    <td><button type="button" class="btn btn-danger" id="excluir" onclick="location.href = '/excluir/{{ $horario->id }}'" >Excluir</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="tabela justify-content-center mt-5 col-xs-2 col-sm-2 col-lg-5 col-2" style="width: 100%;">
            <button type="button" class="btn btn-primary mb-5" id="editar" onclick="location.href = '/adicionar'" style="width: 100%;">Adicionar um Horário</button>
        </div>
        {{$horarios->links()}}
    </div>
    <!--- fim tabela de horarios --->
@endsection