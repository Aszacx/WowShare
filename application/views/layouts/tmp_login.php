<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url('assets/wow/img/favicon.png'); ?>" />
    <?= $this->layout->css ?> 
    <title><?= $this->layout->getTitle(); ?></title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row text-center">
                <div class="col col-xs-12 col-sm-12 col-md-12">
                    <figure>
                        <img class="img-responsive center-block" src="<?= base_url('assets').'/'; ?>wow/img/logo.png" alt="Wow Share">
                    </figure>
                </div>  
            </div>
        </div>
        <hr />
    </header>
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
                <div class="col col-xs-0 col-sm-0 col-md-4"></div>
            </div>
        </div>
    </footer>
    <?= $this->layout->js ?>
</body>
</html>