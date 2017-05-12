    //Abrir modal de Gestion de Códigos
    $("#gestion-codigos").on("click", function() {
        $("#title-codigos").text("Gestión de Códigos");
        $("#gestionar-codigos").modal({
            show:true,
            backdrop:"static"
        });
    });
    
    //Abrir modal de Generar Códigos
    $("body").on("click", "#generar-codigos", function() {
        $("#title-codigo").text("Generar Códigos");
        $("#btn-codigos").removeClass('btn-warning');
        $("#btn-codigos").addClass('btn-success').val("Guardar");
        $("#form-codigos")[0].reset();
        $("#form-codigos").attr("action", "admin/generarCodigos");
        $("#modal-codigos").modal({
            show:true,
            backdrop:"static"
        });
    });

    $("#form-codigos").formValidation({
        framework: "bootstrap",
        container: 'tooltip',
        icon: {
            valid: "glyphicon",
            invalid: "glyphicon",
            validating: "glyphicon glyphicon-refresh"
        },
        fields: {
            /*cantidad: {
                validators: {
                    notEmpty: {
                        message: "Selecciona una cantidad."
                    },
                    blank: {}
                }
            },*/
        }
    })
    .on("success.form.fv", function(e) {
        e.preventDefault();

        var $form = $(e.target),
            fv = $form.data("formValidation");

        var extraData = $form.serializeArray();
        extraData.push( {name:'tabla', value:'codigos'} );

        $.ajax({
            url: $form.attr("action"),
            type: "POST",
            data: $.param(extraData),
            dataType: "JSON"
        }).success( function(response) {
            $("#msj-codigos").removeClass();
            if(response === true && $("#btn-codigos").val() == "Guardar") {
                $("#form-codigos")[0].reset();
                $("#modal-codigos").modal("hide");
                //gestionarCodigos("", 1);
                $("#msj-codigos").addClass("alert text-center alert-success alert-accion").html("Códigos agregados.").show(100).delay(3500).hide(100);
            } else {
                $("#msj-codigos").addClass("alert text-center alert-danger alert-accion").html("Error al registrar.").show(100).delay(3500).hide(100);
            }
        });
    });

//Escucha datos en barra de búsqueda Usuarios
    $("#buscar-codigos").keyup(function(){
        buscar = $("#buscar-codigos").val();
        gestionarCodigos(buscar, 1);
    });

    //Paginación
    $("body").on("click","#paginacion-codigos li a", function(e){
        e.preventDefault();
        valor = $(this).attr("href");
        buscar = $("#buscar-codigos").val();
        gestionarCodigos(buscar, valor);
    });

    function gestionarCodigos(buscar, pagina){
    $.ajax({
        type: "POST",
        url: "admin/leerDatos",
        cache: false,
        data: {buscar_codigos:buscar, pagina_codigos:pagina, tabla:"codigos"},
        dataType: "JSON"
    }).success( function(datos){
            html = "<table class='table table-bordered'><thead>";
            html += "<tr><th>#ID</th><th>Código</th><th>E-mail</th><th>Estatus</th>";
            html += "</thead><tbody>";
            $.each(datos.registros, function (key, item){
                html += "<tr><td>"+item.id+"</td><td>"+item.codigo+"</td>";
                html += "<td>"+item.email+"</td><td>"+item.estatus+"</td>";
                //html += "<td><button type='button' id='estatus-usuario' title='Estatus' class='btn btn-xs' value="+item.id+"><b>"+item.estatus+"</b></button>"; 
            });
            html +="</tbody></table>";
            $("#tabla-codigos").html(html);
            total_registros = datos.total_registros;
            cantidad = datos.cantidad;
            paginarRegistros(pagina, total_registros, cantidad);
            $("#paginacion-codigos").html(paginador);            
    });
}

