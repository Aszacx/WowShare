//Gestión de Usuarios 
    //Abrir modal de Agregar Usuario
     $("body").on("click", "#nuevoUsuario", function(){
        $("#titleUsuario").text("Nuevo Usuario");
        $("#btnUsuario").removeClass('btn-warning');
        $("#btnUsuario").addClass('btn-success').val("Guardar");
        $("#formUsuario")[0].reset();
        $("#formUsuario").attr("action", "admin/agregarUsuario");
        $("#modalUsuario").modal({
            show:true,
            backdrop:"static"
        });
    });

    $("#formUsuario").formValidation({
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
            membresia: {
                validators: {
                    notEmpty: {
                        message: "Selecciona una opción."
                    },
                    blank: {}
                }
            },
            nombre: {
                validators: {
                    notEmpty: {
                        message: "Nombre vacío."
                    },
                    stringLength: {
                        min: 5,
                        max: 30,
                    },
                    blank: {}
                }
            },
            apellido: {
                validators: {
                    notEmpty: {
                        message: "Apellido vacío."
                    },
                    stringLength: {
                        min: 5,
                        max: 30,
                    },
                    blank: {}
                }
            },
            pais: {
                validators: {
                    notEmpty: {
                        message: "Selecciona una opción."
                    },
                    blank: {}
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: "E-mail vacío."
                    },
                    emailAddress: {
                        message: 'E-mail inválido.'
                    },
                    blank: {}
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: "Contraseña vacío."
                    },
                    stringLength: {
                        min: 8,
                        max: 15,
                    },
                    blank: {}
                }
            },
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
            if(response === true && $("#btnUsuario").val() == "Guardar") {
                $("#formUsuario")[0].reset();
                $("#modalUsuario").modal("hide");
                gestionarUsuarios("", 1);
                $("#msjUsuario").addClass("alert-success").html("Usuario registrado.").show(100).delay(3500).hide(100);
            }
            else if(response === true && $("#btnUsuario").val() == "Editar") {
                $("#formUsuario")[0].reset();
                $("#modalUsuario").modal("hide");
                gestionarUsuarios("", 1);
                $("#msjUsuario").addClass("alert-warning").html("Usuario editado.").show(100).delay(3500).hide(100);
            } else {
                $("#msjUsuario").addClass("alert-danger").html("Error al registrar.").show(100).delay(3500).hide(100);
            }
        });
    }); 
    
    //Abrir modal de Gestion de Códigos
    $("#gestionCodigos").on("click",function(){
        $(".modal-title").text("Gestión de Códigos");
        $("#gestionarCodigos").modal({
            show:true,
            backdrop:"static"
        });
    });
    
    //Abrir modal de Generar Códigos
    $("#generarCodigo").on("click",function(){
        $("#formCodigo")[0].reset();
        $(".modal-title").text("Generar Códigos");
        $("#modalCodigo").modal({
            show:true,
            backdrop:"static"
        });
    });
    
    //Escucha datos en barra de búsqueda Usuarios
    $("#buscarUsuario").keyup(function(){
        buscar = $("#buscarUsuario").val();
        listarUsuarios(buscar, 1);
    });
    
    //Refrescar tabla Usuarios
    $("#recargarUsuario").click(function(){
        listarUsuarios("");
        $("#buscarUsuario").val("");
    });
    
    //Editar Usuario
    $("body").on("click", "#tablaUsuarios a", function(event) {
        event.preventDefault(); 
        idUsuario = $(this).attr("href");       
        editarUsuario(idUsuario);
    });
    
    //Estatus de Usuario
    $("body").on("click", "#tablaUsuarios #estatusUsuario", function(event) {
        idUsuario = $(this).attr("value");       
        estatusUsuario(idUsuario); 
    });
    
    //Eliminar Usuario
    $("body").on("click","#tablaUsuarios #eliminarUsuario", function(event) {
        idUsuario = $(this).attr("value");
        eliminarUsuario(idUsuario);
    });

    //Paginación
    $("body").on("click","#paginacion_usuario li a", function(e){
        e.preventDefault();
        valor = $(this).attr("href");
        buscar = $("#buscarUsuario").val();
        gestionarUsuarios(buscar, valor);
    });
    

//Gestión de Usuarios
//Modificando form de alta de ususario
function tipoUsuario() {
    var memb = $("#tipoUsuario").val();
    if(memb == 3){
        $('#tipoMembresia').css("display", "block");
    }else{
        $('#tipoMembresia').css("display", "none");
    }
}
$('#tipoUsuario').change(tipoUsuario);
tipoUsuario();

function gestionarUsuarios(buscar, pagina){
    $.ajax({
        type: "POST",
        url: "admin/gestionarUsuarios",
        cache: false,
        data: {buscar_usuario:buscar, pagina_usuario:pagina},
        dataType: "JSON"
    }).success( function(datos){
            html = "<table class='table table-bordered'><thead>";
            html += "<tr><th>#ID</th><th>Nombre(s)</th><th>Apellido</th><th>E-mail</th><th>País</th><th>Fecha Registro</th><th>Suscripción</th>";
            html += "<th>Caduca</th><th>Acciones</th></tr>";
            html += "</thead><tbody>";
            $.each(datos.usuario, function (key, item){
                html += "<tr><td>"+item.id+"</td><td>"+item.nombre+"</td><td>"+item.apellido+"</td>";
                html += "<td>"+item.email+"</td><td>"+item.pais+"</td><td>"+item.fecha_registro+"</td>";
                html += "<td>"+item.membresia+"</td><td>"+item.caducidad+"</td>";
                html += "<td><button type='button' id='estatusUsuario' title='Estatus' class='btn btn-xs' value="+item.id+">"+item.estatus+"</button>"; 
                html += " <a href="+item.id+" title='Editar' class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></a>"; 
                html += " <button type='button' id='eliminarUsuario' title='Eliminar' class='btn btn-danger btn-xs' value="+item.id+"><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
            });
            html +="</tbody></table>";
            $("#tablaUsuarios").html(html);
            total_registros = datos.total_registros;
            cantidad = datos.cantidad;
            paginarRegistros(pagina, total_registros, cantidad);
            $("#paginacion_usuario").html(paginador);
    });
}

function editarUsuario(id){
    $.ajax({
        type: "POST",
        url: "admin/editarUsuario",
        cache: false,
        data: {idUsuario:id},
        success: function(datos){
            var datos = eval(datos);
            $("#formUsuario")[0].reset();
            $("#titleUsuario").text("Editar Usuario");
            $("#formUsuario").attr("action", "admin/actualizarUsuario");
            $("#btnUsuario").addClass("btn-warning").val("Editar");
            $("#idUsuario").val(idUsuario);
            if(datos[0] == 3){
                //$("#rol").val(datos[0]).text("Cliente");
                $("#tipoUsuario").val(datos[0]).attr("selected", true); 
                $("#tipoMembresia").show();
            }
            else{
                $("#tipoMembresia").hide();
            }
            $("#membresia").val(datos[1]).attr("selected", true); 
            $("#nombre").val(datos[2]);
            $("#apellido").val(datos[3]);
            $("#pais").val(datos[4]).attr("selected", true);
            $("#email").val(datos[5]);
            $("#pass").val(datos[6]);
            $("#modalUsuario").modal({
                show:true,
                backdrop:"static"
            });
        }
    });
}

function eliminarUsuario(id){
    var pregunta = confirm("¿Esta seguro de eliminar este usuario?");
    if(pregunta == true){
        $.ajax({
            type:"POST",
            url: "admin/eliminarUsuario",
            cache: false,
            data:"idUsuario= "+id,
            success: function(){
                listarUsuarios();
                $("#msjUsuario").addClass("mensaje").html("Registro eliminado correctamente.").show(200).delay(2500).hide(200);
            }
        });
    }
}

function estatusUsuario(id){
    var pregunta = confirm("¿Seguro de cambiar estatus de este usuario?");
    if(pregunta == true){
        $.ajax({
            type:"POST",
            url: "admin/estatusUsuario",
            cache: false,
            data:"idUsuario= "+id,
            success: function(){
                listarUsuarios();
                $("#msjUsuario").addClass("mensaje").html("Actualización con exito.").show(200).delay(2500).hide(200);
            }
        });
    }
}

//Generar códigos
function generarCodigos(){
    $.ajax({
        type:"POST",
        url:"admin/generarCodigos",
        cache: false,
        data:$("#formCodigo").serialize(),
        success: function(){
            $("#formCodigo")[0].reset();
            $("#modalCodigo").modal("hide");
            $("#msjAutor").addClass("mensaje").html("Códigos generados correctamente.").show(200).delay(2500).hide(200);
        }
    });
}