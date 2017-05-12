//Gestión de Portadas
    //Abrir modal de Gestionar Portadas
    $("#gestion-portada").on("click",function(){
        $("#title-portadas").text("Gestión de Portadas");
        $("#gestionar-portadas").modal({
            show:true,
            backdrop:"static"
        });
    });

    //Abrir modal de Agregar Portada
    $("body").on("click", "#nuevo-portada", function(){
        $("#title-portada").text("Nueva Portada");
        $("#btn-portada").removeClass('btn-warning');
        $("#btn-portada").addClass('btn-success').val("Guardar");
        $("#form-portada")[0].reset();
        $("#form-portada").attr("action", "admin/createCover");
        $("#modal-portada").modal({
            show:true,
            backdrop:"static"
        });
    });

    $("#form-portada").formValidation({
        framework: "bootstrap",
        container: 'tooltip',
        icon: {
            valid: "glyphicon",
            invalid: "glyphicon",
            validating: "glyphicon glyphicon-refresh"
        },
        fields: {
            portada: {
                validators: {
                    notEmpty: {
                        message: 'Selecciona una imágen.'
                    },
                    file: {
                        extension: 'png',
                        //type: 'application/pdf',
                        //maxSize: 2 * 1024 * 1024,
                        message: 'El archivo adjunto no es png'
                    }
                }
            }
        }
    })
    .on("success.form.fv", function(e) {
        e.preventDefault();

        var $form = $(e.target),
            fv    = $form.data("formValidation");
        var formData = new FormData($("#form-portada")[0]);        

        $.ajax({
            url: $form.attr("action"),
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON"
        }).success( function(response) {
            $("#msj-portada").removeClass();
            if(response === true && $("#btn-portada").val() == "Guardar") {
                $("#form-portada")[0].reset();
                $("#modal-portada").modal("hide");
                listarDatos("portada");
                gestionarPortadas("", 1);
                $("#msj-portada").addClass("alert text-center alert-success alert-accion").html("Portada registrada.").show(100).delay(3500).hide(100);
            }
            else {
                $("#msj-portada").addClass("alert text-center alert-danger alert-accion").html("Error al registrar.").show(100).delay(3500).hide(100);
            }
        });
    });

    //Buscar Portada
    $("#buscar-portada").keyup(function(){
        buscar = $("#buscar-portada").val();
        gestionarPortadas(buscar, 1);
    });
    
    //Eliminar Portada
    $("body").on("click","#tabla-portadas #eliminar-portada",function(event){
        id = $(this).attr("value");
        tabla = "portada";
        eliminarRegistro(id, tabla);
    });

    //Paginación
    $("body").on("click", "#paginacion-portadas li a", function(e){
        e.preventDefault();
        valor = $(this).attr("href");
        buscar = $("#buscar-portada").val();
        gestionarPortadas(buscar, valor);
    }); 

//Gestión de Portadas
function gestionarPortadas(buscar, pagina){
    $.ajax({
        type:"POST",
        url:"admin/leerDatos",
        cache: false,
        data: {buscar_portada: buscar, pagina_portada: pagina, tabla: 'portada'},
        dataType: "JSON"
    }).success( function(datos){
            html = "<table class='table table-bordered'><thead>";
            html += "<tr><th>Miniatura</th><th>Nombre</th><th>Acciones</th></tr>";
            html += "</thead><tbody>";
            $.each(datos.registros, function (key, item){
                html += "<tr><td><img src=../"+item.miniatura+"></td><td>"+item.nombre+"</td><td>";
                //html += "<td><button type='button' id='estatus-usuario' title='Estatus' class='btn btn-xs' value="+item.idUsuario+">"+item.estatus+"</button>"; 
                html += " <button type='button' id='eliminar-portada' title='Eliminar' class='btn btn-danger btn-md' value="+item.id+"><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
            });
            html +="</tbody></table>";
            $("#tabla-portadas").html(html);
            total_registros = datos.total_registros;
            cantidad = datos.cantidad;
            paginarRegistros(pagina, total_registros, cantidad);
            $("#paginacion-portadas").html(paginador);
    });
}