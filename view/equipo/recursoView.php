
<div class="row" id="recurso" style="visibility: hidden">
    <div class="col-lg-12">
        <h2 class="page-header" style="color: rgba(128, 128, 128, 0.9);"><span class="icon-file-zip"> </span> <b>Recursos</b></h2>
        <a class="icon-arrow-up" href="#wrapper"> </a>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Recursos
                <a class="icon-file-empty" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regrec" onclick="newfolder('<?php echo $_SESSION['name']; ?>')"></a>
            </div>
            <div class="panel-body" id="listrec">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="regrec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Adicionar Recurso</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="recexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> El recurso ha sido agregado</span>
                </div>
                <div class="alert alert-danger text-center" id="recfail" style="display:none;">
                    <span class="glyphicon glyphicon-warning-sign"> </span><span> No se pudo subir el archivo</span>
                </div>
                <form class="form-horizontal" id="regrec">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="sbr" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Subtarea :</label>
                        <div class="col-xs-5" id="rsub">
                            
                        </div>
                    </div> 
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="rec" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Archivo :</label>
                        <div class="col-xs-5">
                            <span class="btn-upload"><input class="maquet" type="file" multiple="multiple" id="archivos" name="archivos"  style="background-color: rgba(255, 255, 255, 0.2)"></span>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button id="sendfile" onclick="newfolder('<?php echo $_SESSION['name']; ?>'), addrecurso();" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-arrow-right2"></span> Agregar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdactrec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Actualizar Contacto</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="updcontexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> Los datos han sido actualizados</span>
                </div>
                <form class="form-horizontal" id="updatecont">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="name4" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                            <input id="adm2" name="adm" type="hidden" value="<?php echo $_SESSION['idu']; ?>">
                            <input id="name4" name="name" type="text" class="form-control" placeholder="Ingrese su nombre" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="cel4" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Celular :</label>
                        <div class="col-xs-5">
                            <input id="cel4" name="cel" type="text" class="form-control" placeholder="Ingrese su celular" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>  
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="user5" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Email :</label>
                        <div class="col-xs-5">
                            <input id="user5" name="user" type="email" class="form-control" placeholder="Ingrese su correo" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="updatecont('<?php echo $_SESSION['idu']; ?>');" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-redo"></span> Modificar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdelrec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: rgba(255, 255, 255, 0.9)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Eliminar Archivo</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="rec-del" style="display: none;">
                    <span class="glyphicon glyphicon-ok"></span><span> Datos eliminados</span>
                </div>
                <form class="form-horizontal" id="delete-rec">
                    <div class="form-group">
                        <label for="idr" class="control-label col-xs-5"  style="color: rgba(255, 255, 255, 0.8)">¿Esta seguro que quiere eliminar los datos?</label>
                        <input id="idr" name="idr" type="hidden"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="contdelet">
                <button type="button" class="btn btn-primary" onclick="eliminarec('<?php echo $_SESSION['idu']; ?>');"style="font-size: 12px; border-radius: 4px"><span class="icon-bin"></span> Si</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> No</button>
            </div>
        </div>
    </div>
</div>
