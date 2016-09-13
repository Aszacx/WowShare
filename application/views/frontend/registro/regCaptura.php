<section class="text-center">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="col col-xs-0 col-sm-0 col-md-3"></div>
            <div class="col col-xs-12 col-sm-12 col-md-6">
                <ul class="nav nav-tabs text-center" id="registro">
                    <li role="presentation" class="active col-xs-12 col-sm-4 col-md-4"><a><span class="glyphicon glyphicon-edit"></span> Registro</a></li>
                    <li role="presentation" class="col-xs-12 col-sm-4 col-md-4"><a><span class="glyphicon glyphicon-usd"></span> Donativo</a></li>
                    <li role="presentation" class="col-xs-12 col-sm-4 col-md-4"><a><span class="glyphicon glyphicon-ok-sign"></span> Finalizar</a></li>
                </ul>
            </div>
            <div class="col col-xs-0 col-sm-0 col-md-3"></div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col col-xs-1 col-sm-2 col-md-4"></div>
            <div class="col col-xs-10 col-sm-8 col-md-4">
                <div class="row">
                    <h3>Formulario de Registro</h3>
                    <form name="registro" role="form" class="form-horizontal" method="POST" id="formRegistro" action="crearUsuario" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-addon">Nombre(s):</label>
                                <input name="nombre" type="text" class="form-control" placeholder="Escribe tu nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-addon">Apellido:</label>
                                <input name="apellido" type="text" class="form-control" placeholder="Escribe tu apellido">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-addon">Usuario:</label>
                                <input name="usuario" type="text" class="form-control" placeholder="Escribe un nombre de usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-addon">País:</label>
                                <select name="pais" class="form-control" name="">
                                    <option value="">Selecciona País</option>
                                <?php foreach ($paises as $item): ?>
                                    <option value="<?= $item->idPais; ?>"><?= $item->pais; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-addon">@</label>
                                <input name="email" type="email" class="form-control" placeholder="Correo Electrónico">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-addon"><span class="glyphicon glyphicon-lock "></span></label>
                                <input name="pass" type="password" class="form-control" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-addon"><span class="glyphicon glyphicon-lock "></span></label>
                                <input name="pass_confirmar" type="password" class="form-control" placeholder="Repetir Contraseña">
                            </div>
                        </div>
                        <div class="form-group text-left">
                            <div class="checkbox">
                                <label for="checkbox">
                                    <input type="checkbox" name="condiciones" id="terms" value="1">Acepto <a href="#ModalTerminos" data-toggle="modal" data-target="#ModalTerminos" onclick="check()">Términos y condiciones.</a>
                                </label>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" class="btn btn-default" value="Siguiente >">
                        </div>
                    </form>
                </div>
            </div>	
        </div>
    </div>	
</section>
<!-- Modal Terminos y Condiciones -->
<div class="modal fade" id="ModalTerminos" tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Terms and conditions</h3>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, veniam numquam has te. No suas nonumes recusabo mea, est ut graeci definitiones. His ne melius vituperata scriptorem, cum paulo copiosae conclusionemque at. Facer inermis ius in, ad brute nominati referrentur vis. Dicat erant sit ex. Phaedrum imperdiet scribentur vix no, ad latine similique forensibus vel.</p>
                <p>Dolore populo vivendum vis eu, mei quaestio liberavisse ex. Electram necessitatibus ut vel, quo at probatus oportere, molestie conclusionemque pri cu. Brute augue tincidunt vim id, ne munere fierent rationibus mei. Ut pro volutpat praesent qualisque, an iisque scripta intellegebat eam.</p>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cerrar">
                <input type="button" class="btn btn-primary" data-dismiss="modal" id="aceptar" value="Acepto los términos" onclick="aceptar()">
            </div>
            <script>
                function check() {
                    if ($('#terms').prop('checked') === true) {
                        $('#aceptar').attr('disabled', 'disabled');
                    } else if ($('#terms').prop('checked') === false) {
                        $('#aceptar').removeAttr('disabled');
                    }
                }
                function aceptar() {
                    document.registro.condiciones.click()
                }
            </script>
        </div>
    </div>
</div>