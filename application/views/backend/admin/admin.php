<div class="container">
    <div class="row">
        <div class="col col-xs-1 col-sm-1 col-md-1"></div>
        <div class="col col-xs-10 col-sm-10 col-md-10">
            <div class="tabpanel">
                <!--Tabs de menú-->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#users" aria-controls="users" data-toggle="tab" role="tab">Clientes</a></li>
                    <li role="presentation"><a href="#contenido" aria-controls="contenido" data-toggle="tab" role="tab">Contenido</a></li>
                    <li role="presentation"><a href="#notice" aria-controls="notice" data-toggle="tab" role="tab">Noticias</a></li>
                    <li role="presentation"><a href="#slide" aria-controls="slide" data-toggle="tab" role="tab">Slide Principal</a></li>
                    <li role="presentation"><a href="#marketing" aria-controls="marketing" data-toggle="tab" role="tab">Publicidad</a></li>
                    <li role="presentation"><a href="#unboxing" aria-controls="unboxing" data-toggle="tab" role="tab">Unboxing</a></li>
                </ul>
                <div class="tab-content text-center">
                    <!--Gestión de Usuarios-->
                    <div role="tabpanel" class="tab-pane active" id="users">
                        <div class="row">
                            <div class="col col-md-6 text-center">
                                <h3>Gestión de Clientes</h3>
                            </div>
                            <div class="col col-md-6 text-right">
                                <br />
                                <button class="btn btn-default btn-sm" id="gestion-codigos">
                                Gestionar Códigos</button>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success btn-sm" id="nuevo-usuario"><i class="fa fa-plus-square fa-2x"></i></button>
                                    <button class="btn btn-default btn-sm" id="recargar-usuario"><i class="fa fa-refresh fa-2x fa-fw"></i></button>
                                </div> 
                                <br />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col col-md-8">
                                <div class="alert alert-info text-center mensaje" id="msj-usuario" style="display: none;"></div>
                            </div>                            
                            <div class="col col-md-4">
                                <div class="right-inner-addon">
                                    <i class="fa fa-search"></i>                   
                                    <input type="text" id="buscar-usuario" class="form-control" placeholder="Buscar Usuario">
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="table-responsive text-center" id="tabla-usuarios">          
                        
                        </div>
                        <div class="text-center" id="paginacion-usuario"></div>
                    </div>
                    <!--Gestión de Contenido-->
                    <div role="tabpanel" class="tab-pane" id="contenido">
                        <div class="row">
                            <div class="col col-md-6">  
                                <h3>Gestión de Contenido</h3>
                            </div>
                            <div class="col col-md-6 text-right">
                                <br />
                                <div class="btn-group" role="group">
                                    <button class="btn btn-default btn-sm" id="gestion-autor">Gestionar Autores</button>
                                    <button class="btn btn-default btn-sm" id="gestion-categoria">Gestionar Categorias</button>
                                    <button class="btn btn-default btn-sm" id="gestion-portada">Gestionar Portadas</button>
                                </div> 
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success btn-sm" id="nuevo-contenido"><i class="fa fa-plus-square fa-2x"></i></button>
                                </div>
                                <br />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col col-md-4">
                                <div class="input-group">
                                    <label class="input-group-addon"><i class="fa fa-filter"></i></label>
                                    <select name="filtro" class="form-control" id="filtro">
                                        <option value="0">Todos</option>
                                        <option value="1">Apps</option>
                                        <option value="2">Libros</option>
                                        <option value="3">Revistas</option>
                                        <option value="4">Videos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-md-4">
                                <div id="msj-contenido" class="alert text-center"></div>
                            </div>
                            <div class="col col-md-4">
                                <div class="right-inner-addon">
                                    <i class="fa fa-search"></i>
                                    <input type="text" id="buscar-contenido" class="form-control" placeholder="Buscar contenido">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive text-center" id="tabla-contenido"> 
                            
                        </div>
                        <div class="text-center" id="paginacion-contenido"></div>
                    </div>
                    <!--Gestión de Noticias-->
                    <div role="tabpanel" class="tab-pane" id="notice">
                        <div class="row">
                            <div class="col col-md-6">  
                                <h3>Gestión de Noticias</h3>
                            </div>
                            <div class="col col-md-6 text-right">
                                <br />
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success btn-sm" id="nueva-noticia" title="Agregar Noticia"><i class="fa fa-plus-square fa-2x"></i></button>
                                </div>
                                <br />
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col col-md-8">
                                <div class="alert alert-info text-center mensaje" id="msj-noticia" style="display: none;">
                            </div>  
                            </div>
                            <div class="col col-md-4">
                                <div class="right-inner-addon">
                                    <i class="fa fa-search"></i>                   
                                    <input type="text" id="buscar-noticia" class="form-control" placeholder="Buscar Noticias/Guías">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive text-center" id="tabla-noticias">
                            
                        </div>
                        <div class="text-center" id="paginacion-noticias"></div>	
                    </div>
                    <!--Gestión de Slide-->
                    <div role="tabpanel" class="tab-pane" id="slide">
                        <h3>Gestión de Slide</h3>
                        <hr>
                        <div class="col col-md-1"></div>
                        <div class="col col-md-10">
                            <?php //echo form_open_multipart("backend/admin/do_upload") ?>
                            <form method="POST" enctype="multipart/form-data" id="form-slide" onsubmit="return false">
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
                                    <button class="btn btn-default" onclick="agregarSlide();">Subir</button>
                                </div>
                            </form>
                            <div class="alert alert-info text-center mensaje msj-slide" style="display: none;"></div> 
                            <div class="table-responsive text-center slides" id="tablaSlides">
                                
                            </div>
                        </div>  
                        <div class="col col-md-1"></div>
                    </div>
                    <!--Gestión de Publicidad-->
                    <div role="tabpanel" class="tab-pane" id="marketing">
                        <h3>Gestión de Publicidad</h3>
                        <div class="col col-md-1"></div>
                        <div class="col col-md-10">
                            <div class="alert alert-info text-center mensaje msjSlide" style="display: none;"></div> 
                            <hr>
                            <h4>Publicidad 600x630</h4>
                            <div class="table-responsive text-center slides" id="publicidad300x300">
                                
                            </div>
                            <hr>
                            <h4>Publicidad 1000x150</h4>
                            <div class="table-responsive text-center slides" id="publicidad1000x150">
                                
                            </div>
                        </div>  
                        <div class="col col-md-1"></div>                            
                    </div>
                    <!--Gestión de Unboxing-->
                    <div role="tabpanel" class="tab-pane" id="unboxing">
                        <h3>Gestión de Unboxing</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates sequi voluptatibus ex pariatur tenetur dolore adipisci sunt perferendis aperiam cupiditate, voluptas quasi non, eum perspiciatis excepturi ducimus ea unde magnam.</p>	
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-xs-1 col-sm-1 col-md-1"></div>
    </div>
</div>