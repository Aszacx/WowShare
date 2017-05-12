//Gestión de Contenido
    //Agregar Contenido
    $("body").on("click", "#nuevo-contenido", function(){
        $("#title-contenido").text("Nuevo Contenido");
        $("#btn-contenido").removeClass('btn-warning');
        $("#btn-contenido").addClass('btn-success').val("Guardar");
        $("#form-contenido")[0].reset();
        $("#form-contenido").attr("action", "admin/crearDatos");
        $("#modal-contenido").modal({
            show:true,
            backdrop:"static"
        });
    });
    
    //Editar Contenido
    $("body").on("click","#tabla-contenido a",function(event){
        event.preventDefault(); 
        id = $(this).attr("href");
        tabla = "contenido";       
        editarRegistro(id, tabla); 
    });

    $("#form-contenido").formValidation({
        framework: "bootstrap",
        container: 'tooltip',
        icon: {
            valid: "glyphicon",
            invalid: "glyphicon",
            validating: "glyphicon glyphicon-refresh"
        },
        fields: {
            tipo: {
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
            autor: {
                validators: {
                    notEmpty: {
                        message: "Selecciona una opción."
                    },
                    blank: {}
                }
            },
            categoria: {
                validators: {
                    notEmpty: {
                        message: "Selecciona una opción."
                    },
                    blank: {}
                }
            },
            cover: {
                validators: {
                    notEmpty: {
                        message: "Selecciona una opción."
                    },
                    blank: {}
                }
            },
            anio: {
                validators: {
                    notEmpty: {
                        message: "Año vacío."
                    },
                    regexp: {
                        regexp: /^[0-9\s\-()+\.]+$/
                    },
                    blank: {}
                }
            },
            enlace: {
                validators: {
                    notEmpty: {
                        message: "Enlace vacío."
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
        extraData.push( {name:'tabla', value:'contenido'} );

        $.ajax({
            url: $form.attr("action"),
            type: "POST",
            data: $.param(extraData),
            dataType: "JSON"
        }).success( function(response) {
            $("#msj-contenido").removeClass();
            if(response === true && $("#btn-contenido").val() == "Guardar") {
                $("#form-contenido")[0].reset();
                $("#modal-contenido").modal("hide");
                gestionarContenido("", 1);
                $("#msj-contenido").addClass("alert text-center alert-success alert-accion").html("Contenido registrado.").show(100).delay(3500).hide(100);
            }
            else if(response === true && $("#btn-contenido").val() == "Editar") {
                $("#form-contenido")[0].reset();
                $("#modal-contenido").modal("hide");
                gestionarContenido("", 1);
                $("#msj-contenido").addClass("alert text-center alert-warning alert-accion").html("Contenido editado.").show(100).delay(3500).hide(100);
            } else {
                $("#msj-contenido").addClass("alert text-center alert-danger alert-accion").html("Error al registrar.").show(100).delay(3500).hide(100);
            }
        });
    });

    //Escucha datos en barra de búsqueda
    $("#buscar-contenido").keyup(function(){
        buscar = $("#buscar-contenido").val();
        gestionarContenido(buscar, 1);
        $("#filtro").val(0);
    });

    //Eliminar Contenido
    $("body").on("click","#tabla-contenido #eliminar-contenido",function(event){
        id = $(this).attr("value");
        tabla = "contenido";
        eliminarRegistro(id, tabla);
    });

    //Estatus de Contenido
    $("body").on("click","#tabla-contenido #estatus-contenido", function(event){
        id = $(this).attr("value");
        tabla = "contenido";      
        estatusRegistro(id, tabla); 
    });

    //Paginación
    $("body").on("click","#paginacion-contenido li a", function(e){
        e.preventDefault();
        valor = $(this).attr("href");
        buscar = $("#buscar-contenido").val();
        gestionarContenido(buscar, valor);
    });

//Activar select Portada para Videos
function tipoContenido() {
    var tipo = $("#tipo-contenido").val();
    if(tipo == 4){
        $('#portada').show();
    }else{
        $('#portada').hide();
    }
}
$('#tipo-contenido').change(tipoContenido);
tipoContenido();

//Gestión de Contenido
function gestionarContenido(buscar, pagina){
    $.ajax({
        type:"POST",
        url:"admin/leerDatos",
        cache: false,
        data:{buscar_contenido:buscar, pagina_contenido:pagina, tabla: "contenido"},
        dataType: "JSON",
    }).success( function(datos){
            html = "<table class='table table-bordered'><thead>";
            html += "<tr><th>#ID</th><th>Titulo</th><th>Autor</th><th>Categoria</th><th>Año</th>";
            html += "<th>Acciones</th></tr>";
            html += "</thead><tbody>";
            $.each(datos.registros, function (key, item){
                html += "<tr><td>"+item.id+"</td><td>"+item.titulo+"</td><td>"+item.autor+"</td>";
                html += "<td>"+item.categoria+"</td><td>"+item.anio+"</td>";
                html += "<td><button type='button' id='estatus-contenido' title='Estatus' class='btn btn-xs' value="+item.id+">"+item.estatus+"</button>"; 
                html += " <a href="+item.id+" title='Editar' class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></a>"; 
                html += " <button type='button' id='eliminar-contenido' title='Eliminar' class='btn btn-danger btn-xs' value="+item.id+"><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
            });
            html +="</tbody></table>";
            $("#tabla-contenido").html(html);
            total_registros = datos.total_registros;
            cantidad = datos.cantidad;
            paginarRegistros(pagina, total_registros, cantidad);
            $("#paginacion-contenido").html(paginador);
    });
}

//Filtrar Contenido por tipo
function filtroContenido() {
    var buscar = $("#filtro").val();
    if (buscar == 0){
        gestionarContenido("", 1); 
    }
    else{
        //filtrarContenido(filtro);
        $("#buscar-contenido").val("");
        gestionarContenido(buscar, 1);
    }
}
$("#filtro").change(filtroContenido);
filtroContenido();