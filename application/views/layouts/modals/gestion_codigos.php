<!--Modal Gestión de Códigos-->
<div class="modal fade" id="gestionar-codigos" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-codigos"></h4>
            </div>
            <div class="modal-body">
               <div class="row">
                    <div class="col col-md-6">
                        <div id="msj-codigos"></div>
                    </div>
                    <div class="col col-md-6">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-md" type="button" id="generar-codigos"><i class="fa fa-plus"></i></button>
                            </span> 
                            <div class="right-inner-addon">
                                <i class="fa fa-search"></i>
                                <input type="text" id="buscar-codigos" class="form-control" placeholder="Buscar Código/Usuario">
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="table-responsive text-center" id="tabla-codigos"></div>
                <div class="text-center" id="paginacion-codigos"></div>    
            </div>
        </div>
    </div>
</div>
