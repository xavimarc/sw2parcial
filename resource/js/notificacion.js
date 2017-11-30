
function listnotify(valor) { //alert(valor);
    $.ajax({
        url: '../../controller/notificacionController.php',
        type: 'POST',
        data: 'val=' + valor + '&funcion=consultarall'
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp); 
        html = "<div class='panel-body'>"+
        "<div class='dataTable_wrapper'>"+
        "<table class='table table-striped table-bordered table-hover text-center' style='width: auto; height: auto' id='dataTables-example'>"+
            "<thead>"+
                "<tr>"+
                    "<th>Mensaje</th>"+
                    "<th>Fecha</th>"+
                    "<th>Hora</th>"+
                    "<th>Estado</th>"+
                    "<th>Asunto</th>"+
                    "<th>Administrador/a</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3] + "*" + valores[i][4] + "*" + valores[i][5] + "*" + valores[i][6];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                    "<td>"+valores[i][4]+"</td>"+
                    "<td>"+valores[i][5]+"</td>"+
                    "<td>"+valores[i][6]+"</td>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#listnotif").html(html);
        location.href='main.php#notify';
    });
}

function registernot(adm, fecha, hora) {
    var datosform = $('#regnotif').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/notificacionController.php',
        type: 'POST',
        data: datosform+'&admn='+adm +'&estn=No Leido' +'&fecn='+fecha +'&hora='+hora + '&funcion=registrar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#notexit').show().fadeToggle(5000);
            listnotify(adm);
        } else {
            alert(resp);
        }
    });
    clearform('regnotif');
}

function shownotify() {
    $('#notify').css('visibility', 'visible');
}

function get_asunt() { //alert('new event');
    $.ajax({
        url: '../../controller/notificacionController.php',
        type: 'POST',
        data: 'funcion=getasunt'
    }).done(function(resp) {
        var valores = eval(resp); //alert('Lista '+resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='ast' name='ast' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        html += "</select></td><td></button><button class='btn btn-info' data-toggle='modal' data-target='#mdregast'><span class='icon-plus'></span></button></td></tr></tbody></table>";
        $("#nasunt").html(html);
    }); //location.href='../organizacion/tipocont.php';
}

function get_notifcont(adm) { //alert('new event '+adm);
    $.ajax({
        url: '../../controller/contactoController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp); //alert('Lista '+resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='contn' name='contn' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        $("#ncont").html(html);
    }); //location.href='../../contactoController.php';
}

function changenot(idn){
    $.ajax({
        url: '../../controller/notificacionController.php',
        type: 'POST',
        data: 'idn=' + idn + '&funcion=cambiarest'
    });
}

/*function cambiar_estado(idn) { //alert('new event '+adm);
    $.ajax({
        url: '../../controller/notificacionController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp); //alert('Lista '+resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='contn' name='contn' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        $("#ncont").html(html);
    }); //location.href='../../contactoController.php';
}*/



//function mostrarcant(adm){
//    $.ajax({
//        url: '../../controller/notificacionController.php',
//        type: 'POST',
//        data: 'val=' + adm + '&funcion=countmsg'
//    }).done(function(resp) { //alert(resp);
//        var valores = eval(resp);
//        if(valores[0][0] !== null){
//            html = valores[0][0];
//            $("#count").html(html);
//        }
//    });
//}
//
//function cargarnotif(adm){
//    setInterval(mostrarcant(adm), 4000);
//}