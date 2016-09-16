<!--Modal Agregar/Editar Contenido-->
<div class="modal fade" id="modal-contenido" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-contenido"></h4>
                <!--<script type="text/javascript">
                    tinymce.init({
                        language : "es_MX",
                        selector: '#descrip',
                        setup: function (editor) {
                            editor.on('change', function () {
                                editor.save();
                            });
                        },
                        plugins: [
                            'lists link image preview',
                            'visualblocks code',
                            'insertdatetime media table paste code'
                        ],
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
                    });
                </script>-->
            </div>
            <div class="modal-body">
                <form role="form" id="form-contenido" onsubmit="return false">
                    <input type="hidden" id="idContenido" name="idContenido" value="">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Tipo:</label>
                            <select name="tipo" class="form-control" id="tipo-contenido">
                                <option value="">Selecciona Tipo</option>
                                <option value="1">App</option>
                                <option value="2">Libro</option>
                                <option value="3">Revista</option>
                                <option value="4">Video</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Título:</label>
                            <input name="titulo" type="text" class="form-control" id="titulo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group" id="lista-autor">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group" id="lista-categoria">
                            
                        </div>
                    </div>
                    <div class="form-group" id="portada">
                        <div class="input-group" id="lista-portada">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Año:</label>
                            <input name="anio" type="text" class="form-control" id="anio">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Enlace:</label>
                            <input name="enlace" type="text" class="form-control" id="enlace">
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Descripción:</label>
                            <textarea class="form-control" name="descripcion" id="descrip"></textarea>
                        </div>
                    </div>-->
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <input type="submit" class="btn" id="btn-contenido">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
