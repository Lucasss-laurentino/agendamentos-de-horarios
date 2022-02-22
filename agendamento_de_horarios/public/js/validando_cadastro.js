$(document).on('click', '#cadastrar_usuario', function(e) {
    
    e.preventDefault();

    let login = $('#login_cadastrar').val();
    let email = $('#email_cadastrar').val();
    let senha_cadastrar = $('#senha_cadastrar').val();

    if (login.length <= 3){
        $('#erros').html('Nome curto');
    }  else if ($('#email_cadastrar').val().indexOf("@") == -1 || $('#email_cadastrar').val().indexOf(".") == -1 || $('#email_cadastrar').val().indexOf(".") - $('#email_cadastrar').val().indexOf("@") == 1) { 
        $('#erros').html('Email inválido');
    } else if (senha_cadastrar.length < 8) {
        $('#erros').html('Senha curta');
    } else {
        $.ajax({
            url: '/store',
            method: 'POST',
            data: $('#formulario_de_cadastro').serialize(),
            dataType: 'text',
            success: function(resposta) {
                
                if (resposta == 'false') {
                    
                    $('#erros').html('Email já cadastrado');
                    
                } else if (resposta == 'true') {

                    let modal = $('#exampleModalCenter');
                    let minha_modal = new bootstrap.Modal(modal);
                    minha_modal.show();

                    setTimeout(function() {
                        location.href = "/login";
                    }, 3000);
                    

                }
            }
        });
    }

})