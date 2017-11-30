<section id="blog">
    <div class="container" id="post-list">
        
    </div>
</section>


<div class="modal fade" id="regmsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgba(0, 76, 153, 0.2);">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: rgba(255, 255, 255, 0.9)">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title text-center" style="color: rgba(255, 255, 255, 0.9)"><b>Publicacion</b></h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center" id="msgexit" style="display:none;">
                    <span class="glyphicon glyphicon-ok"> </span><span> Mensaje publicado</span>
                </div>
                <form class="form-horizontal" id="reg-msg">
                    <div class="form-group" style="margin-bottom: 15px">
                        <label for="contmp" class="control-label col-xs-5" style="color: rgba(255, 255, 255, 0.8)">Contenido :</label>
                        <div class="col-xs-5">
                            <input type="hidden" id="idtop" name="idtop">
                            <input type="hidden" id="idrpm" name="idrpm">
                            <input type="hidden" id="fecact" name="fecact">
                            <input type="hidden" id="idmu" name="idmu">
                            <input type="hidden" id="idfup" name="idfup">
                            <textarea rows="5" cols="30" id="contmp" name="contmp"></textarea>
                            <input type="hidden" id="fltp" name="fltp">
                            <input type="hidden" id="flgr" name="flgr">
                            <input type="hidden" id="flin" name="flin">
                            <input type="hidden" id="flfc" name="flfc">
                            <input type="hidden" id="flcr" name="flcr">
                        </div>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 12px; border-radius: 4px"><span class="icon-reply"></span> Cerrar</button>
                <button onclick="registermessage()" type="button" class="btn btn-primary" style="font-size: 12px; border-radius: 4px"><span class="icon-arrow-right2"></span> Agregar</button>
            </div>
        </div>
    </div>
</div>