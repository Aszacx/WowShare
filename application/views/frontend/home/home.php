<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-8">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <?php
                    for($slide = 0; $slide < count($slides); $slide++){
                        //echo 'Registro:'.$i.' y su tipo:'.$slides[$i]->tipo;
                        if($slides[$slide]->tipo == 1){
                            echo '<li data-target="#carousel-example-generic" data-slide-to="'.$slide.'"></li>';
                        }                           
                    }
                    ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="http://placehold.it/750x300" alt="">
                        <div class="carousel-caption text-right">
                            <a href="" class="btn btn-primary btn-sm">Ver Más</a>
                        </div>
                    </div>
                    <?php
                    if (empty($slides)) {
                        echo '<div class="alert alert-warning text-center">Sin resultados</div>';
                    } else {
                        foreach ($slides as $item):
                            if($item->tipo == 1){
                                echo '<div class="item">
                                <img src="'.$item->ruta.'" alt="'.$item->nombre.'">
                                <div class="carousel-caption">
                                    <a href="" class="btn btn-primary btn-sm">Ver Más</a>
                                </div>
                            </div>';
                        }
                        endforeach;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-4">
            <div id="carousel-example-ungeneric" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-ungeneric" data-slide-to="0" class="active"></li>
                    <?php
                    for($promo = 0; $promo < count($slides); $promo++){
                                //echo 'Registro:'.$i.' y su tipo:'.$slides[$i]->tipo;
                        if($slides[$promo]->tipo == 2){
                            echo '<li data-target="#carousel-example-generic" data-slide-to="'.$promo.'"></li>';
                        }                           
                    }
                    ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="http://placehold.it/360x300" alt="">
                    </div>
                    <?php
                    if (empty($slides)) {
                        echo '<div class="alert alert-warning text-center">Sin resultados</div>';
                    } else {
                        foreach ($slides as $item):
                            if($item->tipo == 2){
                                echo '<div class="item">
                                <img src="'.$item->ruta.'" alt="'.$item->nombre.'">
                                <div class="carousel-caption">
                                    <a href="" class="btn btn-primary btn-sm">Ver Más</a>
                                </div>
                            </div>';
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
        <h4>Videos Recientes</h4>
            <div class="carousel slide" id="Slide-Video">
                <div class="carousel-inner">
                    <div class="item active">
                        <ul class="">
                            <li class="col-md-2">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/90x140" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h6>Praesent commodo</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <ul class="">
                            <li class="col-md-2">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/90x140" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h6>Praesent commodo</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>					      
                <div class="control-box">                            
                    <a class="left carousel-control" href="#Slide-Video" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#Slide-Video" role="button" data-slide="next">
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
