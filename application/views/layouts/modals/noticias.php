<!--Modal Noticias-->
<div class="modal fade" id="modal-noticia" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-noticia"></h4>
                <script type="text/javascript">
                    tinymce.init({
                        language : "es_MX",
                        selector: '#noticias',
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
                </script>
            </div>
            <div class="modal-body">
                <form role="form" id="form-noticia" onsubmit="return false">
                    <input type="hidden" id="idNoticias" name="idNoticias" value="">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Entrada:</label>
                            <select id="tipo-noticia" name="tipo_noticia" class="form-control">
                                <option value="">Selecciona Categoría</option>
                            <?php foreach ($entrada as $item): ?>
                                <option value="<?= $item->id; ?>"><?= $item->tipo; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Título:</label>
                            <input id="titulo-noticia" name="titulo" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group" id="date">
                        <div class="input-group">
                            <label class="input-group-addon">Fecha de Publicación:</label>
                            <input type="date" class="form-control" id="fecha-noticia" name="fecha" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Contenido:</label>
                            <textarea class="form-control" name="contenido" id="noticias"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <input type="submit" class="btn" id="btn-noticia">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
