<div class="row" id="foro" style="">
    <div class="col-lg-12">
        <h2 class="page-header" style="color: rgba(128, 128, 128, 0.9);"><span class="icon-bubbles3"> </span> <b>Foros</b></h2>
        <a class="icon-arrow-up" href="#wrapper"> </a>
        <a class="icon-plus" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regforum" onclick=""> </a>
    </div>
    <div class="panel-body" id="listforo">
                
    </div>
</div>

<div class="modal fade" id="regforum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Adicionar Foro</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="foroexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> El foro ha sido creado</span>
                </div>
                <form class="form-horizontal" id="regfrm">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="namef3" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                            <input id="namef" name="namef" type="text" class="form-control" placeholder="Ingrese un nombre" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="descf3" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Descripcion :</label>
                        <div class="col-xs-5">
                            <textarea class="form-control" rows="5" id="descf" name="descf"></textarea>
                        </div>
                    </div>  
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="estf" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Estado :</label>
                        <div class="col-xs-5">
                            <select class="form-control show-menu-arrow" id="estf" name="estf" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                                <option value="Abierto">Abierto</option>
                                <option value="Cerrado">Cerrado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="fgrp" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Grupo :</label>
                        <div class="col-xs-5" id="getfgroup">
                            
                        </div>
                    </div>  
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="registerforo('<?php echo $_SESSION['idu']; ?>');" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-arrow-right2"></span> Agregar</button>
            </div>
        </div>
    </div>
</div>

<div class="row" id="topico" style="">
    <div class="col-lg-12">
        <h2 class="page-header" style="color: rgba(128, 128, 128, 0.9);"><span class="icon-bubbles"> </span> <b>Topicos</b></h2>
        <a class="icon-bubbles4" href="#foro"> </a>
        <a class="icon-box-add" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regtopic" onclick=""> </a>
    </div>
    
    <div class="panel-body" id="list_topic">
                
    </div>
</div>

<div class="modal fade" id="regtopic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Adicionar Topico</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="topicexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> El topico ha sido creado</span>
                </div>
                <form class="form-horizontal" id="reg-topic">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="titp" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Titulo :</label>
                        <div class="col-xs-5">
                            <input id="idforo" name="idforo" type="hidden">
                            <input id="idadm" name="idadm" type="hidden">
                            <input id="titp" name="titp" type="text" class="form-control" placeholder="Ingrese un nombre" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>  
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="btp" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Bloqueado :</label>
                        <div class="col-xs-5">
                            <select class="form-control" id="btp" name="btp">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="fectp" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Fecha :</label>
                        <div class="col-xs-5">
                            <input id="fectp" name="fectp" type="text" class="form-control" placeholder="Ingrese fecha" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="registertopic();" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-arrow-right2"></span> Agregar</button>
            </div>
        </div>
    </div>
</div>