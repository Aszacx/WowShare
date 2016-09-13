<div class="container">
    <div class="row">
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
        <div class="col col-xs-12 col-sm-10 col-md-10">
            <div class="table-responsive text-center">
                <table class="table table-bordered">
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Año</th>
                        <th>Descargar</th>
                    </tr>
                    <?php
                        if (empty($catalogo)) {
                            echo '<div class="alert alert-warning text-center">Sin resultados</div>';
                        } else {
                            foreach ($catalogo as $item):
                                echo '<tr>
                                        <td>
                                            <a href="apps/'.$item->url.'">'.$item->titulo.'</a>
                                        </td>
                                        <td>'.$item->autor.'</td>
                                        <td>'.$item->anio.'</td>
                                        <td><a href="'.$item->enlace.'" class="btn btn-success btn-xs">Descargar <i class="fa fa-save"></i></a></td>
                                    </tr>';
                            endforeach;
                        }
                    ?>
                </table> 
            </div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
    </div>
</div>