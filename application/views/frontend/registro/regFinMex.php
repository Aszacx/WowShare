
<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col col-xs-1 col-sm-2 col-md-3"></div>
            <div class="col col-xs-10 col-sm-8 col-md-6">
                <h4>Registro Finalizado</h4>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-condensed text-left">
                            <tr>
                                <td><p>
                                        Nombre: Issac Centeno Andrade
                                        <br />E-mail: isacenteno@hotmail.com
                                        <br />País: México
                                        <br /><b>Tipo de Donativo: Anual</b>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="3">
                                    <p class="alert alert-success">
                                        Se te ha enviado un correo a la cuenta proporcionada,
                                        para activar su cuenta de clic en el enlace que le proporcinaremos.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="row alert alert-success">					
                        <h2>¡Gracias por registrarte!</h2>
                        <p>Recibe un deck sorpresa de regalo completando el siguiente <b><a href="#ModalGift" data-toggle="modal" data-target="#ModalGift">formulario</a>.</b></p>
                        <br>
                        <div class="text-right">
                            <input type="submit" class="btn btn-default" value="Finalizar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-xs-1 col-sm-2 col-md-3"></div>
        </div>
    </div>
</section>
<!--Modal Formulario de Regalo-->
<div class="modal fade" id="ModalGift" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalLabel">Datos de Envio</h4>
                <p>Los datos proporcionados aquí, son con fines de envío.</p>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" id="form_mex">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Dirección:</label>
                            <input name="direccion" type="text" class="form-control" id="" placeholder="Colonia, Calle, Número">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Código Postal:</label>
                            <input name="cp" type="text" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Estado:</label>
                            <select name="estado" class="form-control" id="">
                                <option value="">Selecciona Estado</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon">Delegación o Municipio:</label>
                            <input name="municipio" type="text" class="form-control" id="">
                        </div>
                    </div>	
                    <div class="form-group text-right">
                        <input type="submit" id="" class="btn btn-default" value="Guardar Datos">
                    </div>	
                </form>
            </div>	
        </div>
    </div>
</div>