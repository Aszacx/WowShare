<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="icon" type="image/png" href="<?= base_url('assets/wow/img/favicon.png'); ?>" />
        <?= $this->layout->css; ?> 
        <title><?= $this->layout->getTitle(); ?></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <div class="col col-xs-8 visible-xs">
                                    <img src="<?= base_url('assets').'/' ?>wow/img/logo.png" class="img-responsive left-block logo-responsive" />
                                </div>
                                <div class="col col-xs-4">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Menú</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <div class="visible-sm visible-md visible-lg">
                                    <ul class="nav navbar-nav navbar-left">
                                        <img src="<?= base_url('assets').'/' ?>wow/img/logo.png" class="img-responsive left-block logo" />
                                    </ul>
                                </div>
                                <ul class="nav navbar-nav menu">
                                    <li><?= anchor('/', 'Inicio'); ?></li>
                                    <li><?= anchor('noticias', 'Noticias'); ?></li>
                                    <li><?= anchor('lecturas', 'Lectura'); ?></li>                      
                                    <li><?= anchor('videos', 'Videos'); ?></li>
                                    <li><?= anchor('apps', 'Apps'); ?></li>
                                    <!--<li><?= anchor('unboxing', 'Unboxing'); ?></li>
                                    <li><?= anchor('comunidad', 'Comunidad'); ?></li>
                                    <li><?= anchor('eventos', 'Eventos'); ?></li>-->
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                            <span>Bienvenido</span>
                                            <img src="" width="30px" height="30px" alt="Perfil">
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?= base_url(); ?>frontend/home/cuenta">Mi Perfil</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="<?= base_url(); ?>frontend/home/logout">Cerrar Sesión</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-question-circle fa-lg"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" id="guias">Guías</a></li>
                                            <li><a href="#" id="ayuda">Ayuda</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#ModalContacto" data-toggle="modal" data-target="#ModalContacto" data-whatever="@getbootstrap">Contactanos</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <section>
            <?= $content_for_layout; ?>
        </section>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-0 col-sm-0 col-md-4"></div>
                    <div class="col col-xs-12 col-sm-12 col-md-4">
                        <h5 class="text-center">WOW Share 2015 | El conocimiento es compartido.</h5>        
                    </div>
                    <div class="col col-xs-0 col-sm-0 col-md-4">
                        <h5 class="text-right"><a href="#ModalAviso" data-toggle="modal" data-target="#ModalAviso">Aviso Legal</a> | <a href="#ModalContacto" data-toggle="modal" data-target="#ModalContacto" data-whatever="@getbootstrap">Contacto</a></h5>
                    </div>
                </div>
            </div>
        </footer>
        <?= $this->layout->js; ?>
        <!--Llamar ventanas modal-->
        <?php
            $this->load->view('layouts/modals/aviso.php');
            $this->load->view('layouts/modals/contacto.php');
        ?>
    </body>
</html> 