
function enviarIdplazo(id) {
    //alert('Enviar '+idcont);
    $("#idp2").val(id);
}

function listplazo() { //alert(valor);
    $.ajax({
        url: '../../controller/plazoController.php',
        type: 'POST',
        data: 'funcion=consultar'
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp); 
        html = "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Fecha Inicio</th>"+
                    "<th>Fecha Fin</th>"+
                    "<th>Accion</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                    "<td><button class='btn btn-default' style='border-top-left-radius: 16px' data-toggle='modal' data-target='#mdactplazo' onclick='mostrarplazo(" + '"' + datos + '"' + ");'><span class='icon-pencil2'></span></button>"+
                        "<button class='btn btn-primary' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='enviarIdplazo(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdelplazo'><span class='icon-bin2'></span></button>"+
                        
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#listplazo").html(html);
        location.href='main.php#plazo';
    });
}

function get_contact(grupo) { //alert('new event');
    $.ajax({
        url: '../../grupoController.php',
        type: 'POST',
        data: 'funcion=getcontact'
    }).done(function(resp) {
        var valores = eval(resp); //alert('Lista '+resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='addcon' name='addcon' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3] + "*" + valores[i][4];
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        html += "</select></td><td></button><button class='btn btn-info' data-toggle='modal' data-target='#mdregtct'><span class='icon-plus'></span></button></td></tr></tbody></table>";
        $("#getipocont").html(html);
    }); //location.href='../organizacion/tipocont.php';
}

function confirmcont() {
    var datosform = $('#loginform').serialize(); //alert(datosform);
    $.ajax({
        url: 'controller/usuarioController.php',
        type: 'POST',
        data: datosform + '&funcion=ingresar'
    }).done(function(resp) {
        if (resp == 'fallo') { //alert(resp);
            $('#wronglog').show().fadeToggle(5000);
        } else {
            location.href = 'view/inc+q.lude/main.php';
        }
    });
}
function mostrarplazo(datos) {    
    var d = datos.split("*");
    $("#idp").val(d[0]);
    $("#fechaini1").val(d[1]);
    $("#fechafin1").val(d[2]);

}
function registerplazo() {
    var datosform = $('#reg-plazo').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/plazoController.php',
        type: 'POST',
        data: datosform +'&funcion=registrar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#plazoexit').show().fadeToggle(5000);
            listplazo();
        } else {
            alert(resp);
        }
    });
    clearform('reg-plazo');
}

function clearcont(form) {
    $("#"+form+" :input").each(function() {
        $(this).val('');
    });
}

function showplazo() {
    $('#plazo').css('visibility', 'visible');
    //$('#categoria').css('visibility', 'hidden');
    //$('#contacto').css('visibility', 'hidden');
    //$('#te4m').css('visibility', 'hidden');
}

function updateplazo() {
    var datosform = $('#updateplazo').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/plazoController.php',
        type: 'POST',
        data: datosform + '&funcion=actualizar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#updplazoxit').show().fadeToggle(8000);
            listplazo();
        } else {
            alert(resp);
        }
    });
    clearform('updateplazo');
}
function eliminarplazo() {
    //showall();
    var id = $('#delete-plazo').serialize();
    //alert(id+'__'+adm);
    $.ajax({
        url: '../../controller/plazoController.php',
        type: 'POST',
        data: id + '&funcion=eliminar'
    }).done(function(resp) {
        if (resp === 'exito') {
            $('#plazo-del').show().fadeToggle(8000);
            /*$('#delete-cont').hide(3000);
            $('#contdelet').hide(3000);*/
            listplazo();
        } else {
            alert(resp);
        }
    });
}
