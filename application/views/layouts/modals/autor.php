<!--Modal Agregar Autor-->
<div class="modal fade" id="modal-autor" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-autor"></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-autor" onsubmit="return false">
                    <input type="hidden" id="idAutor" name="idAutor" value="">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Autor:</label>
                            <input name="autor" type="text" id="edit-autor" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <input type="submit" class="btn" id="btn-autor">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
