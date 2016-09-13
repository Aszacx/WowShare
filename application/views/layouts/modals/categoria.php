<!--Modal Agregar Categoría-->
<div class="modal fade" id="modal-categoria" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-categoria"></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-categoria" onsubmit="return false">
                    <div class="form-group">
                        <input type="hidden" id="idCategoria" name="idCategoria" value="">
                        <div class="input-group">
                            <label class="input-group-addon">Categoría:</label>
                            <input name="categoria" type="text" id="edit-categoria" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <input type="submit" class="btn" id="btn-categoria">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
