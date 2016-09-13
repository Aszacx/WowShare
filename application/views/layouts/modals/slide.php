<!--Modal Editar Slide-->
<div class="modal fade" id="ModalEditSlide" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabel">Editar Slide</h4>
            </div>
            <div class="modal-body">
                <br />
                <form role="form" class="form-horizontal" method="POST" action="<?php base_url();?>administracion/actualizarSlide" id="form_slide">
                    <div class="form-group">
                        <input type="hidden" id="idSelect" name="idSelect" value="">
                        <div class="input-group">
                            <label class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></label>
                            <input id="slideSelect" name="slideSelect" type="file" class="form-control">
                        </div>
                            <input name="status" value="1" type="hidden" class="form-control">
                            <input name="tipo" value="1" type="hidden" class="form-control">
                    </div>							
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <input type="submit" id="btnActualizar" class="btn btn-primary" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
