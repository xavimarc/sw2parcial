
<div class="modal fade" id="sesion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="/*background-image: url(resource/img/user.jpg);*/ background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: rgba(255, 255, 255, 0.9)"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Login de Usuario</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger text-center" id="wronglog" style="display:none;">
                    <span class="glyphicon icon-lock"> </span><span> Usuario o Password no identificados</span>
                </div>
                <form class="form-horizontal" id="loginform">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="user" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Email :</label>
                        <div class="col-xs-5">
                            <input id="user" name="user" type="email" class="form-control" placeholder="Ingrese su correo" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="pass" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Password :</label>
                        <div class="col-xs-5">
                            <input id="pass" name="pass" type="password" class="form-control" placeholder="Ingrese su contraseña" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    <a class="text-center" style="padding-left: 30%; padding-right: 30%; color: rgba(51, 153, 255, 0.8)" href="javascript:void(0)" data-toggle="modal" data-target="#mdpass">¿Olvidaste tu contraseña?</a>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="confirmuser()" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-unlocked"></span> Iniciar Sesion</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="regadm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Registro de Usuario</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="admexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                </div>
                <form class="form-horizontal" id="regform">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="name" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Ingrese su nombre" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="cel" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Celular :</label>
                        <div class="col-xs-5">
                            <input id="cel" name="cel" type="text" class="form-control" placeholder="Ingrese su celular" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>  
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="user2" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Email :</label>
                        <div class="col-xs-5">
                            <input id="user2" name="user" type="email" class="form-control" placeholder="Ingrese su correo" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="pass2" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Password :</label>
                        <div class="col-xs-5">
                            <input id="pass2" name="pass" type="password" class="form-control" placeholder="Ingrese su contraseña" style="background-color: rgba(255, 255, 255, 0.8); height: auto; width: auto; border-radius: 2px">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="registeruser();" type="button" class="btn btn-primary"style="font-size: 12px; border-radius: 4px"><span class="icon-arrow-right2"></span> Enviar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="actadm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.3);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Perfil de Usuario</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="updadmexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido actualizada</span>
                </div>
                <form class="form-horizontal" id="updform">
                    <div class="form-group">
                        <label for="name2" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Nombre :</label>
                        <div class="col-xs-5">
                            <input id="idu" name="idu" type="hidden" value="<?php echo $_SESSION['idu']; ?>">
                            <input id="name2" name="name" type="text" class="form-control" placeholder="Ingrese su nombre" value="<?php echo $_SESSION['name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cel2" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Celular :</label>
                        <div class="col-xs-5">
                            <input id="cel2" name="cel" type="text" class="form-control" placeholder="Ingrese su celular" value="<?php echo $_SESSION['cel']; ?>">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="user3" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Email :</label>
                        <div class="col-xs-5">
                            <input id="user3" name="user" type="email" class="form-control" placeholder="Ingrese su correo" value="<?php echo $_SESSION['user']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass3" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Password :</label>
                        <div class="col-xs-5">
                            <input id="pass3" name="pass" type="password" class="form-control" placeholder="Ingrese su contraseña" value="<?php echo $_SESSION['pass']; ?>">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="updateuser();" type="button" class="btn btn-primary"style="font-size: 12px"><span class="icon-redo"></span> Modificar</button>
            </div>
        </div>
    </div>
</div>
