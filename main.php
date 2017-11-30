<?php
session_start(); if(!isset($_SESSION['idu'])) header('location: ../../'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ProCreator</title>
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link href="dist/css/timeline.css" rel="stylesheet">
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">
        <link href="bower_components/morrisjs/morris.css" rel="stylesheet">
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../../resource/css/bootstrap-theme.css" rel="stylesheet">
        <link href="../../resource/css/fonts.css" rel="stylesheet">
        <link rel="shortcut icon" href="../../resource/icon/ci-icon.ico">
        <script src="../../resource/js/arriba.js"></script>
        <script src="../../resource/js/jquery.js"></script>
        <script src="../../resource/js/fileup.js"></script>
        <script src="../../resource/js/flot-data"></script>
        <script src="../../resource/js/morris-data"></script>
        <script src="../../resource/js/Chart.js"></script>
        <script src="../../resource/js/notificacion.js"></script>
        <script>
            function isrange(mina, mint){
                if(mina==mint || mina==(mint+2) || mina==(mint-1)) return true; else return false;
            }
            setInterval(
                function (){
                    $.ajax({
                        url: '../../controller/notificacionController.php',
                        type: 'POST',
                        data: 'val=' + '<?php echo $_SESSION['idu']; ?>' + '&funcion=countmsg'
                    }).done(function(resp) { //alert(resp);
                        var valores = eval(resp);
                        if(valores[0][0] !== null && valores[0][0]!=='0'){
                            html = valores[0][0];
                            $("#count").html(html);
                        }    
                    });
                }, 2000);
                
            
                function ver_notif(){
                    var adm='<?php echo $_SESSION['idu']; ?>';
                    $.ajax({
                        url: '../../controller/notificacionController.php',
                        type: 'POST',
                        data: 'val=' + adm + '&funcion=consultar'
                    }).done(function(resp) { //alert(resp);
                        var valores = eval(resp);
                        if(valores.length>0){
                            html='';
                            for (i = 0; i < valores.length; i++) {
                                //var nref=referencia(valores[i][0]); alert(nref);
                                var notif=valores[i][5]; var id=valores[i][0];
                                //$('#msg').val(notif);
                                var txtnf=""; //alert(notif);
                                if(notif=='Nuevo Grupo!!!'){
                                    txtnf="href='javascript:void(0)' onclick='showgroup(), listgrupo("+adm+"), changenot("+id+");'";
                                }if(notif=='Nuevo Proyecto!!!'){ 
                                    txtnf="href='javascript:void(0)' onclick='showproyecto(), listproyecto("+adm+"),get_grupo("+adm+"),get_categ(),get_plazo(), changenot("+id+");'";
                                }if(notif=='Nuevo Proceso!!!'){ 
                                    txtnf="href='javascript:void(0)' onclick='showproceso(), listproceso(),get_proyecto("+adm+"),get_pla(), changenot("+id+");'";
                                }if(notif=='Nueva Subtarea!!!'){ 
                                    txtnf="href='javascript:void(0)' onclick='showsubtarea(), lista_subtarea("+adm+"), get_subcont("+adm+"), get_subproc("+adm+"), get_subplazo(), changenot("+id+");'";
                                }if(notif=='Nuevo Recurso!!!'){ 
                                    txtnf="href='javascript:void(0)' onclick='showrecurso(), lista_recurso("+adm+"), get_recsub("+adm+"), changenot("+id+");'";
                                }if(notif=='Notificacion!!!'){ 
                                    txtnf="href='javascript:void(0)' onclick='changenot("+id+"), shownotify(), listnotify("+adm+"), get_notifcont("+adm+"), get_asunt();'";
                                }
                                /*var tn="<li> <a "+txtnf+"><div>";
                                alert(tn);*/
                            html += "<li> <a "+txtnf+"><div>"+
                                        "<strong>"+valores[i][6]+"</strong>"+
                                        "<span class='pull-right text-muted'>"+
                                            "<em class='icon-clock'> "+valores[i][2]+" "+valores[i][3]+"</em>"+
                                        "</span></div>"+
                                    "<div>"+valores[i][1]+"</div>"+
                                "</a></li>"+
                                "<li class='divider'></li>";
                            }
                            html+="<li><a class='text-center' href='javascript:void(0)' onclick='shownotify(), listnotify("+adm+"), get_notifcont("+adm+"), get_asunt();'>"+
                                    "<strong>Ver Todos </strong>"+
                                    "<i class='fa fa-angle-right'></i>"+
                                    "</a></li>";
                            $("#contmsg").html(html);
                        }else{
                            html="<li><a class='text-center' href='javascript:void(0)' onclick='shownotify(), listnotify("+adm+"), get_notifcont("+adm+"), get_asunt();'>"+
                                    "<strong>Ver Todos </strong>"+
                                    "<i class='fa fa-angle-right'></i>"+
                                "</a></li>";
                            $("#contmsg").html(html);
                        }   
                    });
                }
                function ver_proc(){
                    $.ajax({
                        url: '../../controller/get_proc.php',
                        type: 'POST',
                        data: 'val=4'
                    }).done(function(resp) { //alert(resp);
                        var valores = eval(resp); //alert(valores); 
                        var adm='<?php echo $_SESSION['idu']; ?>';
                        if(valores.length>0){
                            html=''; var j=0;
                            for (i = 0; i < (valores.length/2); i++) { //alert(valores.length/2);
                                var pr=valores[j]; var av=valores[j+1]; //alert('pro->'+pr+' prc->'+av);
                            html += "<li><a href='#'>"+
                                    "<div><p><strong>"+pr+"</strong>"+
                                            "<span class='pull-right text-muted'>"+av+"% Complete</span>"+
                                        "</p><div class='progress progress-striped active'>"+
                                            "<div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: "+av+"%'>"+
                                                "<span class='sr-only'>"+av+"% Complete </span>"+
                                            "</div>"+
                                        "</div></div></a></li>"; j=i+2;
                            }
                            html+="<li><a class='text-center' href='javascript:void(0)' onclick='showproyecto(), listproyecto("+adm+"),get_grupo("+adm+"),get_categ(),get_plazo();'>"+
                                    "<strong>Ver Todos </strong>"+
                                    "<i class='fa fa-angle-right'></i></a></li>";
                            $("#viewproc").html(html);
                        }else{
                            html="<li><a class='text-center' href='javascript:void(0)' onclick='showproyecto(), listproyecto("+adm+"),get_grupo("+adm+"),get_categ(),get_plazo();'>"+
                                    "<strong>No tienes procesos </strong>"+
                                    "<i class='icon-mail4'></i></a></li>";
                            $("#viewproc").html(html);
                        }   
                    });
                }
                setInterval(
                function (){
                    var adm='<?php echo $_SESSION['idu']; ?>';
                    $.ajax({
                        url: '../../controller/notificacionController.php',
                        type: 'POST',
                        data: 'val=' + adm + '&funcion=consultar'
                    }).done(function(resp) { //alert(resp);
                        var valores = eval(resp);
                        if(valores.length>0){
                            html5='';
                            for (i = 0; i < valores.length; i++) {
                                var da = new Date(); 
                                var dn = new Date(""+valores[i][2]+" "+valores[i][3]+"");
                                var actd=da.getFullYear()+'-'+(da.getMonth()+1)+'-'+da.getDate();
                                var notd=dn.getFullYear()+'-'+(dn.getMonth()+1)+'-'+dn.getDate();
                                var hrsa=da.getHours()+':'+da.getMinutes()+':'+da.getSeconds();
                                var hrsn=dn.getHours()+':'+dn.getMinutes()+':'+dn.getSeconds();
                                //alert(valores[i][1]+'-> dtAct '+actd+' dtNot '+notd+' hrAct '+hrsa+' hrNot '+hrsn);
                                //' hrAct '+da.getHours()+' hrNot '+dn.getHours()+' mnAct '+da.getMinutes()+' mnNot '+dn.getMinutes())  //$("#newnot").html(html5);
                                if(actd==notd && dn.getHours()==da.getHours() && isrange(da.getMinutes(), dn.getMinutes())){
                                    //alert('Same'); }else{
                                    html5+="<span class='icon-notification'> </span><span> <strong> "+valores[i][5]+"</strong> "+valores[i][1]+" </span><br>";
                                    $("#newnot").html(html5);
                                }
                            } //alert(html5.length);
                            if(html5.length>0) $('#newnot').show().fadeToggle(3000);
                            /*else{
                                html5+=html5.length;
                                $("#newnot").html(html5);
                                $('#newnot').show().fadeToggle(1000);
                            }*/
                            //$("#contmsg").html(html);
                        }   
                    });
                }, 2000);
        </script>
    </head>
    
    <?php include '../usuario/usuarioView.php'; ?>
    
    <body onload="showproyecto(), listproyecto('<?php echo $_SESSION['idu']; ?>'),get_grupo('<?php echo $_SESSION['idu']; ?>'),get_categ(),get_plazo();">
        <input type="hidden" name="msgnot">
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a class="navbar-brand" href="main.php" style="color: rgba(128, 128, 128, 0.8)"><b>ProCreator</b></a>
                    <div class="modal text-center" id="saludo" style="width: auto; height: auto; background-color: rgba(0, 51, 102, 0.2)"><h1 style="color: rgba(255, 255, 255, 0.9)"><?php echo $_SESSION['saludo']; ?></h1></div>
                </div>
                <div class="modal text-center" id="salida" style="width: auto; height: auto; background-color: rgba(0, 51, 102, 0.3);"><h1 style="color: rgba(255, 255, 255, 0.9)"> Cerrando Sesion...</h1></div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" onclick="ver_notif()">
                            <span class="label label-primary" style="font-size: x-small" id="nrom"></span>
                            <span id="count" class="label label-success" style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"></span>
                            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages" id="contmsg">
                            
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" onclick="ver_proc()">
                            <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks" id="viewproc">
                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> <?php echo $_SESSION['name']; ?> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#actadm"><i class="fa fa-book fa-fw"></i> User Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="javascript: void(0)" onclick="cerrar();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-group fa-fw"></i> Equipo<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="javascript: void(0)" onclick="showcont(), listcont('<?php echo $_SESSION['idu']; ?>');">Contacto</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="showgroup(), listgrupo('<?php echo $_SESSION['idu']; ?>');">Grupo</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="shownotify(), listnotify('<?php echo $_SESSION['idu']; ?>'), get_notifcont('<?php echo $_SESSION['idu']; ?>'), get_asunt();">Notificacion</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="showrecurso(), lista_recurso('<?php echo $_SESSION['idu']; ?>'), get_recsub('<?php echo $_SESSION['idu']; ?>');">Recurso</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i> Planificacion<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="javascript:void(0)" onclick="showcateg(), listcat();">Categoria</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="showproyecto(), listproyecto('<?php echo $_SESSION['idu']; ?>'),get_grupo('<?php echo $_SESSION['idu']; ?>'),get_categ(),get_plazo();">Proyecto</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="showplazo(), listplazo();">Plazo</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="showproceso(), listproceso('<?php echo $_SESSION['idu']; ?>'),get_proyecto('<?php echo $_SESSION['idu']; ?>'),get_pla();">Proceso</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="showsubtarea(), lista_subtarea('<?php echo $_SESSION['idu']; ?>'), get_subcont('<?php echo $_SESSION['idu']; ?>'), get_subproc('<?php echo $_SESSION['idu']; ?>'), get_subplazo();">Subtarea</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div class="alert alert-info text-info" id="newnot"  href="javascript:void(0)" onclick="shownotify(), listnotify('<?php echo $_SESSION['idu']; ?>'), get_notifcont('<?php echo $_SESSION['idu']; ?>'), get_asunt();" style="margin: 0 0 0 18%; display: none; cursor: pointer">
                
            </div>
            
            <script src="../../resource/js/Chart.js"></script>

            <div id="page-wrapper">
                <?php include '../planificacion/proyectoView.php'; ?>
            </div>
            <div id="page-wrapper">
                <?php include '../equipo/contactoView.php'; ?>
            </div>
            <div id="page-wrapper">
                <?php include '../equipo/grupoView.php'; ?>
            </div>
            <div id="page-wrapper">
                <?php include '../equipo/notificacionView.php'; ?>
            </div>
            <div id="page-wrapper">
                <?php include '../equipo/recursoView.php'; ?>
            </div>
            <div id="page-wrapper">
                <?php include '../planificacion/categoriaView.php'; ?>
            </div>
            <div id="page-wrapper">
                <?php include '../planificacion/plazoView.php'; ?>
            </div>
            
            <div id="page-wrapper">
                <?php include '../planificacion/procesoView.php'; ?>
            </div>
            <div id="page-wrapper">
                <?php include '../planificacion/subtareaView.php'; ?>
            </div>
        </div>
        
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <script src="bower_components/raphael/raphael-min.js"></script>
        <script src="bower_components/morrisjs/morris.min.js"></script>
        <script src="js/morris-data.js"></script>
        <script src="dist/js/sb-admin-2.js"></script>
        <script src="../../resource/js/usuario.js"></script>
        <script src="../../resource/js/contacto.js"></script>
        <script src="../../resource/js/grupo.js"></script>
        <script src="../../resource/js/categoria.js"></script>
        <script src="../../resource/js/plazo.js"></script>
        <script src="../../resource/js/proyecto.js"></script>
        <script src="../../resource/js/proceso.js"></script>
        <script src="../../resource/js/subtarea.js"></script>
        <script src="../../resource/js/notificacion.js"></script>
        <script src="../../resource/js/recurso.js"></script>
        <?php
            if(isset($_SESSION['saludo'])){
                echo "<script>$('#saludo').show().fadeToggle(5000);" . "</script>";
                unset($_SESSION['saludo']);  
        }?>
    </body>
</html>
