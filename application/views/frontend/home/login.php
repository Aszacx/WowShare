<div class="container">
    <div class="row text-center">
        <div class="col col-xs-12 col-sm-7 col-md-7">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="http://placehold.it/600x300" alt="">
                        <div class="carousel-caption text-right">
                            <a href="" class="btn btn-primary btn-sm">Ver Más</a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/600x300" alt="">
                        <div class="carousel-caption">
                            <a href="" class="btn btn-primary btn-sm">Ver Más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-xs-12 col-sm-5 col-md-5">
            <div class="col col-xs-1"></div>
            <div class="col col-xs-10">
                <?= validation_errors(); ?>
                <form role="form" action="<?= base_url(); ?>frontend/home/login" class="form-horizontal" method="POST" id="formLogin">
                    <h3>Iniciar Sesión</h3>
                    <div class="form-group">
                        <?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
                        <p class="alert alert-danger"><?= $this->session->flashdata('ControllerMessage'); ?></p>
                        <?php } ?>
                        <div class="input-group">
                            <label class="input-group-addon"><span class="glyphicon glyphicon-user"></span></label>
                            <input name="email" type="email" value="<?= set_value('email'); ?>" class="form-control" id="email" placeholder="Correo Electrónico">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></label>
                            <input name="pass" type="password" class="form-control" id="pass" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="forget-pass">
                            <span>
                                <a href="reset">¿Olvidaste tu contraseña?</a>
                            </span>
                        </div>
                    </div>
                    <div class="form-group text-right"> 
                        <input type="submit" id="" class="btn btn-success" value="Ingresar">
                    </div>
                    <div class="form-group text-center">
                        <a href="codigo" class="btn btn-info">Canjear Código</a>
                        <a href="registro" class="btn btn-info">¡Registrate!</a>
                    </div>
                </form>
            </div>
            <div class="col col-xs-1"></div>
        </div>	
    </div>
</div>