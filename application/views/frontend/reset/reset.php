<div class="container">
    <div class="row">
        <div class="col col-xs-1 col-sm-2 col-md-4">
        </div>
        <div class="col col-xs-10 col-sm-8 col-md-4">
            <div class="row">
                <?php 
                    if (!empty($detalle)) {
                        print_r($detalle); 
                    }
                    else{
                        echo "No se encontro";
                    } 
                ?>
                <?= '<div class="alert alert-danger">'.validation_errors().'</div>' ?>
                <form role="form" class="form-horizontal" method="POST" action="reset/recuperar" id="formContra">
                    <h3>Recuperar contraseña</h3>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon"><span class="glyphicon glyphicon-user"></span></label>
                            <input name="email" type="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Escribe tu Correo Electrónico">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon" id="captchaOperation"></label>
                            <input type="text" class="form-control" name="captcha" />
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" id="btn-ingresar" class="btn btn-default" value="Enviar">
                    </div>
                </form>
            </div>
        </div>	
    </div>
</div>	