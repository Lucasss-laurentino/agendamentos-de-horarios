$(document).ready(function(){

    var tam = $(window).width();
 
   if (tam <= 768){

        $('#imagem_direita').addClass('d-none');
        $('#imagem_esquerda').addClass('d-none');
        $('#form_horarios_acoes').addClass(' w-50');
        $('#form_imgs').removeClass('justify-content-between')
        $('#form_imgs').addClass('justify-content-center')
    }else{

        $('#imagem_direita').removeClass('d-none');
        $('#imagem_esquerda').removeClass('d-none');
        $('#form_horarios_acoes').removeClass('w-50');
        $('#form_imgs').addClass('justify-content-between')
        $('#form_imgs').removeClass('justify-content-center')

    } 

});
