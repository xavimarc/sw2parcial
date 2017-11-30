$(function(){
    $('#sendfile').click(subirFotos)
});

function subirFotos(){
    var archivos=document.getElementById("archivos");
    var archivo=archivos.files; 
    var archivos=new FormData();
    for(i=0;i<archivo.length;i++){
        archivos.append('Archivo'+i, archivo[i]);
    }
    var news = $('#sbr').val(); //alert(news);
    $.ajax({
        url:'../../controller/pictureup.php',
        type:'POST',
        contentType:false,
        data:archivos,
        processData:false,
        cache:false
    }).done(function(msg){
        if(msg==='exito'){
            $('#recexit').show().fadeToggle(8000);
            clearform('regrec');
        }
        else alert(msg); //$('#recfail').show().fadeToggle(8000);
    });
}

function addpicture(valor){
    $.ajax({
        url: '../../controller/sesion.php',
        type: 'GET',
        data: "new="+valor
    });
}