<!--Modal Agregar Usuario-->
<div class="modal fade" id="modal-usuario" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-usuario"></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-usuario" onsubmit="return false">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="">
                    <div class="form-group" id="tipo">
                        <div class="input-group">
                            <label class="input-group-addon">Rol:</label>
                            <select name="tipo" class="form-control" id="tipo-usuario">
                                <option value="">Selecciona Rol</option>
                                <option value="1">Admin</option>
                                <option value="2">Afiliador</option>
                                <option value="3">Cliente</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="tipo-membresia">
                        <div class="input-group">
                            <label class="input-group-addon">Membresia:</label>
                            <select id="membresia" name="membresia" class="form-control">
                                <option value="">Selecciona Membresía</option>
                                <?php foreach ($membresia as $item): ?> 
                                <option value="<?= $item->id; ?>"><?= $item->membresia; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
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
                            <label class="input-group-addon">País:</label>
                            <select id="pais" name="pais" class="form-control">
                                <option value="">Selecciona País</option>
                                <?php foreach ($paises as $item): ?> 
                                <option value="<?= $item->id; ?>"><?= $item->pais; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">@</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Correo Electrónico" />
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
                            <input type="submit" class="btn" id="btn-usuario">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
