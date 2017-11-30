
function enviarIdSub(id) {
    $("#idt2").val(id);
}
function lista_subtarea(admin) {
    $.ajax({
        url: '../../controller/subtareaController.php',
        type: 'POST',
        data: 'adm='+admin+'&funcion=workasign'
    }).done(function(resp) {
        var valores = eval(resp); 
        html = "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Nombre</th>"+
                    "<th>Estado</th>"+
                    "<th>Encargado</th>"+
                    "<th>Proceso</th>"+
                    "<th>Fecha Inicio</th>"+
                    "<th>Fecha Fin</th>"+
                    "<th>Accion</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3] + "*" + valores[i][4] + "*" + valores[i][5] + "*" + valores[i][6] + "*" + valores[i][7] + "*" + valores[i][8] + "*" + valores[i][9];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                    "<td>"+valores[i][4]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                    "<td>"+valores[i][5]+"</td>"+
                    "<td>"+valores[i][6]+"</td>"+
                    "<td><button class='btn btn-default' style='border-top-left-radius: 16px' data-toggle='modal' data-target='#mdactsub' onclick='mostrarsub(" + '"' + datos + '"' + ");'><span class='icon-pencil2'></span></button>"+
                        "<button class='btn btn-primary' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='enviarIdSub(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdelsub'><span class='icon-bin2'></span></button>"+
                        
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#listsub").html(html);
        work_4do(admin)
        location.href='main.php#subtarea';
    });
}

function get_subcont(adm) {
    $.ajax({
        url: '../../controller/contactoController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=consulteam'
    }).done(function(resp) {
        var valores = eval(resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='cont' name='cont' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        $("#contsub").html(html);
    });
}

function get_subproc(adm) {
    $.ajax({
        url: '../../controller/procesoController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='proc' name='proc' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            var cod=valores[i][0];
            html += "<option value='" + cod + "'>" + valores[i][1] +" | "+ valores[i][3] + "</option>";
        }
        $("#procsub").html(html);
    });
}
function get_subplazo() {
    $.ajax({
        url: '../../controller/plazoController.php',
        type: 'POST',
        data: 'funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='pla' name='pla' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">Inicio: " + valores[i][1]+' | Fin: ' +valores[i][2] + "</option>";
        }
        html += "</select></td><td></button><button class='btn btn-info' data-toggle='modal' data-target='#regplazo'><span class='icon-plus'></span></button></td></tr></tbody></table>";
        $("#plasub").html(html);
    });
}
function mostrarsub(datos) {    
    var d = datos.split("*");
    $("#idt").val(d[0]);
    $("#nombt2").val(d[1]);
    $("#est2").val(d[2]);
}
function registersub(admin) {
    var datosform = $('#reg-sub').serialize();
    $.ajax({
        url: '../../controller/subtareaController.php',
        type: 'POST',
        data: datosform +'&funcion=registrar'
    }).done(function(resp) {
        if (resp === 'exito') {
            $('#subexit').show().fadeToggle(5000);
            lista_subtarea(admin);
        } else {
            alert(resp);
        }
    });
    clearform('reg-sub');
}
function clearcont(form) {
    $("#"+form+" :input").each(function() {
        $(this).val('');
    });
}
function showsubtarea() {
    $('#subtarea').css('visibility', 'visible');
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
function eliminarsub(adm) {
    var id = $('#delete-sub').serialize();
    $.ajax({
        url: '../../controller/subtareaController.php',
        type: 'POST',
        data: id + '&funcion=eliminar'
    }).done(function(resp) {
        if (resp === 'exito') {
            $('#sub-del').show().fadeToggle(8000);
            lista_subtarea(adm);
        } else {
            alert(resp);
        }
    });
}

function time_proc(adm) {
    $.ajax({
        url: '../../controller/procesoController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp);
        html = "<div class='panel-body'>"+
        "<div class='dataTable_wrapper' style='background-color: rgba(255, 255, 255, .8)'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Proceso</th>"+
                    "<th>Porcentaje</th>"+
                    "<th>Proyecto</th>"+
                    "<th>Fecha Inicio</th>"+
                    "<th>Fecha Fin</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                    "<td>"+valores[i][4]+"</td>"+
                    "<td>"+valores[i][5]+"</td>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#tm4proc").html(html);
    });
}

function cont_group(adm) {
    var proc = $("#proc").val();
    $.ajax({
        url: '../../controller/subtareaController.php',
        type: 'POST',
        data: 'proc=' + proc + '&adm=' + adm + '&funcion=contgroup'
    }).done(function(resp) {
        var valores = eval(resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='cont' name='cont' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][1] + ">" + valores[i][2] + " | " + valores[i][0] + "</option>";
        }
        $("#contsub").html(html);
    });
}

function work_4do(adm) {
    $.ajax({
        url: '../../controller/subtareaController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp); 
        html="<div class='col-lg-12'>"+
        "<h3 class='page-header' style='color: rgba(128, 128, 128, 0.9);'><span class='icon-cog'> </span> <b>Subtareas Recibidas</b></h3>"+
        "<a class='icon-arrow-up' style='cursor: pointer' href='#wrapper'</a>"+
        "<a class='icon-file-zip' style='cursor: pointer; padding-left: 2%' href='javascript:void(0)' data-toggle='modal' data-target='#regrec' onclick='"+get_recsub(adm)+"'></a>"+
        "</div>";
        html += "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Nombre</th>"+
                    "<th>Estado</th>"+
                    "<th>Proceso</th>"+
                    "<th>Encargado</th>"+
                    "<th>Fecha Inicio</th>"+
                    "<th>Fecha Fin</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                    "<td>"+valores[i][6]+"</td>"+
                    "<td>"+valores[i][7]+"</td>"+
                    "<td>"+valores[i][8]+"</td>"+
                    "<td>"+valores[i][9]+"</td>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#addsubt").html(html);
    });
}