<!--<script type="text/javascript">
    $(document).ready(function() {
        //url = "<?= $detalle->enlace ?>";
        url = "<?= base64_encode($detalle->enlace) ?>";
        $("#book").attr("src", "<?= base_url('assets/pdf/web/viewer.html?file=') ?>"+url);
    });
</script>-->
<div class="container">
    <div class="row">
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
        <div class="col col-xs-12 col-sm-10 col-md-10">
            <div class="text-left">
                <a href="<?= base_url('lecturas') ?>" class="btn btn-success btn-sm">Todos los Libros</a>
            </div>
            <br />
            <div id="reader">
                
            </div>
            <iframe src="<?= base_url('assets/pdf/web/viewer.html?file='.urlencode("$detalle->enlace")) ?>" frameborder="0" width='100%' height="600px"></iframe>                     
       </div>
       <div class="col-xs-0 col-sm-1 col-md-1"></div>
   </div>
</div>