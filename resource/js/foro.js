
function enviarIdplazo(id) {
    //alert('Enviar '+idcont);
    $("#idp2").val(id);
}

function listforo(idu) { //alert(idu);
    $.ajax({
        url: '../../controller/foroController.php',
        type: 'POST',
        data: 'funcion=consultar'+'&idu='+idu
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp); 
        html = "<div class='col-lg-12'>"+
        "<div class='panel panel-default'>"+
            "<table class='table table-hover'>"+
                "<thead>"+
                    "<tr>"+
                    "<th>Nombre</th>"+
                    "<th>Descripcion</th>"+
                    "<th>Entradas</th>"+
                    "<th>Ultimo Mensaje</th>"+
                    "<th>Grupo</th>"+
                    "<th>Accion</th>"+
                "</tr>"+
            "</tr>"+
                "</thead>"+
                "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2];
            html += "<tr>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                    "<td>"+valores[i][4]+"</td>"+
                    "<td>"+valores[i][5]+"</td>"+
                    "<td>"+valores[i][7]+"</td>"+
                    "<td>"+
                        //<button class='btn btn-default' style='border-top-left-radius: 16px' data-toggle='modal' data-target='#mdactplazo' onclick='mostrarplazo(" + '"' + datos + '"' + ");'><span class='icon-pencil2'></span></button>"+
                        //"<button class='btn btn-primary' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='enviarIdplazo(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdelplazo'><span class='icon-bin2'></span></button>"+
                        "<button class='btn btn-default' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='list_topic(" + '"' + valores[i][0] + '"' + ", "+'"' +idu+ '"'+")'><span class='icon-bubble'></span></button>"+    
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#listforo").html(html);
        location.href='main.php#foro';
        showforo();
    });
}

function get_fgroup(valor) { //alert('new event');
    $.ajax({
        url: '../../controller/grupoController.php',
        type: 'POST',
        data: 'val=' + valor + '&funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp); //alert('Lista '+resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='addgrp' name='addgrp' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3] + "*" + valores[i][4];
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        html += "</select></td></tr></tbody></table>";
        $("#getfgroup").html(html);
    }); //location.href='../organizacion/tipocont.php';
}

function list_topic(idf, idu) { //alert(idu+ '__'+idf);
    $.ajax({
        url: '../../controller/foroController.php',
        type: 'POST',
        data: 'funcion=consult_topic'+'&idu='+idu+'&idf='+idf
    }).done(function(resp) { //alert(resp);
        $('#idforo').val(idf);
        $('#idadm').val(idu);
        var valores = eval(resp); 
        html = "<div class='col-lg-12'>"+
        "<div class='panel panel-default'>"+
            "<table class='table table-hover'>"+
                "<thead>"+
                    "<tr>"+
                    "<th>Titulo</th>"+
                    "<th>Fecha</th>"+
                    "<th>Repuestas</th>"+
                    "<th>Grupo</th>"+
                    "<th>Accion</th>"+
                "</tr>"+
            "</tr>"+
                "</thead>"+
                "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3] + "*" + valores[i][4] + "*" + valores[i][5] + "*" + valores[i][6] + "*" + valores[i][7];
            html += "<tr>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                    "<td>"+valores[i][6]+"</td>"+
                    "<td>"+valores[i][7]+"</td>"+
                    "<td>"+
                        //<button class='btn btn-default' style='border-top-left-radius: 16px' data-toggle='modal' data-target='#mdactplazo' onclick='mostrarplazo(" + '"' + datos + '"' + ");'><span class='icon-pencil2'></span></button>"+
                        //"<button class='btn btn-primary' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='enviarIdplazo(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdelplazo'><span class='icon-bin2'></span></button>"+
                        "<button class='btn btn-default' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='viewtopic(" + '"' + valores[i][0] + '"' + ")'><span class='icon-lock'></span></button>"+
                        "<button class='btn btn-default' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='listpost(" + '"' + datos + '"' + ", "+'"' +idu+ '"'+");'><span class='icon-envelop'></span></button>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#list_topic").html(html);
        location.href='main.php#topico';
        showforo();
    });
}

function listpost(datos, idu) { //alert('Messages'); alert(datos);
    var d = datos.split("*");
    var idtp =d[0];
    var grupo =d[7];
    var topico =d[1];
    var fecha =d[3];
    var replies =d[6];
    $.ajax({
        url: '../../controller/mensajeController.php',
        type: 'POST',
        data: 'funcion=consultar'+'&idtp='+idtp
    }).done(function(resp) { //alert(resp);
        var meses = new Array ("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
        var d = new Date();
        var fecact = d.getDate()+' '+meses[d.getMonth()]+', '+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
        var idresp = 0; //alert(fecact);

        var valores = eval(resp); //alert(valores.length); 
        html = "<div class='row'>"+
        "<div class='heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp' data-wow-duration='1200ms' data-wow-delay='300ms'>"+   
          "<div class='post-meta'>"+
              "<h2 class='grp-top'>"+grupo+" <span class='msg-top'>"+topico+"</span></h2>"+
          "<p>Adam Torrez "+fecha+"</p>"+  
            "<span><i class='fa fa-comments-o'></i> "+replies+" Comentario(s)</span>"+
            "<a class='own-icon fa fa-pencil' onclick='new_mesage(" + '"' + idtp + '"' + ", "+'"' +fecact+ '"'+", "+'"' +idresp+ '"'+", "+'"' +idu+ '"'+", "+'"' +datos+ '"'+");' data-toggle='modal' data-target='#regmsg' style='cursor: pointer' href='javascript:void(0)'></a>"+ 
          "</div>"+
        "</div>"+
      "</div>"+ 
        "<div class='load-more wow fadeInUp' data-wow-duration='1000ms' data-wow-delay='500ms'>"+
          "<a href='javascript:location.reload(true);' class='btn-loadmore'><i class='fa fa-repeat'></i> Actualizar</a>"+
        "</div>";
    if(valores.length > 0){
        for (i = 0; i < valores.length; i++) {
            dato = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2];
            
            html += "<div class='blog-posts'>"+
        "<div class='row'>"+
          "<div class='wow fadeInUp' data-wow-duration='1000ms' data-wow-delay='400ms'>"+
            "<div class='entry-header'>"+
              "<h4>"+valores[i][1]+"</h4>"+
              "<span class='date'>"+valores[i][4]+"</span>"+
              "<span class='cetagory'> <strong>"+valores[i][8]+"</strong></span>"+
            "</div>"+
            "<div class='entry-content'>"+
              "<p>"+valores[i][7]+"</p>"+
            "</div>"+
            "<div class='post-meta'>"+
                "<a style='cursor: pointer' onclick='view_submessage(" + '"' +valores[i][0]+ '"'+", "+'"' +idu+ '"'+");'><i class='fa fa-comments-o'></i> "+valores[i][2]+" Comentario(s)</a>"+
                "<a class='own-icon fa fa-pencil' onclick='new_mesage(" + '"' + idtp + '"' + ", "+'"' +fecact+ '"'+", "+'"' +valores[i][0]+ '"'+", "+'"' +idu+ '"'+", "+'"' +datos+ '"'+");' data-toggle='modal' data-target='#regmsg' style='cursor: pointer' href='javascript:void(0)'></a>"+
            "</div>"+
            "<div class='' id='u"+valores[i][0]+"'></div>"+
          "</div>"+              
        "</div>"+                
      "</div>";
        }
    
        html += "</div>"; 
    }
        $("#post-list").html(html);
        location.href='main.php#blog';
        //showforo();
    });
}

function new_mesage(idtp, fecact, idresp, idu, datos) {
    $('#idtop').val(idtp);
    $('#idrpm').val(idresp);
    $('#fecact').val(fecact);
    $('#idmu').val(idu);
    $('#idfup').val(0);
    var d = datos.split("*"); //alert(d);
    $('#fltp').val(d[0]);
    $('#flgr').val(d[7]);
    $('#flin').val([1]);
    $('#flfc').val(d[3]);
    $('#flcr').val(d[6]);
    //var datosform = $('#reg-msg').serialize(); alert(datosform);
}

function registermessage() { //alert('new');
    var idresp = $('#idrpm').val();
    var idu = $('#idmu').val();
    var idf = $('#idfup').val(); //alert(idresp+'__'+idu+'__'+idf);
    var datosform = $('#reg-msg').serialize(); //alert(datosform);

    datos = $('#fltp').val()+"*"+$('#flin').val()+"*"+$('#flin').val()+"*"+$('#flfc').val()+"*"+$('#flfc').val()+"*"+$('#flfc').val()+"*"+$('#flcr').val()+"*"+$('#flgr').val();
    //alert(datos);
    
    $.ajax({
        url: '../../controller/mensajeController.php',
        type: 'POST',
        data: datosform +'&funcion=registrar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#msgexit').show().fadeToggle(5000);
            if(idresp>0) view_submessage(idresp, idu);
            else listpost(datos, idu);
        } else {
            alert(resp);
        }
    });
    $('#contmp').val('');
}

function view_submessage(idmp, idu) { //alert(idmp+'__'+idu);
    $.ajax({
        url: '../../controller/mensajeController.php',
        type: 'POST',
        data: 'funcion=sub_msg'+'&idmp='+idmp
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp); //alert(valores.length);
    
    if(valores.length > 0){
        var meses = new Array ("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
        var d = new Date();
        var fecact = d.getDate()+' '+meses[d.getMonth()]+', '+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
        //alert(fecact+'__inside if');

        //alert(valores.length);
        
        html = "";
        for (i = 0; i < valores.length; i++) {
            //datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2];
            
            html += "<div class=''>"+
        "<div class='row'>"+
          "<div class='wow fadeInUp' data-wow-duration='1000ms' data-wow-delay='400ms'>"+
            "<div class='entry-header'>"+
              "<h5>"+valores[i][1]+"</h5>"+
              "<span class='date'>"+valores[i][4]+"</span>"+
              "<span class='cetagory'> <strong>"+valores[i][8]+"</strong></span>"+
            "</div>"+
            "<div class='entry-content'>"+
              "<p>"+valores[i][7]+"</p>"+
            "</div>"+
            "<div class='post-meta'>"+
                "<a style='cursor: pointer' onclick='view_submessage(" + '"' +valores[i][0]+ '"'+", "+'"' +idu+ '"'+");'><i class='fa fa-comments-o'></i> "+valores[i][2]+" Comentario(s)</a>"+
                "<a class='own-icon fa fa-pencil' onclick='new_mesage(" + '"' + valores[i][5] + '"' + ", "+'"' +fecact+ '"'+", "+'"' +valores[i][0]+ '"'+", "+'"' +idu+ '"'+", "+'"' +valores[i][9]+ '"'+");' data-toggle='modal' data-target='#regmsg' style='cursor: pointer' href='javascript:void(0)'></a>"+
            "</div>"+
            "<div class='' id='u"+valores[i][0]+"'></div>"+
          "</div>"+              
        "</div>"+                
      "</div>";
        }
        //alert(valores.length+' ending');
        html += "</div>";  //alert("#u"+idmp);
        //alert(html);
        $("#u"+idmp).html(html);
    }
        
        //location.href='main.php#blog';
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
function registerforo(adm) {
    var datosform = $('#regfrm').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/foroController.php',
        type: 'POST',
        data: datosform +'&funcion=registrar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#foroexit').show().fadeToggle(5000);
            listforo(adm);
        } else {
            alert(resp);
        }
    });
    clearform('regfrm');
}

function registertopic() {
    var idf = $('#idforo').val();
    var idu = $('#idadm').val();
    var datosform = $('#reg-topic').serialize(); alert(datosform);
    $.ajax({
        url: '../../controller/foroController.php',
        type: 'POST',
        data: datosform +'&funcion=reg_topic'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#topicexit').show().fadeToggle(5000);
            list_topic(idf, idu);
        } else {
            alert(resp);
        }
    });
    clearform('reg-topic');
}

function clearcont(form) {
    $("#"+form+" :input").each(function() {
        $(this).val('');
    });
}

function showforo() {
    $('#foro').css('visibility', 'visible');
    $('#listforo').css('visibility', 'visible');
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
