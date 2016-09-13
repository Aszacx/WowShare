<div class="container">
    <div class="row">
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
        <div class="col col-xs-12 col-sm-10 col-md-10 text-center">
            <div class="table-responsive text-center">
                <table class="table table-bordered">
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Categoria</th>
                        <th>Año</th>
                        <th>Leer</th>
                    </tr>
                    <?php
                    if (empty($catalogo)) {
                        echo '<div class="alert alert-warning text-center">Sin resultados</div>';
                    } 
                    else {
                        foreach ($catalogo as $item):
                            echo '<tr>
                        <td>'.$item->titulo.'</td>
                        <td>'.$item->autor.'</td>
                        <td>'.$item->categoria.'</td>
                        <td>'.$item->anio.'</td>
                        <td>
                            <a href="lecturas/'.$item->url.'" class="btn btn-primary btn-xs"><i class="fa fa-book"></i> Leer</a>
                        </td>
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
