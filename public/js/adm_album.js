$(document).ready(function() {

    //Retornar dados na modal para confirmar a exclusão
    $('.apagarAlbum').click(function() {
        var id = $(this).data('id');
        $.ajax({
            type : 'GET',
            datatype: 'JSON',
            url  : 'carregar-dados-album/' + id,
            data : {'id':id},
            success:function(data){
                $('.alb_id').val(data.alb_id); 
                $('.alb_titulo').val(data.alb_titulo);   
            }
        });
    });

    //Excluir dados
    $('.confirmarExclusaoAlbum').click(function() {
        var id = $('.alb_id').val();

        $.ajax({
            type : 'GET',
            datatype: 'JSON',
            url  : 'apagar-album/' + id,
            data : {'id':id},
        });
        $('#apagarAlbum').modal('hide');
        alert('Álbum excluído.');
        window.location.pathname = '/';//Para onde ir após a exclusão.
    });

    $('.btn-criar-album').on( "click", function() {
        var $fileUpload = $('#file');
        if (parseInt($fileUpload.get(0).files.length) > 200){
            /*Quantidade de imagens que pode ser enviada por upload. 
            Pode ser necessário atualizar esse valor no arquivo php.ini*/
            alert("Você pode fazer upload de até 200 imagens por vez.");
            event.preventDefault();
        }
        //Se os inputs estiverem preechidos, vamos exibir a imagem preloader.gif
        else if ( !($('#titulo-album').val().trim() == '') && 
             !($('#file-capa').val().trim() == '') &&
             !($('#file').val().trim() == '') ){
                $('.img-load').show();
        }        
    });


   
});//document ready