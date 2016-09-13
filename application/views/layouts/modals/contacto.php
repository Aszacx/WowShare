<!--Modal Contacto-->
<div class="modal fade" id="modal-contacto" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-contacto">Contacto</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-contacto">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon"><span class="glyphicon glyphicon-user"></span></label>
                            <input name="usuario" type="text" class="form-control" readonly="readonly" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="input-group">Asunto:</label>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="radio" name="asunto" value="window" />Sugerencia
                            </label>
                            <label class="btn btn-default">
                                <input type="radio" name="asunto" value="centasunto" />Queja
                            </label>
                            <label class="btn btn-default">
                                <input type="radio" name="asunto" value="fedora" />Petición
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Prioridad:</label>
                            <select name="prioridad" class="form-control">
                                <option value="">Selecciona prioridad</option>
                                <option value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="alta">Alta</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Mensaje:</label>
                            <textarea name="mensaje" class="form-control" rows="8"></textarea>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <input type="submit" id="btn-contacto" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
