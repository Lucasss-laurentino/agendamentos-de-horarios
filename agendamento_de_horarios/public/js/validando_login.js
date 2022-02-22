$(document).on('click', '#logar', function(e) {
    

    let senha_login = $('#password_login').val();

    if ($('#email_login').val().indexOf("@") == -1 || $('#email_login').val().indexOf(".") == -1 || $('#email_login').val().indexOf(".") - $('#email_login').val().indexOf("@") == 1) { 
        $('#erros_login').html('Email inválido');
    } else if (senha_login.length < 8) {
        $('#erros_login').html('Senha curta');
    } else {
        $.ajax({
            url: '/auth',
            method: 'POST',
            data: $('#formulario_de_login').serialize(),
            dataType: 'text',
            success: function(resposta) {
                console.log(resposta);
                if (resposta == 'true') {
                    
                    var time = setTimeout(function() {
                        location.href = '/home';
                    
                    }, 700);

                } else if (resposta == 'false') {
                    $('#erros_login').html('Email ou senha errado');
                } 
            }
        });
    }

})