<!--Modal Editar Portadas-->
<div class="modal fade" id="gestionar-portadas" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-portadas"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col col-md-6">
                        <div id="msj-portada"></div>
                    </div>
                    <div class="col col-md-6">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-md" type='button' id='nuevo-portada'><i class='fa fa-plus'></i></button>
                            </span> 
                            <div class="right-inner-addon">
                                <i class="fa fa-search"></i>
                                <input type="text" id="buscar-portada" class="form-control" placeholder="Buscar Portada">
                            </div>
                        </div>
                    </div>
                </div>
                <br /> 
                <div class="table-responsive text-center" id="tabla-portadas"> 
                            
                </div> 
                <div class="text-center" id="paginacion-portadas"></div>
            </div>
        </div>
    </div>
</div>
