<!--Modal Agregar Portada-->
<div class="modal fade" id="modal-slide" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-slide"></h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" onsubmit="return false" id="form-slide">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Tipo:</label>
                            <select name="slides" id="slides" class="form-control">
                                <option value="">Selecciona Tipo</option>
                                <option value="1">Slide Principal 600x300</option>
                                <option value="2">Publicidad 300x300</option>
                                <option value="3">Publicidad 1000x150</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></label>
                            <input type="file" name="ruta" class="form-control">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" class="btn" id="btn-slide">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>