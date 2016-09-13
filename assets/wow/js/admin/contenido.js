//Gestión de Contenido
    //Agregar Contenido
    $("body").on("click", "#nuevo-contenido", function(){
        $("#title-contenido").text("Nuevo Contenido");
        $("#btn-contenido").removeClass('btn-warning');
        $("#btn-contenido").addClass('btn-success').val("Guardar");
        $("#form-contenido")[0].reset();
        $("#form-contenido").attr("action", "admin/agregarContenido");
        $("#modal-contenido").modal({
            show:true,
            backdrop:"static"
        });
    });
    
    //Editar Contenido
    $("body").on("click","#tabla-contenido a",function(event){
        event.preventDefault(); 
        idContenido = $(this).attr("href");       
        editarContenido(idContenido); 
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

        $.ajax({
            url: $form.attr("action"),
            type: "POST",
            data: $form.serialize(),
            dataType: "JSON"
        }).success( function(response) {
            if(response === true && $("#btn-contenido").val() == "Guardar") {
                $("#form-contenido")[0].reset();
                $("#modal-contenido").modal("hide");
                gestionarContenido("", 1);
                $("#msj-contenido").addClass("alert-success").html("Contenido registrado.").show(100).delay(3500).hide(100);
            }
            else if(response === true && $("#btn-contenido").val() == "Editar") {
                $("#form-contenido")[0].reset();
                $("#modal-contenido").modal("hide");
                gestionarContenido("", 1);
                $("#msj-contenido").addClass("alert-warning").html("Contenido editado.").show(100).delay(3500).hide(100);
            } else {
                $("#msj-contenido").addClass("alert-danger").html("Error al registrar.").show(100).delay(3500).hide(100);
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
        idContenido = $(this).attr("value");
        eliminarContenido(idContenido);
    });

    //Estatus de Contenido
    $("body").on("click","#tabla-contenido #estatus-contenido", function(event){
        idContenido = $(this).attr("value");       
        estatusContenido(idContenido); 
    });

    //Paginación
    $("body").on("click","#paginacion-contenido li a", function(e){
        e.preventDefault();
        valor = $(this).attr("href");
        buscar = $("#buscar-contenido").val();
        gestionarContenido(buscar, valor);
    });

//Activar select Portada para Videos
function tipoUsuario() {
    var memb = $("#tipo-contenido").val();
    if(memb == 4){
        $('#portada').show();
    }else{
        $('#portada').hide();
    }
}
$('#tipoUsuario').change(tipoUsuario);
tipoUsuario();

//Gestión de Contenido
function gestionarContenido(buscar, pagina){
    $.ajax({
        type:"POST",
        url:"admin/gestionarContenido",
        cache: false,
        data:{buscar_contenido:buscar, pagina_contenido:pagina},
        dataType: "JSON",
    }).success( function(datos){
            html = "<table class='table table-bordered'><thead>";
            html += "<tr><th>#ID</th><th>Titulo</th><th>Autor</th><th>Categoria</th><th>Año</th>";
            html += "<th>Acciones</th></tr>";
            html += "</thead><tbody>";
            $.each(datos.contenido, function (key, item){
                html += "<tr><td>"+item.id+"</td><td>"+item.titulo+"</td><td>"+item.autor+"</td>";
                html += "<td>"+item.categoria+"</td><td>"+item.anio+"</td>";
                html += "<td><button type='button' id='estatus-contenido' title='Estatus' class='btn btn-xs' value="+item.id+">"+item.estatus+"</button>"; 
                html += " <a href="+item.id+" title='Editar' class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></a>"; 
                html += " <button type='button' id='eliminar-contenido' title='Eliminar' class='btn btn-danger btn-xs' value="+item.id+"><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
            });
            html +="</tbody></table>";
            $("#tablaContenido").html(html);
            total_registros = datos.total_registros;
            cantidad = datos.cantidad;
            paginarRegistros(pagina, total_registros, cantidad);
            $("#paginacion_contenido").html(paginador);
    });
}

function filtrarContenido(filtro){
    $.ajax({
        type:"POST",
        url:"admin/filtrarContenido",
        cache: false,
        data:{filtro:filtro},
        success: function(datos){
            html = "<table class='table table-bordered'><thead>";
            html += "<tr><th>#ID</th><th>Titulo</th><th>Autor</th><th>Categoria</th><th>Año</th>";
            html += "<th>Acciones</th></tr>";
            html += "</thead><tbody>";
            $.each(datos.contenido, function (key, item){
                html += "<tr><td>"+id+"</td><td>"+titulo+"</td><td>"+autor+"</td>";
                html += "<td>"+categoria+"</td><td>"+anio+"</td>";
                html += "<td><button type='button' id='estatus-contenido' title='Estatus' class='btn btn-xs' value="+id+">"+estatus+"</button>"; 
                html += " <a href="+id+" title='Editar' class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></a>"; 
                html += " <button type='button' id='eliminar-contenido' title='Eliminar' class='btn btn-danger btn-xs' value="+id+"><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
            });
            html +="</tbody></table>";
            $("#tabla-contenido").html(html);
        }
    });
}

//Filtrar Contenido por tipo
function filtroContenido() {
    var filtro = $("#filtro").val();
    if (filtro == 0){
        gestionarContenido("", 1); 
    }
    else{
        filtrarContenido(filtro);
        $("#buscar-contenido").val("");
    }
}
$("#filtro").change(filtroContenido);
filtroContenido();

function editarContenido(id){
    $.ajax({
        type:"POST",
        url:"admin/editarContenido",
        cache: false,
        data:{idContenido:id},
        success: function(datos){
            var datos = eval(datos);
            $("#form-contenido")[0].reset();
            $("#title-contenido").text("Editar Contenido");
            $("#form-contenido").attr("action", "admin/actualizarContenido");
            $("#btn-contenido").addClass("btn-warning").val("Editar");
            $("#idContenido").val(idContenido);
            $("#tipo-contenido").val(datos[0]).attr("selected", true);
            if(datos[0] == 4){
                $("#portada").show();
            }
            else{
                $("#portada").hide();
            }
            $("#titulo").val(datos[1]);
            $("#autor").val(datos[2]).attr("selected", true);
            $("#categoria").val(datos[3]).attr("selected", true);
            $("#cover").val(datos[4]).attr("selected", true);
            $("#anio").val(datos[5]);
            $("#enlace").val(datos[6]);
            //$(tinymce.get('descrip').getBody()).html(datos[7]);
            //tinymce.triggerSave();
            $("#modalContenido").modal({
                show:true,
                backdrop:"static"
            });
        }
    });
}

function eliminarContenido(id){
    var pregunta = confirm("¿Esta seguro de eliminar este contenido?");
    if(pregunta == true){
        $.ajax({
            type:"POST",
            url: "admin/eliminarContenido",
            cache: false,
            data:"idContenido= "+id,
            dataType: "JSON"
        }).success( function(response){
            if(response === true) {
                gestionarContenido("", 1);
                $("#msjContenido").addClass("alert-success").html("Registro eliminado.").show(100).delay(3500).hide(100);
            } else {
                $("#msjContenido").addClass("alert-danger").html("Error al eliminar.").show(100).delay(3500).hide(100);
            }
        });
    }
}

function estatusContenido(id){
    var pregunta = confirm("¿Seguro de cambiar estatus de este contenido?");
    if(pregunta == true){
        $.ajax({
            type:"POST",
            url: "admin/estatusContenido",
            cache: false,
            data:"idContenido= "+id,
            success: function(){
                $("#msjContenido").addClass("mensaje").html("Actualización correcta.").show(200).delay(2500).hide(200);
                gestionarContenido("", 1);
            }
        });
    }
}