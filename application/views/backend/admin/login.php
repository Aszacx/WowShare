<div class="container">
        <div class="row text-center">
            <div class="col col-xs-1 col-sm-3 col-md-3"></div>
            <div class="col col-xs-10 col-sm-6 col-md-6">
                <div class="panel panel-default panel-info">
                    <div class="panel-heading">Iniciar Sesión</div>
                    <div class="panel-body">
                        <div class="col col-xs-1"></div>
                        <div class="col col-xs-10">
                            <?= validation_errors(); ?>
                            <form role="form" action="<?= base_url(); ?>backend/admin/login" class="form-horizontal" method="POST" id="formLogin">
                                <?php if ($this->session->flashdata('ControllerMessage') != '') { ?>
                                <p class="alert alert-danger"><?= $this->session->flashdata('ControllerMessage'); ?></p>
                                <?php } ?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-addon"><span class="glyphicon glyphicon-user"></span></label>
                                        <input name="email" type="email" value="<?= set_value('email') ?>" class="form-control" id="email" placeholder="Correo Electrónico">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></label>
                                        <input name="pass" type="password" class="form-control" id="pass" placeholder="Contraseña">
                                    </div>
                                </div>
                                <div class="form-group text-right"> 
                                    <input type="submit" id="" class="btn btn-success" value="Ingresar">
                                </div>
                            </form>
                        </div>
                        <div class="col col-xs-1"></div>
                    </div>
                </div>
            </div>	
            <div class="col col-xs-1 col-sm-3 col-md-3"></div>
        </div>
    </div>
    