<!--Modal Agregar Códigos-->
<div class="modal fade" id="modal-codigos" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-codigo"></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-codigos" onsubmit="return false">
                    <div class="radio">
                        <label>
                          <input type="radio" name="cantidad" id="" value="1" checked>
                          1 código.
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="cantidad" id="" value="10">
                          10 códigos.
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="cantidad" id="" value="25">
                          25 códigos.
                        </label>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <input type="submit" class="btn" id="btn-codigos">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
