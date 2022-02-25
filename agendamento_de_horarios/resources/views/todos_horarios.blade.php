@extends('layout.layout')

@section('content')


<div class="row text-center col-3 p-0 col-sm-3 col-md-5 col-lg-6 align-self-center " id="form_horarios_acoes">

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
                <td><h5 id="titulo">Horários</h5></td>
                <td colspan="2"><h5>Ações</h5></td>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
            <tr>
                <td><button class="btn_hora">{{ $horario->hora; }}</button></td>
                <td><button type="button" class="btn btn-danger" id="excluir" onclick="location.href = '/excluir/{{ $horario->id }}'" ><i class="bi bi-trash-fill"></i></button></td>
                @if ($horario->reservado == 1)
                <td><button type="button" class="btn btn-primary" id="desmarcar" onclick="location.href = '/desmarcar_horario_adm/{{ $horario->id }}'" >Desmarcar</button></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="tabela justify-content-center col-xs-2 col-sm-2 col-lg-5 col-2" style="width: 100%;">
        <button type="button" class="btn btn-primary mb-2" id="editar" onclick="location.href = '/adicionar'" style="width: 100%;">Adicionar um Horário</button>
    </div>
    {{$horarios->links()}}

</div>

    <!--- 
    
        <div class="tabela justify-content-center mt-5 col-xs-2 col-sm-2 col-lg-5 col-2" style="width: 100%;">
            <button type="button" class="btn btn-primary mb-5" id="editar" onclick="location.href = '/adicionar'" style="width: 100%;">Adicionar um Horário</button>
        </div>
        {{$horarios->links()}}
        </div>
    </div>
    </div>
     fim tabela de horarios --->
     <script src="{{ asset('/js/jquery.js') }}"></script>
     <script src="{{ asset('/js/responsivo.js') }}"></script>

@endsection