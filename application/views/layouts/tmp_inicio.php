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
    			<div class="row">
    				<div class="col col-xs-8 col-sm-4 col-md-4">
    					<figure>
    						<img class="img-responsive center-block" src="<?= base_url('assets').'/'; ?>wow/img/logo.png" alt="Wow Share">
    					</figure>
    				</div>	
    				<div class="col col-xs-0 col-sm-4 col-md-2"></div>
    				<div class="col col-xs-4 col-sm-4 col-md-6 text-right">
    					<a href="#"><i class="fa fa-facebook-official fa-2x"></i></a>
    					<a href="#"><i class="fa fa-twitter fa-2x"></i></a>
    					<a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
    				</div>
    			</div>
    		</div>
    		<hr />
    	</header>
	    <section>
	    	<?= $content_for_layout; ?>
            <!--Llamar ventanas modal-->
            <?php
                $this->load->view('layouts/modals/aviso.php');
                $this->load->view('layouts/modals/contacto.php');
            ?>
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
        <?= $this->layout->js ?>
	</body>
</html>