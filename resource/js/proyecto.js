
function enviarIdproyecto(id) {
    //alert('Enviar '+idcont);
    $("#idpro3").val(id);
}

function listproyecto(adm) { //alert(valor);
    $.ajax({
        url: '../../controller/proyectoController.php',
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
                    "<th>Prioridad</th>"+
                    "<th>Porcentaje</th>"+
                    "<th>Grupo</th>"+
                    "<th>Categoria</th>"+
                    "<th>Fecha Inicio</th>"+
                    "<th>Fecha Fin</th>"+
                    "<th>Accion</th>"+
                "</tr>"+
            "</thead>"+
            "<tbody>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3] + "*" + valores[i][4] + "*" + valores[i][5] + "*" + valores[i][6] + "*" + valores[i][7];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                    "<td>"+valores[i][3]+"</td>"+
                    "<td>"+valores[i][4]+"</td>"+
                    "<td>"+valores[i][5]+"</td>"+
                    "<td>"+valores[i][6]+"</td>"+
                    "<td>"+valores[i][7]+"</td>"+

                    "<td><button class='btn btn-primary' style='border-top-left-radius: 16px' data-toggle='modal' data-target='#mdactproyecto' onclick='mostrarproyecto(" + '"' + datos + '"' + ");'><span class='icon-pencil2'></span></button>"+
                        "<button class='btn btn-default' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' onclick='enviarIdproyecto(" +'"'+ adm +'"'+","+ '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdelproyecto'><span class='icon-bin2'></span></button>"+
                        "<button class='btn btn-primary' style='border-radius: 4px; padding-right: 9px; padding-left: 9px' data-toggle='modal' data-target='#bgraph' onclick='ver_allproc(" + '"' +adm+ '"'+"," + '"' + valores[i][0] + '"' + "), send_pro(" + '"' + valores[i][0] + '"' + "), get_table(" + '"' + valores[i][0] + '"' + ")'><span class='icon-stats-bars2'></span></button>"+
                        "<button class='btn btn-default' style='border-bottom-right-radius: 16px' onclick='send_pro(" + '"' + valores[i][0] + '"' + "), get_table(" + '"' + valores[i][0] + '"' + ")' data-toggle='modal' data-target='#mdprog'><span class='icon-pie-chart'></span></button>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#listproyecto").html(html);
        inproyecto(adm); //ver_allproc(1, 2);
        location.href='main.php#proyecto';
    });
}

function recargar(){
    location.reload();
}
function recargar2(){
    setTimeout(function(){
        location.reload();
    }, 4000);
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
function mostrarproyecto(datos) {    
    var d = datos.split("*");
    $("#idproy1").val(d[0]);
    $("#nombreproy1").val(d[1]);
    $("#prioridadproy1").val(d[2]);
;

}
function registerproyecto(adm) {
    var datosform = $('#reg-proyecto').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/proyectoController.php',
        type: 'POST',
        data: datosform +'&funcion=registrar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#proyectoexit').show().fadeToggle(5000);
            listproyecto(adm);
        } else {
            alert(resp);
        }
    });
    clearform('reg-proyecto');
}

function clearcont(form) {
    $("#"+form+" :input").each(function() {
        $(this).val('');
    });
}

function showproyecto() {
    $('#proyecto').css('visibility', 'visible');
    //$('#proceso').css('visibility', 'hidden');
    //$('#categoria').css('visibility', 'hidden');
    //$('#plazo').css('visibility', 'hidden');
    //$('#contacto').css('visibility', 'hidden');
    //$('#te4m').css('visibility', 'hidden');
}

function updateproyecto() {
    var datosform = $('#updateproyecto').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/proyectoController.php',
        type: 'POST',
        data: datosform + '&funcion=actualizar'
    }).done(function(resp) { //alert(resp);
        if (resp === 'exito') {
            $('#updproyectoexit').show().fadeToggle(8000);
            listproyecto();
        } else {
            alert(resp);
        }
    });
    clearform('updateproyecto');
}
function eliminarproyecto() {
    //showall();
    var id = $('#delete-proyecto').serialize();
    //alert(id+'__'+adm);
    $.ajax({
        url: '../../controller/proyectoController.php',
        type: 'POST',
        data: id + '&funcion=eliminar'
    }).done(function(resp) {
        if (resp === 'exito') {
            $('#proyecto-del').show().fadeToggle(8000);
            /*$('#delete-cont').hide(3000);
            $('#contdelet').hide(3000);*/
            listproyecto();
        } else {
            alert(resp);
        }
    });
}

function get_grupo(adm) { //alert('new event');
    $.ajax({
        url: '../../controller/grupoController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=consulgrupo'
    }).done(function(resp) {
        var valores = eval(resp); //alert('Lista '+resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='idgproy' name='idgproy' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        $("#idgpr").html(html);
    }); //location.href='../organizacion/tipocont.php';
}
function get_categ() { //alert('new event');
    $.ajax({
        url: '../../controller/categoriaController.php',
        type: 'POST',
        data: 'funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp); //alert('Lista '+resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='idcatproy' name='idcatproy' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        $("#idcpr").html(html);
    }); //location.href='../organizacion/tipocont.php';
}

function get_plazo() {// alert('new event');
    $.ajax({
        url: '../../controller/plazoController.php',
        type: 'POST',
        data: 'funcion=consultar'
    }).done(function(resp) {
        var valores = eval(resp); //alert('Lista '+resp);
        html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='idplaproy' name='idplaproy' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            html += "<option value=" + valores[i][0] + ">Inicio: " + valores[i][1]+' | Fin: ' +valores[i][2] + "</option>";
        }
        html += "</select></td><td></button><button class='btn btn-info' data-toggle='modal' data-target='#regplazo'><span class='icon-plus'></span></button></td></tr></tbody></table>";
        $("#idplapr").html(html);
    }); //location.href='../organizacion/tipocont.php';
}

function inproyecto(adm) { //alert(valor);
    $.ajax({
        url: '../../controller/proyectoController.php',
        type: 'POST',
        data: 'val=' + adm + '&funcion=inproyecto'
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp); 
        html="<div class='col-lg-12'>"+
        "<h3 class='page-header' style='color: rgba(128, 128, 128, 0.9);'><span class='icon-table'> </span> <b>Parte de los Proyectos</b></h3>"+
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
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2];
            html += "<tr class='odd gradeX'>"+
                    "<td>"+valores[i][1]+"</td>"+
                    "<td>"+valores[i][2]+"</td>"+
                "</tr>";
        }
        html += "</tbody></table></div></div>";
        $("#addproy").html(html);
    });
}

function get_table(idp) { //alert(idp);
    $.ajax({
        url: '../../controller/proyectoController.php',
        type: 'POST',
        data: 'val='+idp+'&funcion=consultproc'
    }).done(function(resp) {
        //var valores = eval(resp); 
        draw_graph(resp);
        //location.reload();
//        //location.href="main.php#proyecto";
//        var elemento = document.querySelector('#mdprog');
//        elemento.setAttribute("aria-hidden", "false");
        //send_pro(idp);
        //alert('Lista '+resp);
        /*html = "<table><tbody><tr><td>"+
                "<select class='form-control colorful' required='required' id='addcon' name='addcon' style='color: #808080; border-color: #99CCFF; height: auto; width: auto'>"+
                    "<option></option>";
        for (i = 0; i < valores.length; i++) {
            datos = valores[i][0] + "*" + valores[i][1] + "*" + valores[i][2] + "*" + valores[i][3] + "*" + valores[i][4];
            html += "<option value=" + valores[i][0] + ">" + valores[i][1] + "</option>";
        }
        html += "</select></td><td></button><button class='btn btn-info' data-toggle='modal' data-target='#mdregtct'><span class='icon-plus'></span></button></td></tr></tbody></table>";
        *///"#getipocont").html(html);
    }); //location.href='../../controller/proyectoController.php';
}

function draw_graph(resp){
    var val4 = eval(resp); //alert(val4);
    html = val4[0][1]; $("#gpro").html(html);
    
    /*html2="<table style='position:relative;top:5px;right:5px;;font-size:smaller;color:#ffffff'><tbody>";
 
    for (i = 0; i < val4.length; i++) {
        html2 += "<tr>"+
        "<td class='legendColorBox'>"+
          "<div style='border:1px solid #ccc;padding:1px'>"+
           "<div style='width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden'></div>"+
          "</div>"+
         "</td>"+
        "<td class='legendLabel'>"+val4[i][3]+"</td></tr>"; //alert(i);
    }
    html2 += "</tbody></table>";
    $("#descg").html(html2);*/
        
    /*var ini="[";
    for (i = 0; i < val4.length; i++) {
        ini+="{"+
            "value: "+val4[i][4]+","+
            "color: 'rgba(0,102,102,0.6)',"+
            "highlight: 'rgba(0,102,102,0.9)',"+
            "label: '"+val4[i][3]+"'"+
        "}"; if(i<(val4.length-1)) ini+=',';
    }
    ini+=']'; alert(ini)
    
    var pieData2 = [
        {
            value: 40,
            color: 'rgba(0,102,102,0.6)',
            highlight: 'rgba(0,102,102,0.9)',
            label: 'Google Chrome'
        },
        {
            value: 20,
            color: '#e3e860',
            highlight: '#a9ad47',
            label: 'Android'
        },
        {
            value: 10,
            color: '#eb5d82',
            highlight: '#b74865',
            label: 'Firefox'
        },
        {
            value: 5,
            color: '#5ae85a',
            highlight: '#42a642',
            label: 'Internet Explorer'
        },
        {
            value: 25,
            color: '#e965db',
            highlight: '#a6429b',
            label: 'Safari'
        }
    ];
    var ctx2 = document.getElementById('area44').getContext('2d');
    window.myPie = new Chart(ctx2).Pie(pieData2);*/
}

function send_pro(idp) { //alert(idp);
    $.ajax({
        url: '../../view/include/addvar.php',
        type: 'POST',
        data: 'val='+idp
    }); //location.href='../../view/include/gen_graphic.php';
}

/*function send_pro(idp) { //alert(idp);
    $.ajax({
        url: '../../controller/proyectoController.php',
        type: 'POST',
        data: 'val='+idp+'&funcion=idpro'
    }); //location.href='../../view/include/gen_graphic.php';
}*/

function get_table4(idp) { //alert(idp);
    $.ajax({
        url: '../../controller/proyectoController.php',
        type: 'POST',
        data: 'val='+idp+'&funcion=consultproc'
    }).done(function(resp) {
        var val = eval(resp); 
        //draw_graph(resp);
        //alert('Lista '+resp);
        html = "<tr>"+
                "<th>Widget</th><th>Sales ($)</th></tr>";
        for (i = 0; i < val.length; i++) {
            html += "<tr style='color: #0DA068'>"+
                "<td>"+val[i][4]+"</td><td>"+val[i][3]+"</td></tr>";
        }
        //html+="</table>";
        $("#chartData").html(html); //alert(html);
    }); //location.href='../../controller/proyectoController.php';
}

function ver_allproc(adm, proy){
    //location.href='../../controller/get_tproc.php';
    $.ajax({
        url: '../../controller/get_tproc.php',
        type: 'POST',
        data: 'pry='+proy
    }).done(function(resp) { //alert(resp);
        var valores = eval(resp); //alert(valores.length);
        /*html="<input id='admb' name='admb' type='text'/>"+
                        "<input id='pryb' name='pryb' type='text'/>";*/
        if(valores.length>0){ //alert(valores.length); //window.closed;
            var j=0;
            for (i = 0; i < (valores.length/2); i++) { //alert(valores.length/2);
                var pr=valores[j]; var av=valores[j+1]; //alert('pro->'+pr+' prc->'+av);
                html += "<li style='list-style:none; background-color:rgba(0, 76, 153, 0.1); color:rgba(255, 255, 255, 0.8)'><a href='#'>"+
                        "<div><p style='color:rgba(255, 255, 255, 0.8)'><strong>"+pr+"</strong>"+
                        "<span class='pull-right text-muted' style='color:rgba(255, 255, 255, 0.8)'>"+av+"% Complete</span>"+
                            "</p><div class='progress progress-striped active'>"+
                            "<div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: "+av+"%'>"+
                        "<span class='sr-only'>"+av+"% Complete </span>"+
                        "</div>"+
                        "</div></div></a></li>"; j=j+2; //alert(j);
            }
            $("#barrag").html(html);
        }else{
            html="<li style='list-style:none; background-color:rgba(0, 76, 153, 0.1); color:rgba(255, 255, 255, 0.8)'><a class='text-center' href='#'>"+
                    "<strong style='color:rgba(255, 255, 255, 0.8)'>No tienes procesos </strong>"+
                    "<i class='icon-cogs' style='color:rgba(255, 255, 255, 0.8)'></i></a></li>";
            $("#barrag").html(html);
        }   //sendbr(adm, proy);   
    });
}

function sendbr(adm, proy) {
    document.getElementById('admb').value=adm;
    document.getElementById('pryb').value=proy;
    //alert($("#admb").val());
}