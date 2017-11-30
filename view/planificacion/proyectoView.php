
<div class="row" id="proyecto" style="visibility: hidden">
    <div class="col-lg-12">
        <h2 class="page-header" style="color: rgba(128, 128, 128, 0.9);"><span class="icon-table"> </span> <b>Proyectos</b></h2>
                <a class="icon-arrow-up" href="#wrapper"> </a>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Proyectos
                <a class="icon-plus" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regproyecto" onclick="get_grupo('<?php echo $_SESSION['idu']; ?>'),get_categ(), get_plazo();"></a>
                <a class="icon-users" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regrupo"></a>
                <a class="icon-books" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regcateg"></a>
                <a class="icon-calendar" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regplazo"></a>
            </div>
            <div class="panel-body" id="listproyecto">
                
            </div>
             <div class="panel-body" id="addproy">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="regproyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Adicionar Proyecto</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="proyectoexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> El Proyecto ha sido agregado</span>
                </div>
                <form class="form-horizontal" id="reg-proyecto">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                        	 <input id="porcentaje" name="porcentaje" type="text" value='0' hidden="true" >
                            <input id="nombreproy" name="nombreproy" type="text" class="form-control" placeholder="Ingrese el Nombre" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                     <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Prioridad :</label>
                        <div class="col-xs-5">
                            <select class="form-control show-menu-arrow" id="prioridadproy" name="prioridadproy" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                                <option value="Alta">Alta</option>
                                <option value="Media">Media</option>
                                <option value="Baja">Baja</option>
                            </select>
                        </div>
                    </div>
                 
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="cont" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Grupo :</label>
                        <div class="col-xs-5" id="idgpr">
                            
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="cont" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Categoria :</label>
                        <div class="col-xs-5" id="idcpr">
                            
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="cont" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Plazo :</label>
                        <div class="col-xs-5" id="idplapr">
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="registerproyecto('<?php echo $_SESSION['idu']; ?>');" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-arrow-right2"></span> Agregar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="mdactproyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Actualizar Proyecto</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="updproyectoexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> Los datos han sido actualizados</span>
                </div>
                <form class="form-horizontal" id="updateproyecto">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                        	<input id="idproy1" name="idproy1" type="hidden" >
                            <input id="nombreproy1" name="nombreproy1" type="text" class="form-control" placeholder="Ingrese el Nombre" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                     <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Prioridad :</label>
                        <div class="col-xs-5">
                            <input id="prioridadproy1" name="prioridadproy1" type="tex" class="form-control" placeholder="Ingrese Avance" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                                        
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="updateproyecto();" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-redo"></span> Modificar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdelproyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: rgba(255, 255, 255, 0.9)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Eliminar Proyecto</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="proyecto-del" style="display: none;">
                    <span class="glyphicon glyphicon-ok"></span><span> Datos eliminados</span>
                </div>
                <form class="form-horizontal" id="delete-proyecto">
                    <div class="form-group">
                        <label for="idpro3" class="control-label col-xs-5"  style="color: rgba(255, 255, 255, 0.8)">¿Esta seguro que quiere eliminar los datos?</label>
                        <input id="idpro3" name="idpro3" type="hidden"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="eliminarproyecto();"style="font-size: 12px; border-radius: 4px"><span class="icon-bin"></span> Si</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> No</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdprog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: rgba(255, 255, 255, 0.9)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b id="gpro"></b></h3>
            </div>
            <div class="modal-body">
                <button class='btn btn-default' style="border-bottom-right-radius: 16px" onclick="location.reload()" data-toggle="modal" data-target="#mdprog"><span class="icon-spinner9"></span></button>
                <img src="../../view/include/gen_graphic.php" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> </button>
            </div>
        </div>
    </div>
</div>
<script src="../../resource/js/proyecto.js"></script>

<div class="modal fade" id="bgraph" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: rgba(255, 255, 255, 0.9)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Avance del Proyecto</b></h3>
            </div>
            <div class="modal-body">
                    <div class="form-group" id="barrag">
                        
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>