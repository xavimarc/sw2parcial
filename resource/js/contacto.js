
function enviarIdCont(id) {
    //alert('Enviar '+idcont);
    $("#idcon").val(id);
}

function listcont(valor) { //alert(valor);
    $.ajax({
        url: '../../controller/contactoController.php',
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
                    "<th>Celular</th>"+
                    "<th>Email</th>"+
                    "<th>Accion</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                    "<td><button class='btn btn-default' style='border-top-left-radius: 16px' data-toggle='modal' data-target='#mdactcont' onclick='mostrarcont(" + '"' + datos + '"' + ");'><span class='icon-pencil2'></span></button>"+
                        "<button class='btn btn-primary' style='border-bottom-right-radius: 14px' onclick='enviarIdCont(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdelcont'><span class='icon-bin2'></span></button></td>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#listcont").html(html);
        location.href='main.php#contacto';
    });
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
            location.href = 'view/include/main.php';
        }
    });
}
function mostrarcont(datos) {    
    var d = datos.split("*");
    $("#adm2").val(d[0]);
    $("#name4").val(d[1]);
    $("#cel4").val(d[2]);
    $("#user5").val(d[3]);
}
function registercont(adm) {
    var datosform = $('#regcontact').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/contactoController.php',
        type: 'POST',
        data: datosform+'&adm='+adm + '&funcion=registrar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#contexit').show().fadeToggle(5000);
            listcont(adm);
        } else {
            alert(resp);
        }
    });
    clearform('regcontact');
}

function clearcont(form) {
    $("#"+form+" :input").each(function() {
        $(this).val('');
    });
}

function showcont() {
    $('#contacto').css('visibility', 'visible');
    //$('#te4m').css('visibility', 'hidden');
}

function updatecont(adm) {
    var datosform = $('#updatecont').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/contactoController.php',
        type: 'POST',
        data: datosform + '&funcion=actualizar'
    }).done(function(resp) { //alert(resp);
        if (resp == 'exito') {
            $('#updcontexit').show().fadeToggle(8000);
            listcont(adm);
        } else {
            alert(resp);
        }
    });
    clearform('updatecont');
}
function showall(){
    $('#delete-cont').fadeTo(2000, 1);
    $('#contdelet').fadeTo(2000, 1);
}
function eliminarcont(adm) {
    //showall();
    var id = $('#delete-cont').serialize();
    //alert(id+'__'+adm);
    $.ajax({
        url: '../../controller/contactoController.php',
        type: 'POST',
        data: id + '&adm='+ adm + '&funcion=eliminar'
    }).done(function(resp) {
        if (resp === 'exito') {
            $('#contact-del').show().fadeToggle(8000);
            /*$('#delete-cont').hide(3000);
            $('#contdelet').hide(3000);*/
            listcont(adm);
        } else {
            alert(resp);
        }
    });
}
