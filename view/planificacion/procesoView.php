
<div class="row" id="proceso" style="visibility: hidden">
    <div class="col-lg-12">
        <h2 class="page-header" style="color: rgba(128, 128, 128, 0.9);"><span class="icon-cogs"> </span> <b>Procesos</b></h2>
                <a class="icon-arrow-up" href="#wrapper"> </a>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Procesos
                <a class="icon-plus" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regproceso"></a>
                <a class="icon-list" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#proytm" onclick="time_proy('<?php echo $_SESSION['idu']; ?>')"></a>
                <a class="icon-calendar" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regplazo"></a>
            </div>
            <div class="panel-body" id="listproceso">
                
            </div>
             <div class="panel-body" id="addproceso">
                
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="regproceso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Adicionar Proceso</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="procesoexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> El Proceso ha sido agregado</span>
                </div>
                <form class="form-horizontal" id="reg-proceso">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                            <input id="nombrep" name="nombrep" type="text" class="form-control" placeholder="Ingrese el Nombre" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                     <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Avance :</label>
                        <div class="col-xs-5">
                            <input id="avance" name="avance" type="tex" class="form-control" placeholder="Ingrese Avance" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                      <div class="form-group" style="margin-bottom: 15px">
                        <label for="cont" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Proyecto :</label>
                        <div class="col-xs-5" id="getpro">
                            
                        </div>
                    </div>
                      <div class="form-group" style="margin-bottom: 15px">
                        <label for="cont" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Plazo :</label>
                        <div class="col-xs-5" id="gpla">
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="registerproceso('<?php echo $_SESSION['idu']; ?>');" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-arrow-right2"></span> Agregar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="mdactproceso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Actualizar Proceso</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="updprocesoexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> Los datos han sido actualizados</span>
                </div>
                <form class="form-horizontal" id="updateproceso">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                        	<input id="idp1" name="idp1" type="hidden" >
                            <input id="nombrep1" name="nombrep1" type="text" class="form-control" placeholder="Ingrese el Nombre" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                     <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Avance :</label>
                        <div class="col-xs-5">
                            <input id="avance1" name="avance1" type="tex" class="form-control" placeholder="Ingrese Avance" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    
                    
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="updateproceso('<?php echo $_SESSION['idu']; ?>');" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-redo"></span> Modificar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdelproceso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: rgba(255, 255, 255, 0.9)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Eliminar Proceso</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="proceso-del" style="display: none;">
                    <span class="glyphicon glyphicon-ok"></span><span> Datos eliminados</span>
                </div>
                <form class="form-horizontal" id="delete-proceso">
                    <div class="form-group">
                        <label for="idp3" class="control-label col-xs-5"  style="color: rgba(255, 255, 255, 0.8)">¿Esta seguro que quiere eliminar los datos?</label>
                        <input id="idp3" name="idp3" type="hidden"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="eliminarproceso();"style="font-size: 12px; border-radius: 4px"><span class="icon-bin"></span> Si</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> No</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="proytm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: rgba(255, 255, 255, 0.9)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Proyectos</b></h3>
            </div>
            <div class="modal-body" id="tm4proy">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>

