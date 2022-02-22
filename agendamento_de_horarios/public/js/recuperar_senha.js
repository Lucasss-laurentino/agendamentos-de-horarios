$(document).on('click', '#enviar', function(e){

    e.preventDefault();

     if ($('#recuperar_email').val().indexOf("@") == -1 || $('#recuperar_email').val().indexOf(".") == -1 || $('#recuperar_email').val().indexOf(".") - $('#recuperar_email').val().indexOf("@") == 1) { 
     
        $('#erros_email').html('Email inválido');
    
    } else {

        $.ajax({

            url: '/enviar',
            method: 'post',
            data: $('#formulario_email').serialize(),
            dataType: 'text',
            success: function(resposta) {

                if (resposta == 'true') {

                    let modal = $('#exampleModalCenter');
                    let minha_modal = new bootstrap.Modal(modal);
                    minha_modal.show();

                } else {
                    $('#erros_email').html('Email não reconhecido');
                }
            
            }

        });

    }

});