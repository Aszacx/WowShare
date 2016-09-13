<div class="container">
    <div class="row">
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
        <div class="col col-xs-0 col-sm-1 col-md-10" id="detalleContenido">
            <div class="col col-xs-12 col-sm-3 col-md-3">
                <h4>Libros</h4>
                <ul>
                    <li><a href="#">Recientes</a></li>
                    <li><a href="#">Más Vistas</a></li>
                    <li><a href="#">Proximamente</a></li>
                </ul>
            </div>
            <div class="col col-xs-12 col-sm-9 col-md-9">
                <?php 
                    if (empty($noticias)) {
                        echo '<div class="alert alert-warning text-center">Sin resultados</div>';
                    } 
                    else {
                        foreach ($noticias as $item):                          
                            echo '<h2><a href="noticias/'.$item->url.'">'.$item->titulo.'</a></h2>
                            <date>Fecha de publicación: '.$item->fecha.'</date>
                            <p>'.$item->contenido.'</p>';
                        endforeach;
                    }
                ?>
            </div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
    </div>
</div>