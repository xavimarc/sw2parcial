
<div class="row" id="categoria" style="visibility: hidden">
    <div class="col-lg-12">
        <h2 class="page-header" style="color: rgba(128, 128, 128, 0.9);"><span class="icon-books"> </span> <b>Categorias</b></h2>
                <a class="icon-arrow-up" href="#wrapper"> </a>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Categorias
                <a class="icon-plus" style="cursor: pointer" href="javascript:void(0)" data-toggle="modal" data-target="#regcateg"></a>
            </div>
            <div class="panel-body" id="listcateg">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="regcateg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Adicionar Categoria</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="categexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> La Categoria ha sido agregado</span>
                </div>
                <form class="form-horizontal" id="reg-categ">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="grupo" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                            <input id="namecat" name="namecat" type="text" class="form-control" placeholder="Ingrese la Categoria" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="registercat();" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-arrow-right2"></span> Agregar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdactcateg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Actualizar Categoria</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="updcatexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> Los datos han sido actualizados</span>
                </div>
                <form class="form-horizontal" id="updatecateg">
                    <div class="form-cat" style="margin-bottom: 15px">
                        <label for="name4" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                            <input id="idcat" name="idcat" type="hidden" >
                            <input id="namecat1" name="namecat" type="text" class="form-control" placeholder="Ingrese la Categoria" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="updatecat();" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-redo"></span> Modificar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdelcateg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: rgba(255, 255, 255, 0.9)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Eliminar Categoria</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="categ-del" style="display: none;">
                    <span class="glyphicon glyphicon-ok"></span><span> Datos eliminados</span>
                </div>
                <form class="form-horizontal" id="delete-categ">
                    <div class="form-group">
                        <label for="idcat2" class="control-label col-xs-5"  style="color: rgba(255, 255, 255, 0.8)">¿Esta seguro que quiere eliminar los datos?</label>
                        <input id="idcat2" name="idcat" type="hidden"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="eliminarcat('<?php echo $_SESSION['idu']; ?>');"style="font-size: 12px; border-radius: 4px"><span class="icon-bin"></span> Si</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> No</button>
            </div>
        </div>
    </div>
</div>

