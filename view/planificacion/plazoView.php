
<div class="row" id="plazo" style="visibility: hidden">
    <div class="col-lg-12">
        <h2 class="page-header" style="color: rgba(128, 128, 128, 0.9);"><span class="icon-calendar"> </span> <b>Plazos</b></h2>
        <a class="icon-arrow-up" href="#wrapper"> </a>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Plazos
                <a class="icon-plus" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regplazo"></a>
            </div>
            <div class="panel-body" id="listplazo">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="regplazo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Adicionar Plazo</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="plazoexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> El Plazo ha sido agregado</span>
                </div>
                <form class="form-horizontal" id="reg-plazo">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Fecha Inicio :</label>
                        <div class="col-xs-5">
                            <input id="fechaini" name="fechaini" type="date" class="form-control" placeholder="Ingrese la Fecha Inicio" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Fecha Fin :</label>
                        <div class="col-xs-5">
                            <input id="fechafin" name="fechafin" type="date" class="form-control" placeholder="Ingrese la Fecha Fin" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="registerplazo();" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-arrow-right2"></span> Agregar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="mdactplazo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Actualizar Plazo</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="updplazoxit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> Los datos han sido actualizados</span>
                </div>
                <form class="form-horizontal" id="updateplazo">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="fechaini1" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Fecha Inicio :</label>
                        <div class="col-xs-5">
                            <input id="idp" name="idp" type="hidden" >
                            <input id="fechaini1" name="fechaini1" type="date" class="form-control" placeholder="Ingrese la Fecha  Inicio" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                   <div class="form-group" style="margin-bottom: 15px">
                        <label for="fechafin1" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Fecha Fin :</label>
                        <div class="col-xs-5">
                            <input id="fechafin1" name="fechafin1" type="date" class="form-control" placeholder="Ingrese la Fecha Fin" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="updateplazo();" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-redo"></span> Modificar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdelplazo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: rgba(255, 255, 255, 0.9)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Eliminar Datos</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="plazo-del" style="display: none;">
                    <span class="glyphicon glyphicon-ok"></span><span> Datos eliminados</span>
                </div>
                <form class="form-horizontal" id="delete-plazo">
                    <div class="form-group">
                        <label for="idp2" class="control-label col-xs-5"  style="color: rgba(255, 255, 255, 0.8)">¿Esta seguro que quiere eliminar los datos?</label>
                        <input id="idp2" name="idp2" type="hidden"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="eliminarplazo();"style="font-size: 12px; border-radius: 4px"><span class="icon-bin"></span> Si</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> No</button>
            </div>
        </div>
    </div>
</div>

