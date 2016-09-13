<!--Modal Agregar Portada-->
<div class="modal fade" id="modal-portada" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-portada"></h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" onsubmit="return false" id="form-portada">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></label>
                            <input type="file" name="portada" class="form-control">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" class="btn" id="btn-portada">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
