$(document).ready(function(){

    var DIRPAGE = "http://"+document.location.hostname+"/ProjetoWebMVC/";

    $('#FormSelect').on('submit', function(event){
        event.preventDefault();

        var Dados = $(this).serialize();

        $.ajax({
            url: DIRPAGE+'cadastro/seleciona',
            method: 'post',
            dataType: 'html',
            data: Dados,
            success: function(Dados){
                $('.Resultado').html(Dados);
            }
        });
    });

    
    $(document).on('click','.ImgEdit', function(){
        var ImgRel = $(this).attr('rel');
        //alert(ImgRel);
        console.log(DIRPAGE+'cadastro/puxaDB'+ImgRel);
        $.ajax({
            url: DIRPAGE+'cadastro/puxaDB/'+ImgRel,
            method: 'post',
            dataType: 'html',
            data: {'Id': ImgRel},
            success: function(data){
                $('.ResultadoFormulario').html(data);
            }
        });

    });

});