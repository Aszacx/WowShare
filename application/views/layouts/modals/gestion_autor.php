<!--Modal Gestionar Autores-->
<div class="modal fade" id="gestionar-autores" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-autores"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col col-md-6">
                        <div id="msj-autor"></div>
                    </div>
                    <div class="col col-md-6">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-md" type='button' id='nuevo-autor'><i class='fa fa-plus'></i></button>
                            </span> 
                            <div class="right-inner-addon">
                                <i class="fa fa-search"></i>
                                <input type="text" id="buscar-autor" class="form-control" placeholder="Buscar Autores">
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="table-responsive text-center" id="tabla-autores"> 
                            
                </div>
                <div class="text-center" id="paginacion-autores"></div>
            </div>
        </div>
    </div>
</div>
