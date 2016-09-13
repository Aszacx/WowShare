<div class="container">
    <div class="row">
        <div class="col col-xs-0 col-sm-12 col-md-12">
           <div class="row">
                <?php
                    if (empty($catalogo)) {
                        echo '<div class="alert alert-warning text-center">Sin resultados</div>';
                    } else {
                        foreach ($catalogo as $item):
                            echo '<div class="col-xs-3 col-sm-3 col-md-2">
                                    <div class="thumbnail text-center">
                                        <a href="videos/'.$item->url.'><img src="" alt="Portada"></a>
                                        <div class="caption visible-md visible-lg">
                                            <a href="videos/'.$item->url.'" class="btn btn-success btn-sm">Ver!</a>
                                        </div>
                                    </div>
                                </div>';
                        endforeach;
                    }
                ?>
           </div>
        </div>	
        <nav class="text-center">
              <ul class="pagination">
                  <li>
                      <a href="#" aria-label="Previous">
                          <span aria-hidden="true" class="glyphicon glyphicon-menu-left"></span>
                      </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                      <a href="#" aria-label="Next">
                          <span aria-hidden="true" class="glyphicon glyphicon-menu-right"></span>
                      </a>
                  </li>
              </ul>
        </nav>			
    </div>
</div>