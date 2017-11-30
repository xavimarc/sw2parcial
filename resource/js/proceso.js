
function enviarIdproceso(id) {
    //alert('Enviar '+idcont);
    $("#idp3").val(id);
}

function listproceso(adm) { //alert(valor);
    $.ajax({
        url: '../../controller/procesoController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=consultar'
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp); 
        html = "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Nombre</th>"+
                    "<th>Avance</th>"+
                    "<th>Proyecto</th>"+
                    "<th>Fecha Inicio</th>"+
                    "<th>Fecha Fin</th>"+
                    "<th>Accion</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3] + "*" + valores[i][4] + "*" + valores[i][5];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                    "<td>"+valores[i][4]+"</td>"+
                    "<td>"+valores[i][5]+"</td>"+
                    "<td><button class='btn btn-default' style='border-top-left-radius: 16px' data-toggle='modal' data-target='#mdactproceso' onclick='mostrarproceso(" + '"' + datos + '"' + ");'><span class='icon-pencil2'></span></button>"+
                        "<button class='btn btn-primary' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='enviarIdproceso(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdelproceso'><span class='icon-bin2'></span></button>"+
                        
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#listproceso").html(html);
        inproceso(adm);
        location.href='main.php#proceso';
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
function mostrarproceso(datos) {    
    var d = datos.split("*");
    $("#idp1").val(d[0]);
    $("#nombrep1").val(d[1]);
    $("#avance1").val(d[2]);
    $("#idpro1").val(d[3]);
    $("#idpla2").val(d[4]);

}
function registerproceso(adm) {
    var datosform = $('#reg-proceso').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/procesoController.php',
        type: 'POST',
        data: datosform +'&funcion=registrar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#procesoexit').show().fadeToggle(5000);
            listproceso(adm);
        } else {
            alert(resp);
        }
    });
    clearform('reg-proceso');
}

function clearcont(form) {
    $("#"+form+" :input").each(function() {
        $(this).val('');
    });
}

function showproceso() {
    $('#proceso').css('visibility', 'visible');
    //$('#categoria').css('visibility', 'hidden');
    //$('#plazo').css('visibility', 'hidden');
    //$('#contacto').css('visibility', 'hidden');
    //$('#te4m').css('visibility', 'hidden');
}

function updateproceso(adm) {
    var datosform = $('#updateproceso').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/procesoController.php',
        type: 'POST',
        data: datosform + '&funcion=actualizar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#updprocesoexit').show().fadeToggle(8000);
            listproceso(adm);
        } else {
            alert(resp);
        }
    });
    clearform('updateproceso');
}
function eliminarproceso() {
    //showall();
    var id = $('#delete-proceso').serialize();
    //alert(id+'__'+adm);
    $.ajax({
        url: '../../controller/procesoController.php',
        type: 'POST',
        data: id + '&funcion=eliminar'
    }).done(function(resp) {
        if (resp === 'exito') {
            $('#proceso-del').show().fadeToggle(8000);
            /*$('#delete-cont').hide(3000);
            $('#contdelet').hide(3000);*/
            listproceso();
        } else {
            alert(resp);
        }
    });
}

function get_proyecto(adm) { //alert('new event');
    $.ajax({
        url: '../../controller/ProyectoController.php',
        type: 'POST',
        data: 'adm=' + adm + '&funcion=getproyect'
    }).done(function(resp) {
        var valores = eval(resp); //alert('Lista '+resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='idpro' name='idpro' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        $("#getpro").html(html);
    }); //location.href='../organizacion/tipocont.php';
}
function get_pla() { //alert('new event');
    $.ajax({
        url: '../../controller/plazoController.php',
        type: 'POST',
        data: 'funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp); //alert('Lista '+resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='idpla' name='idpla' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">Inicio: " + valores[i][1]+' | Fin: ' +valores[i][2] + "</option>";
        }
        html += "</select></td><td></button><button class='btn btn-info' data-toggle='modal' data-target='#regplazo'><span class='icon-plus'></span></button></td></tr></tbody></table>";
        $("#gpla").html(html);
    }); //location.href='../organizacion/tipocont.php';
}

function inproceso(adm) { //alert(valor);
    $.ajax({
        url: '../../controller/procesoController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=inproceso'
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp); 
        html="<div class='col-lg-12'>"+
        "<h3 class='page-header' style='color: rgba(128, 128, 128, 0.9);'><span class='icon-cogs'> </span> <b>Parte de los Procesos</b></h3>"+
        "<a class='icon-arrow-up' href='#wrapper'> </a></div>";
        html += "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Nombre</th>"+
                    "<th>Subtarea</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#addproceso").html(html);
    });
}

function time_proy(adm) { //alert(adm);
    $.ajax({
        url: '../../controller/proyectoController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=consultar'
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp);
        html = "<div class='panel-body'>"+
        "<div class='dataTable_wrapper' style='background-color: rgba(255, 255, 255, .8)'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Proyecto</th>"+
                    "<th>Grupo</th>"+
                    "<th>Categoria</th>"+
                    "<th>Fecha Inicio</th>"+
                    "<th>Fecha Fin</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][4]+"</td>"+
                    "<td>"+valores[i][5]+"</td>"+
                    "<td>"+valores[i][6]+"</td>"+
                    "<td>"+valores[i][7]+"</td>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#tm4proy").html(html);
    });
}