$(document).on('click', '#redefinir_dados', function(e) {

    e.preventDefault();

    let senha_redefinir = $('#senha_redefinicao').val();
    let confirmar_senha_redefinir = $('#confirmar_senha_redefinicao').val();

    if ($('#email_confirmar').val().indexOf("@") == -1 || $('#email_confirmar').val().indexOf(".") == -1 || $('#email_confirmar').val().indexOf(".") - $('#email_confirmar').val().indexOf("@") == 1) { 
    
        $('#erros_redefinicao').html('Email inválido');
    
    } else if (senha_redefinir.length < 8) {
    
        $('#erros_redefinicao').html('Senha curta');
    
    } else if (senha_redefinir != confirmar_senha_redefinir) {

        $('#erros_redefinicao').html('As senhas não são iguais');

    } else {
    
        $.ajax({
            url: '/redefinir',
            method: 'POST',
            data: $('#formulario_de_redefinicao').serialize(),
            dataType: 'text',
            success: function(resposta) {
                
                if (resposta == 'true') {

                    let modal = $('#exampleModalCenter');
                    let minha_modal = new bootstrap.Modal(modal);
                    minha_modal.show();
                
                } else if(resposta == 'false') {

                    $('#erros_redefinicao').html('Email não reconhecido');

                }

            }
        });
    }

});