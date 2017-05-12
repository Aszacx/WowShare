//Gestión de Noticias
    //Abrir modal Noticias
    $("#nueva-noticia").on("click",function(){
        $("#title-noticias").text("Nueva Noticia");
        $("#btn-noticias").removeClass('btn-warning');
        $("#btn-noticias").addClass('btn-success').val("Guardar");
        $("#form-noticias")[0].reset();
        $("#form-noticias").attr("action", "admin/crearDatos");
        $("#modal-noticias").modal({
            show:true,
            backdrop:"static"
        });
    });

    $("#form-noticias").formValidation({
        framework: "bootstrap",
        container: 'tooltip',
        icon: {
            valid: "glyphicon",
            invalid: "glyphicon",
            validating: "glyphicon glyphicon-refresh"
        },
        fields: {
            tipo_noticia: {
                validators: {
                    notEmpty: {
                        message: "Selecciona una opción."
                    },
                    blank: {}
                }
            },
            titulo: {
                validators: {
                    notEmpty: {
                        message: "Título vacío."
                    },
                    stringLength: {
                        min: 5,
                        max: 30,
                    },
                    blank: {}
                }
            },
            fecha: {
                validators: {
                    notEmpty: {
                        message: "Selecciona una fecha."
                    },
                    blank: {}
                }
            },
            contenido: {
                validators: {
                    notEmpty: {
                        message: "Contenido vacío."
                    },
                    blank: {}
                }
            }
        }
    })
    .on("success.form.fv", function(e) {
        e.preventDefault();

        var $form = $(e.target),
            fv    = $form.data("formValidation");
        var extraData = $form.serializeArray();
        extraData.push( {name:'tabla', value:'noticias'} );

        $.ajax({
            url: $form.attr("action"),
            type: "POST",
            data: $.param(extraData),
            dataType: "JSON"
        }).success( function(response) {
            $("#msj-noticias").removeClass();
            if(response === true && $("#btn-noticias").val() == "Guardar") {
                $("#form-noticias")[0].reset();
                $("#modal-noticias").modal("hide");
                gestionarNoticias("", 1);
                $("#msj-noticias").addClass("alert text-center alert-success alert-accion").html("Noticia registrad<sa.").show(100).delay(3500).hide(100);
            }
            else if(response === true && $("#btn-noticias").val() == "Editar") {
                $("#form-noticias")[0].reset();
                $("#modal-noticias").modal("hide");
                gestionarNoticias("", 1);
                $("#msj-noticias").addClass("alert text-center alert-warning alert-accion").html("Noticia editada.").show(100).delay(3500).hide(100);
            } else {
                $("#msj-noticias").addClass("alert text-center alert-danger alert-accion").html("Error al registrar.").show(100).delay(3500).hide(100);
            }
        });
    });
    
    //Escucha datos en barra de búsqueda Noticias
    $("#buscar-noticias").keyup( function() {
        buscar = $("#buscar-noticias").val();
        gestionarNoticias(buscar, 1);
        $("#filtrar").val(0);
    });
    
    //Editar Noticia
    $("body").on("click","#tabla-noticias a", function(event) {
        event.preventDefault(); 
        id = $(this).attr("href");
        tabla = "noticias";       
        editarRegistro(id, tabla); 
    });
    
    //Estatus de Noticia
    $("body").on("click","#tabla-noticias #estatus-noticia", function(event) {
        id = $(this).attr("value");
        tabla = "noticias";       
        estatusRegistro(id, tabla); 
    });
    
    //Eliminar Noticia
    $("body").on("click","#tabla-noticias #eliminar-noticia", function(event) {
        id = $(this).attr("value");
        tabla = "noticias";
        eliminarRegistro(id, tabla);
    });

    //Paginación
    $("body").on("click", "#paginacion-noticias li a", function(e) {
        e.preventDefault();
        valor = $(this).attr("href");
        buscar = $("#buscar-noticias").val();
        gestionarNoticias(buscar, valor);
    });
    
    //Resetear modal al cerrar
    $(".modal > form").on("hidden.bs.modal", function() {
        $(this).find("form")[0].reset();
        //$(this).find("select").prop("defaultSelected");
    });
    
//Gestión de Noticias
function gestionarNoticias(buscar, pagina){
    $.ajax({
        type: "POST",
        url: "admin/leerDatos",
        cache: false,
        data: {buscar_noticias:buscar, pagina_noticias:pagina, tabla:"noticias"},
        dataType: "JSON"
    }).success( function(datos){
            html = "<table class='table table-bordered'><thead>";
            html += "<tr><th>#ID</th><th>Titulo</th><th>Tipo</th><th>Fecha</th><th>Acciones</th>";
            html += "</thead><tbody>";
            $.each(datos.registros, function (key, item){
                html += "<tr><td>"+item.id+"</td><td>"+item.titulo+"</td><td>"+item.tipo+"</td>";
                html += "<td>"+item.fecha+"</td>";
                html += "<td><button type='button' id='estatus-noticia' title='Estatus' class='btn btn-xs' value="+item.id+">"+item.estatus+"</button>"; 
                html += " <a href="+item.id+" title='Editar' class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></a>"; 
                html += " <button type='button' id='eliminar-noticia' title='Eliminar' class='btn btn-danger btn-xs' value="+item.id+"><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
            });
            html +="</tbody></table>";
            $("#tabla-noticias").html(html);
            total_registros = datos.total_registros;
            cantidad = datos.cantidad;
            paginarRegistros(pagina, total_registros, cantidad);
            $("#paginacion-noticias").html(paginador);
    });
}

//Filtrar Contenido por tipo
function filtroNoticias() {
    var buscar = $("#filtrar").val();
    if (buscar == 0){
        gestionarNoticias("", 1); 
    }
    else{
        //filtrarContenido(filtro);
        $("#buscar-noticias").val("");
        gestionarNoticias(buscar, 1);
    }
}
$("#filtrar").change(filtroNoticias);
filtroNoticias();