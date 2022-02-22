@extends('layout.layout')

@section('content')

    <!--- tabela de horários --->
    <div id="tabela" class="tabela align-self-start mt-5 col-xs-2 col-sm-2 col-lg-5 col-2" style="width: 50%;">
        <table class="table">
            <thead>
                <tr>
                    <td><h4>Horários</h4></td>
                </tr>
            </thead>
            <tbody>
                @foreach($horarios as $horario)
                <tr>
                    <td><button class="btn_hora" onclick="location.href = '/update/{{$horario->id}}'">{{ $horario->hora; }}</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$horarios->links()}}
    </div>
    <!--- fim tabela de horarios --->
@endsection