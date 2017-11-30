
<div class="row" id="recurso" style="visibility: hidden">
    <div class="col-lg-12">
        <h2 class="page-header" style="color: rgba(128, 128, 128, 0.9);"><span class="icon-users"> </span> <b>Recursos</b></h2>
        <a class="icon-arrow-up" href="#wrapper"> </a>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Recursos
                <a class="icon-plus" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regsub"></a>
            </div>
            <div class="panel-body" id="listrec">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="regrec2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Adicionar Recurso</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="subexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> El recurso ha sido agregado</span>
                </div>
                <form class="form-horizontal" id="reg-rec">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="nombt" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                            <input id="nombt" name="nombt" type="text" class="form-control" placeholder="Ingrese el nombre" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="est" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Estado :</label>
                        <div class="col-xs-5">
                            <input id="est" name="est" type="text" class="form-control" placeholder="Ingrese el estado" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="proc" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Proceso :</label>
                        <div class="col-xs-5" id="procsub">
                            
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="cont" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Contacto :</label>
                        <div class="col-xs-5" id="contsub">
                            
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="pla" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Plazo :</label>
                        <div class="col-xs-5" id="plasub">
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="registerec('<?php echo $_SESSION['idu']; ?>');" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-arrow-right2"></span> Agregar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="mdactsub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Actualizar Subtarea</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="updsubexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> Los datos han sido actualizados</span>
                </div>
                <form class="form-horizontal" id="updatesub">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="nombt2" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                            <input id="idt" name="idt" type="hidden">
                            <input id="nombt2" name="nombt" type="text" class="form-control" placeholder="Ingrese el nombre" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="est2" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Estado :</label>
                        <div class="col-xs-5">
                            <input id="est2" name="est" type="text" class="form-control" placeholder="Ingrese el estado" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="updatesub('<?php echo $_SESSION['idu']; ?>');" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-redo"></span> Modificar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdelsub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: rgba(255, 255, 255, 0.9)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Eliminar Datos</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="sub-del" style="display: none;">
                    <span class="glyphicon glyphicon-ok"></span><span> Datos eliminados</span>
                </div>
                <form class="form-horizontal" id="delete-sub">
                    <div class="form-group">
                        <label for="idp2" class="control-label col-xs-5"  style="color: rgba(255, 255, 255, 0.8)">¿Esta seguro que quiere eliminar los datos?</label>
                        <input id="idt2" name="idt" type="hidden"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="eliminarsub('<?php echo $_SESSION['idu']; ?>');"style="font-size: 12px; border-radius: 4px"><span class="icon-bin"></span> Si</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> No</button>
            </div>
        </div>
    </div>
</div>

