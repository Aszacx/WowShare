<section>	
    <div class="container">
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
        <div class="col col-xs-0 col-sm-10 col-md-10">
            <div class="text-right">
                <a href="#AddArt" data-toggle="modal" data-target="#AddArt" class="btn btn-primary btn-sm">Agregar artículo</a>
            </div>
            <hr>
            <div class="col col-xs-12 col-sm-3 col-md-3 visible-xs">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle btn-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Básico <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                        </ul>
                    </li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle btn-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Autor <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                        </ul>
                    </li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle btn-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Categoría <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                        </ul>
                    </li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle btn-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Año <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>1</li>
                            <li>1</li>
                            <li>1</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col col-xs-12 col-sm-3 col-md-3 visible-sm visible-md visible-lg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit facilis totam, nulla est, optio a eius distinctio voluptate atque deserunt iste nihil ratione quae et, eum porro. Provident, quam, eligendi.</p>
            </div>
            <div class="col col-xs-12 col-sm-9 col-md-9">
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="thumbnail text-center">
                            <img src="" alt="Artículo">
                            <div class="caption visible-md visible-lg">
                                <h5>Thumbnail label</h5>
                                <p>$10.00</p>
                                <a href="articulo_solo.html" class="btn btn-primary btn-xs">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="thumbnail text-center">
                            <img src="" alt="Artículo">
                            <div class="caption visible-md visible-lg">
                                <h5>Thumbnail label</h5>
                                <p>$10.00</p>
                                <a href="articulo_solo.html" class="btn btn-primary btn-xs">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="thumbnail text-center">
                            <img src="" alt="Artículo">
                            <div class="caption visible-md visible-lg">
                                <h5>Thumbnail label</h5>
                                <p>$10.00</p>
                                <a href="articulo_solo.html" class="btn btn-primary btn-xs">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
            <nav>
                <ul class="pager">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">Anterior</span>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">Siguiente</span>
                        </a>
                    </li>
                </ul>
            </nav>			
        </div>
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
    </div>
</section>
<!--Modal Agregar Artículo-->
<div class="modal fade" id="AddArt" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabel">Agregar Artículo</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" id="form_articulo">
                    <div class="form-group">		            		
                        <div class="input-group">
                            <label class="input-group-addon">Nombre:</label>
                            <input name="nombre" type="text" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Foto:</label>
                            <input name="textbox[]" type="file" class="form-control" id="">
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-info btn-sm addButton" data-template="textbox"><span class="glyphicon glyphicon-plus"></span>  Agregar Foto</button>
                        </div>
                    </div>
                    <div class="form-group hide" id="textboxTemplate">
                        <div class="input-group">
                            <label class="input-group-addon">Foto:</label>
                            <input name="textbox[]" type="file" class="form-control" id="">
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-info btn-sm removeButton" data-template="textbox"><span class="glyphicon glyphicon-minus"></span>  Eliminar Foto</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Precio:</label>
                            <input name="precio" type="text" class="form-control" id="">
                            <label class="input-group-addon">.00</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Condiciones:</label>
                            <select name="condicion" class="form-control" id="">
                                <option value="">Selecciona Condición</option>
                                <option value="usado">Usado</option>
                                <option value="nuevo">Nuevo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Descripción:</label>
                            <textarea name="descripcion" class="form-control" name="" id="" cols="20" rows="5"></textarea>
                        </div>
                    </div>
                    <div id="mensaje"></div>
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <input type="submit" id="" class="btn btn-primary" value="Agregar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>