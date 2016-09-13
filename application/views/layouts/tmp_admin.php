<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url('assets/wow/img/favicon.png') ?>" />
    <?= $this->layout->css ?>
    <script type="text/javascript" src="<?= base_url('assets/tinymce-4.3.10/tinymce.min.js') ?>"></script>
    <title><?= $this->layout->getTitle(); ?></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col col-xs-12 col-sm-1 col-md-1"></div>
            <header class="col col-xs-12 col-sm-10 col-md-10">
                <div class="col col-xs-8 col-sm-8 col-md-8">
                    <h1><img src="<?= base_url('assets') . '/' ?>wow/img/logo.png" class="img-responsive left-block" /></h1>
                </div>
                <div class="col col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group text-right">
                        <div class="input-group">
                            <span class="input-group-btn">                 
                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <img src="" width="30px" height="30px" alt="Perfil">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">Configuración</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= base_url()?>backend/admin/logout">Cerrar Sesión</a></li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>
            </header>
            <div class="col col-xs-12 col-sm-1 col-md-1"></div> 
            </div>
    </div>  
    <section>
        <?= $content_for_layout ?> 
        <!--Llamar ventanas modal-->
        <?php 
            $this->load->view('layouts/modals/usuario.php');
            $this->load->view('layouts/modals/contenido.php');
            $this->load->view('layouts/modals/noticias.php');
            $this->load->view('layouts/modals/gestion_autor.php');
            $this->load->view('layouts/modals/autor.php');
            $this->load->view('layouts/modals/gestion_categoria.php');
            $this->load->view('layouts/modals/categoria.php');
            $this->load->view('layouts/modals/gestion_portada.php');
            $this->load->view('layouts/modals/portada.php');
            $this->load->view('layouts/modals/gestion_codigos.php');
            $this->load->view('layouts/modals/codigo.php');
        
        ?>  
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col col-xs-0 col-sm-0 col-md-4"></div>
                <div class="col col-xs-12 col-sm-12 col-md-4">
                    <h5 class="text-center">WOW Share 2015 | El conocimiento es compartido.</h5>        
                </div>
                <div class="col col-xs-0 col-sm-0 col-md-4"></div>
            </div>
        </div>
    </footer>
    <?= $this->layout->js ?>
    <script type="text/javascript" src="<?= base_url('assets/wow/js/admin/admin.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/wow/js/admin/autor.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/wow/js/admin/categoria.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/wow/js/admin/contenido.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/wow/js/admin/noticia.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/wow/js/admin/portada.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/wow/js/admin/slide.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/wow/js/admin/usuario.js'); ?>"></script>
</body>
</html>

