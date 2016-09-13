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
                   <button class="btn btn-default btn-sm text-right" id="generar-codigo"><i class="fa fa-plus-square fa-2x"></i></button>
               </div>
                <div class="row">
                    <div class="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#uso" aria-controls="uso" data-toggle="tab" role="tab">En Uso</a></li>
                            <li role="presentation"><a href="#libres" aria-controls="libres" data-toggle="tab" role="tab">Libres</a></li>
                        </ul>
                        <div class="tab-content text-center">
                            <!--Gestión de Códigos en Uso-->
                            <div role="tabpanel" class="tab-pane active" id="uso">
                                <h3>Gestión de Unboxing</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates sequi voluptatibus ex pariatur tenetur dolore adipisci sunt perferendis aperiam cupiditate, voluptas quasi non, eum perspiciatis excepturi ducimus ea unde magnam.</p>	
                            </div>
                            <!--Gestión de Códigos Libres-->
                            <div role="tabpanel" class="tab-pane" id="libres">
                                <h3>Gestión de Libres</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates sequi voluptatibus ex pariatur tenetur dolore adipisci sunt perferendis aperiam cupiditate, voluptas quasi non, eum perspiciatis excepturi ducimus ea unde magnam.</p>	
                            </div>
                        </div>
                    </div>
                <br />
                <div class="alert alert-info text-center mensaje" id="msjAutor" style="display: none;"></div>
                <div class="table-responsive text-center" id="tablaAutores"> 
                            
                </div>
            </div>
        </div>
    </div>
</div>
