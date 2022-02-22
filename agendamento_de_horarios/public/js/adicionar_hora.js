$(document).on('click', '#adicionar_hora', function(e) {

    let hora = $('#hora').val();

    if(hora.length <= 0) {
        $('#erros_adicionar').html('Preencha o campo de hora');
    } else {

        $.ajax({
            url: '/cadastrar_hora',
            method: 'POST',
            data: $('#formulario_de_adicionar').serialize(),
            dataType: 'text',
            success: function(resposta) {
                if (resposta == 'false') {
                    $('#erros_adicionar').html('Horário já existe');
                } else if(resposta == 'true') {
                    location.href = '/todos_horarios';
                }
            }
        });

    }

});