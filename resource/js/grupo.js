function enviarIdGrupo(id) {
    //alert('Enviar '+idcont);
    $("#idgrupo2").val(id);
}

function listgrupo(valor) { //alert(valor);
    $.ajax({
        url: '../../controller/grupoController.php',
        type: 'POST',
        data: 'val=' + valor + '&funcion=consultar'
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
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td><button class='btn btn-default' style='border-top-left-radius: 16px' data-toggle='modal' data-target='#mdactgrupo' onclick='mostrargrupo(" + '"' + datos + '"' + ");'><span class='icon-pencil2'></span></button>"+
                        "<button class='btn btn-primary' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='enviarIdGrupo(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdelgrupo'><span class='icon-bin2'></span></button>"+
                        "<button class='btn btn-default' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='get_contacts(" + '"' + valor + '"' + ", " + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#addcontact'><span class='icon-users'></span></button>"+
                        "<button class='btn btn-primary' style='border-bottom-right-radius: 14px' onclick='getTeam(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#contactdet'><span class='icon-book'></span></button></td>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#listgroup").html(html);
        ingroup(valor);
        location.href='main.php#te4m';
    });
}

function ingroup(valor) { //alert(valor);
    $.ajax({
        url: '../../controller/grupoController.php',
        type: 'POST',
        data: 'val=' + valor + '&funcion=ingroup'
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp); 
        html="<div class='col-lg-12'>"+
        "<h3 class='page-header' style='color: rgba(128, 128, 128, 0.9);'><span class='icon-users'> </span> <b>Parte de los Grupos</b></h3>"+
        "<a class='icon-arrow-up' href='#wrapper'> </a></div>";
        html += "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Nombre</th>"+
                    "<th>Administrador/a</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#addgroup").html(html);
    });
}
function fondo(i){
    if(i%2===1) return "style='background-color: rgba(255, 255, 255, 0.7)'";
    else return "style=''";
}
function get_contacts(valor, grupo) { //alert('admin '+valor+' grupo '+grupo);
    $.ajax({
        url: '../../controller/grupoController.php',
        type: 'POST',
        data: 'val=' + valor + '&idg=' + grupo + '&funcion=detgrupo'
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp);
        html = "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr style='color: rgba(255, 255, 255, 1)'>"+
                    "<th>Nombre</th>"+
                    "<th>Email</th>"+
                    "<th>Agregar</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3];
            html += "<tr class='odd gradeX' "+fondo(i)+">"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                    "<td><input type='checkbox' name='check[" + '"' + i + '"' + "]' id='checkbox' value='"+valores[i][0]+"' class='form-control'></td>"+
                "</tr>";
        }
        html +="<input type='hidden' id='idg' name='idg' value='" + grupo + "'>";
        html += "</tbody></table></div></div>";
        $("#addconts").html(html);
    }); 
}

function getTeam(valor) { //alert(valor);
    $.ajax({
        url: '../../controller/grupoController.php',
        type: 'POST',
        data: 'idg=' + valor + '&funcion=geteam'
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp);
        html = "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr style='color: rgba(255, 255, 255, 1)'>"+
                    "<th>Nombre</th>"+
                    "<th>Celular</th>"+
                    "<th>Email</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3];
            html += "<tr class='odd gradeX' "+fondo(i)+">"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#det-cont").html(html);
    });
}

function addgroup(adm) {
    var datosform = $('#regdetgroup').serialize(); //alert(datosform);
    //var valores = eval(datosform); alert(valores);
    $.ajax({
        url: '../../controller/grupoController.php',
        type: 'POST',
        data: datosform + '&adm=' + adm + '&funcion=addcontact'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#detgrupoexit').show().fadeToggle(5000);
        } else {
            alert(resp);
        }
    });
    clearform('regdetgroup');
}

function mostrargrupo(datos) {    
    var d = datos.split("*");
    $("#grupo3").val(d[0]);
    $("#nameg").val(d[1]);

}
function registergroup(adm) {
    var datosform = $('#regroup').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/grupoController.php',
        type: 'POST',
        data: datosform + '&adm=' + adm + '&funcion=registrar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#grupoexit').show().fadeToggle(5000);
            listgrupo(adm);
        } else {
            alert(resp);
        }
    });
    clearform('regroup');
}

function showgroup() {
    $('#te4m').css('visibility', 'visible');
    //$('#contacto').css('visibility', 'hidden');
}

function updategrupo(adm) {
    var datosform = $('#updategrupo').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/grupoController.php',
        type: 'POST',
        data: datosform + '&funcion=actualizar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#updgrupoexit').show().fadeToggle(8000);
            listgrupo(adm);
        } else {
            alert(resp);
        }
    });
    clearform('updategrupo');
}
function eliminargrupo(adm) {
    //showall();
    var id = $('#delete-grupo').serialize();
    //alert(id+'__'+adm);
    $.ajax({
        url: '../../controller/grupoController.php',
        type: 'POST',
        data: id + '&adm='+ adm + '&funcion=eliminar'
    }).done(function(resp) {
        if (resp === 'exito') {
            $('#grupo-del').show().fadeToggle(8000);
            /*$('#delete-cont').hide(3000);
            $('#contdelet').hide(3000);*/
            listgrupo(adm);
        } else {
            alert(resp);
        }
    });
}
