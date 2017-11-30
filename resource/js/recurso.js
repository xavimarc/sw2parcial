function newfolder(valor){
    $.ajax({
        url: '../../resource/recurso/add.php',
        type: 'POST',
        data: "new="+valor
    });
}

function enviarIdRec(id) {
    $("#idr").val(id);
}
function lista_recurso(admin, name) {
    $.ajax({
        url: '../../controller/recursoController.php',
        type: 'POST',
        data: 'adm='+admin+'&funcion=allres'
    }).done(function(resp) {
        var valores = eval(resp); 
        html = "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Nombre</th>"+
                    "<th>Proceso</th>"+
                    "<th>Subtarea</th>"+
                    "<th>Estado Subtarea</th>"+
                    "<th>Encargado</th>"+
                    "<th>Accion</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3] + "*" + valores[i][4] + "*" + valores[i][5] + "*" + valores[i][6];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][5]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                    "<td>"+valores[i][4]+"</td>"+
                    "<td>"+valores[i][6]+"</td>"+
                    "<td><a class='icon-download3' style='font-size:150%' href='../"+valores[i][2]+"' download='"+valores[i][1]+"'></a>"+
                     "<button class='btn btn-primary' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='enviarIdRec(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdelrec'><span class='icon-bin2'></span></button>"+
                "</td></tr>";
        }
        html += "</tbody></table></div></div>";
        $("#listrec").html(html);
        location.href='main.php#recurso';
    });
}
function get_recsub(adm) {
    $.ajax({
        url: '../../controller/subtareaController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='sbr' name='sbr' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        $("#rsub").html(html);
    });
}

function mostrarec(datos) {    
    var d = datos.split("*");
    $("#idt").val(d[0]);
    $("#nombt2").val(d[1]);
    $("#est2").val(d[2]);
}
function addrecurso() {
    var sub=$('#sbr').val();
    $.ajax({
        url: '../../controller/recursoController.php',
        type: 'POST',
        data: 'sbr='+sub +'&funcion=newrecurso'
    });
}
function showrecurso() {
    $('#recurso').css('visibility', 'visible');
}
function updatesub(adm) {
    var datosform = $('#updatesub').serialize();
    $.ajax({
        url: '../../controller/subtareaController.php',
        type: 'POST',
        data: datosform + '&funcion=actualizar'
    }).done(function(resp) {
        if (resp === 'exito') {
            $('#updsubexit').show().fadeToggle(8000);
            lista_subtarea(adm);
        } else {
            alert(resp);
        }
    });
    clearform('updsubexit');
}
function eliminarec(adm) {
    var id = $('#delete-rec').serialize();
    $.ajax({
        url: '../../controller/recursoController.php',
        type: 'POST',
        data: id + '&funcion=eliminar'
    }).done(function(resp) {
        if (resp === 'exito') {
            $('#rec-del').show().fadeToggle(8000);
            lista_recurso(adm);
        } else {
            alert(resp);
        }
    });
}