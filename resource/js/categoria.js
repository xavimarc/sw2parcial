
function enviarIdcat(id) {
    //alert('Enviar '+idcont);
    $("#idcat2").val(id);
}

function listcat() { //alert(valor);
    $.ajax({
        url: '../../controller/categoriaController.php',
        type: 'POST',
        data: 'funcion=consultar'
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp); 
        html = "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Nombre</th>"+
                    "<th>Accion</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td><button class='btn btn-default' style='border-top-left-radius: 16px' data-toggle='modal' data-target='#mdactcateg' onclick='mostrarcat(" + '"' + datos + '"' + ");'><span class='icon-pencil2'></span></button>"+
                        "<button class='btn btn-primary' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='enviarIdcat(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdelcateg'><span class='icon-bin2'></span></button>"+
                        
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#listcateg").html(html);
        location.href='main.php#categoria';
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
function mostrarcat(datos) {    
    var d = datos.split("*");
    $("#idcat").val(d[0]);
    $("#namecat1").val(d[1]);

}
function registercat() {
    var datosform = $('#reg-categ').serialize(); alert(datosform);
    $.ajax({
        url: '../../controller/categoriaController.php',
        type: 'POST',
        data: datosform +'&funcion=registrar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#categexit').show().fadeToggle(5000);
            listcat();
        } else {
            alert(resp);
        }
    });
    clearform('regcateg');
}

function clearcont(form) {
    $("#"+form+" :input").each(function() {
        $(this).val('');
    });
}

function showcateg() {
    $('#categoria').css('visibility', 'visible');
    //$('#contacto').css('visibility', 'hidden');
    //$('#te4m').css('visibility', 'hidden');
}

function updatecat() {
    var datosform = $('#updatecateg').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/categoriaController.php',
        type: 'POST',
        data: datosform + '&funcion=actualizar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#updcatexit').show().fadeToggle(8000);
            listcat();
        } else {
            alert(resp);
        }
    });
    clearform('updategrupo');
}
function eliminarcat(adm) {
    //showall();
    var id = $('#delete-categ').serialize();
    //alert(id+'__'+adm);
    $.ajax({
        url: '../../controller/categoriaController.php',
        type: 'POST',
        data: id + '&adm='+ adm + '&funcion=eliminar'
    }).done(function(resp) {
        if (resp === 'exito') {
            $('#categ-del').show().fadeToggle(8000);
            /*$('#delete-cont').hide(3000);
            $('#contdelet').hide(3000);*/
            listcat();
        } else {
            alert(resp);
        }
    });
}
