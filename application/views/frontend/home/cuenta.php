<div class="container">
    <div class="row">
        <div class="col col-xs-0 col-sm-2 col-md-2"></div>
        <div class="col col-xs-12 col-sm-3 col-md-3">
                
        </div>
        <div class="col col-xs-12 col-sm-5 col-md-5">
            <form role="form" id="formUsuario" method="POST" action="">
                <input type="hidden" id="idUsuario" name="idUsuario" value="">
                <div class="form-group">
                    <div class="input-group">
                        <label class="input-group-addon">Nombre(s):</label>
                        <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Escribe tu nombre" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label class="input-group-addon">Apellido:</label>
                        <input name="apellido" type="text" class="form-control" id="apellido" placeholder="Escribe tu apellido" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label class="input-group-addon">Usuario:</label>
                        <input name="usuario" type="text" class="form-control" id="usuario" placeholder="Escribe tu usuario" />
                    </div>
                </div>
                <div class="form-group" id="password">
                    <div class="input-group">
                        <label class="input-group-addon"><span class="glyphicon glyphicon-lock "></span></label>
                        <input name="pass" type="password" class="form-control" id="pass" placeholder="Contraseña" />
                    </div>
                </div>                      
                <div class="modal-footer">
                    <div class="form-group text-right">
                        <input type="submit" class="btn btn-success btn-lg" value="Guardar">
                    </div>
                </div>
            </form>   
        </div>
        <div class="col col-xs-0 col-sm-2 col-md-2"></div>
    </div>
</div>