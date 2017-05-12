<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-8">
            <div id="carousel-principal" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $active = 'active';
                    for($slide = 0; $slide < count($slide_principal); $slide++){
                        if($slide_principal[$slide]->tipo == 1){
                            echo '<li data-target="#carousel-principal" data-slide-to="'.$slide.'" class="'.$active.'"></li>';
                            $active = '';                           
                        }
                    }
                    ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php
                    if (empty($slide_principal)) {
                        echo '<div class="alert alert-warning text-center">Sin resultados</div>';
                    } else {
                        $active = 'active';
                        foreach ($slide_principal as $item):
                            if($item->tipo == 1){
                                echo '<div class="item '.$active.'">
                                <img src="'.$item->ruta.'" alt="'.$item->nombre.'">
                                <div class="carousel-caption">
                                    <a href="" class="btn btn-primary btn-sm">Ver Más</a>
                                </div>
                            </div>';
                            $active = '';
                            }
                        endforeach;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-4">
            <div id="carousel-promo" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $active = 'active';
                    for($promo = 0; $promo < count($slide_promo); $promo++){
                        if($slide_promo[$promo]->tipo == 2){
                            echo '<li data-target="#carousel-promo" data-slide-to="'.$promo.'" class="'.$active.'"></li>';
                            $active = '';
                        }                           
                    }
                    ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php
                    if (empty($slide_promo)) {
                        echo '<div class="alert alert-warning text-center">Sin resultados</div>';
                    } else {
                        $active = 'active';
                        foreach ($slide_promo as $item):
                            if($item->tipo == 2){
                                echo '<div class="item '.$active.'">
                                <img src="'.$item->ruta.'" alt="'.$item->nombre.'">
                                <div class="carousel-caption">
                                    <a href="" class="btn btn-primary btn-sm">Ver Más</a>
                                </div>
                            </div>';
                            $active = '';
                        }
                        endforeach;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-12">
            <div class="row">
                <div id="liquid" class="liquid">
                    <span class="previous"><i class="glyphicon glyphicon-chevron-left"></a></span>
                    <div class="wrapper">
                        <ul>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                            <li><a href="#"><img src="uploads/cover/thumbs/azul_thumb.png" width="88" height="126" alt="image"/></a></li>
                        </ul>
                    </div>
                    <span class="next"><i class="glyphicon glyphicon-chevron-right"></i></span>
                </div>
            </div>
        <h4>Videos Recientes</h4>
            <div class="carousel slide" id="slide-video">
                <div class="carousel-inner">
                    <?php
                    if (empty($portadas)) {
                        echo '<div class="alert alert-warning text-center">Sin resultados</div>';
                    } else {
                        $active = 'active';
                        echo '<div class="item '.$active.'"><ul>';
                        foreach ($portadas as $item):
                            echo '<li class="col-md-2">
                                <div class="thumbnail">
                                    <a href=""><img src="'.$item->miniatura.'" alt="'.$item->nombre.'"></a>
                                </div>
                                <div class="caption">
                                    <h6>Praesent commodo</h6>
                                </div>
                            </li>';
                        $active = '';
                        endforeach;
                        echo '</ul></div>';
                    }
                    ?>                    
                </div>					      
                <div class="control-box">                            
                    <a class="left carousel-control" href="#slide-video" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#slide-video" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>					                              
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
        <div class="col col-xs-0 col-sm-1 col-md-10">
            <div class="col col-xs-12 col-sm-12 col-md-12">
                <h4>Últimas Noticias</h4>
                <div class="col col-xs-12 col-sm-12 col-md-12">
                    <?php
                        if (empty($noticias)) {
                            echo '<div class="alert alert-warning text-center">Sin resultados</div>';
                        } else {
                            foreach ($noticias as $item):
                    ?>
                    <div class="col col-xs-12 col-sm-4 col-md-4">
                        <h5><?= $item->titulo; ?></h5>
                        <p><?= $item->contenido; ?></p>
                        <date><?= $item->fecha; ?></date>
                        <a href="<?= 'noticias/'.$item->url; ?>" class="btn btn-success btn-xs">Ver más</a>
                    </div>
                    <?php
                        endforeach;
                        }
                    ?>
                </div>		
            </div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
    </div>
</div>
