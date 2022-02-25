@extends('layout.layout')


@section('content')

<!--- mostrar horario marcado --->
<div id="horario_marcado" class="align-self-center col-xs-2 col-sm-2 col-lg-5 col-2" style="width: 50%;">
    <table class="table">
        <thead>
            <tr>
                <td colspan="3"><h4>Meu horário</h4></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ session()->get('horario')['hora'];  }}</td>
                <td>
                    <button type="button" class="btn btn-danger" id="desmarcar_horario" onclick="location.href = '/desmarcar/{{ session()->get('horario')['id'] }}'">Desmarcar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!--- fim mostrar horario marcado --->

@endsection