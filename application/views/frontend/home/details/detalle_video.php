<div class="container">
    <div class="row">
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
        <div class="col col-xs-12 col-sm-10 col-md-10">
            <div id="marketing" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-ungeneric" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-ungeneric" data-slide-to="1"></li>
                    <li data-target="#carousel-example-ungeneric" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="http://placehold.it/1000x150" alt="">
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/1000x150" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
    </div>
    <hr />
    <div class="row">
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
        <div class="col col-xs-12 col-sm-10 col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
                <div id="player"></div>
                <script type="text/javascript">
                    jwplayer("player").setup({
                        file: window.atob("<?php echo base64_encode($detalle->enlace) ?>"),
                        //image: "<?= $detalle->ruta ?>",
                        title: "<?= $detalle->titulo; ?>"
                    });
                </script>
            </div>
        </div>
        <div class="col col-xs-12 col-sm-10 col-md-4">					
            <div class="table-responsive text-left">
                <table class="table">
                    <tr>
                        <h4><?= $detalle->titulo; ?></h4>
                    </tr>
                    <tr>
                        <figure>
                            <img src="<?= $detalle->miniatura ?>" alt="<?= $detalle->nombre ?>" class="img-responsive" width="50px" height="80px">
                        </figure>
                    </tr>
                    <tr>
                        <td><?= $detalle->descripcion ?></td>
                    </tr>
                    <tr>
                        <td>Autor: <?= $detalle->autor ?></td>
                    </tr>
                    <tr>
                        <td>Año: <?= $detalle->anio ?></td>
                    </tr>
                    <tr>
                        <td>Categoría: <?= $detalle->categoria ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-right">
            <div class="fb-like" data-layout="box_count"></div>
            <div id="fb-root"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col col-xs-0 col-sm-1 col-md-1"></div>
                <div class="col col-xs-12 col-sm-10 col-md-10">
                    <div class="fb-comments" data-href="http://localhost/share/views/video.jsp" data-numposts="10" data-width="100%"></div>
                    <div id="fb-root"></div>
                </div>
                <div class="col col-xs-0 col-sm-1 col-md-1"></div>
            </div>
        </div>
    </div>
    <div class="col-xs-0 col-sm-1 col-md-1"></div>
</div>
