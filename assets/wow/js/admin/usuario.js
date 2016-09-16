//Gestión de Usuarios 
    //Abrir modal de Agregar Usuario
     $("body").on("click", "#nuevo-usuario", function(){
        $("#title-usuario").text("Nuevo Usuario");
        $("#btnUsuario").removeClass('btn-warning');
        $("#btn-usuario").addClass('btn-success').val("Guardar");
        $("#form-usuario")[0].reset();
        $("#form-usuario").attr("action", "admin/crearDatos");
        $("#modal-usuario").modal({
            show:true,
            backdrop:"static"
        });
    });

    $("#form-usuario").formValidation({
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

        var extraData = $form.serializeArray();
        extraData.push( {name:'tabla', value:'usuario'} );
        //console.log(param);
        $.ajax({
            url: $form.attr("action"),
            type: "POST",
            data: $.param(extraData),
            dataType: "JSON"
        }).success( function(response) {
            if(response === true && $("#btn-usuario").val() == "Guardar") {
                $("#form-usuario")[0].reset();
                $("#modal-usuario").modal("hide");
                gestionarUsuarios("", 1);
                $("#msj-usuario").addClass("alert-success").html("Usuario registrado.").show(100).delay(3500).hide(100);
            }
            else if(response === true && $("#btn-usuario").val() == "Editar") {
                $("#form-usuario")[0].reset();
                $("#modal-usuario").modal("hide");
                gestionarUsuarios("", 1);
                $("#msj-usuario").addClass("alert-warning").html("Usuario editado.").show(100).delay(3500).hide(100);
            } else {
                $("#msj-usuario").addClass("alert-danger").html("Error al registrar.").show(100).delay(3500).hide(100);
            }
        });
    }); 
    
    //Abrir modal de Gestion de Códigos
    $("#gestion-codigos").on("click",function(){
        $(".modal-title").text("Gestión de Códigos");
        $("#gestionar-codigos").modal({
            show:true,
            backdrop:"static"
        });
    });
    
    //Abrir modal de Generar Códigos
    $("#generar-codigo").on("click",function(){
        $("#form-codigo")[0].reset();
        $("$title-codigo").text("Generar Códigos");
        $("#modal-codigo").modal({
            show:true,
            backdrop:"static"
        });
    });
    
    //Escucha datos en barra de búsqueda Usuarios
    $("#buscar-usuario").keyup(function(){
        buscar = $("#buscar-usuario").val();
        gestionarUsuarios(buscar, 1);
    });
    
    //Refrescar tabla Usuarios
    $("#recargar-usuario").click(function(){
        listarUsuarios("");
        $("#buscar-usuario").val("");
    });
    
    //Editar Usuario
    $("body").on("click", "#tabla-usuarios a", function(event) {
        event.preventDefault(); 
        id = $(this).attr("href");
        tabla = "usuario";       
        editarUsuario(id, tabla);
    });
    
    //Estatus de Usuario
    $("body").on("click", "#tabla-usuarios #estatus-usuario", function(event) {
        id = $(this).attr("value");       
        tabla = "usuario";
        estatusRegistro(id, tabla); 
    });

    
    //Eliminar Usuario
    $("body").on("click","#tabla-usuarios #eliminar-usuario", function(event) {
        id = $(this).attr("value");
        tabla = "usuario";
        eliminarRegistro(id, tabla);
    });

    //Paginación
    $("body").on("click","#paginacion-usuario li a", function(e){
        e.preventDefault();
        valor = $(this).attr("href");
        buscar = $("#buscar-usuario").val();
        gestionarUsuarios(buscar, valor);
    });
    

//Gestión de Usuarios
//Modificando form de alta de ususario
function tipoUsuario() {
    var tipo = $("#tipo-usuario").val();
    if(tipo == 3){
        $('#tipo-membresia').show();
    }else{
        $('#tipo-membresia').hide();
    }
}
$('#tipo-usuario').change(tipoUsuario);
tipoUsuario();

function gestionarUsuarios(buscar, pagina){
    $.ajax({
        type: "POST",
        url: "admin/leerDatos",
        cache: false,
        data: {buscar_usuario:buscar, pagina_usuario:pagina, tabla: "usuario"},
        dataType: "JSON"
    }).success( function(datos){
            html = "<table class='table table-bordered'><thead>";
            html += "<tr><th>#ID</th><th>Nombre(s)</th><th>Apellido</th><th>E-mail</th><th>País</th><th>Fecha Registro</th><th>Suscripción</th>";
            html += "<th>Caduca</th><th>Acciones</th></tr>";
            html += "</thead><tbody>";
            $.each(datos.registros, function (key, item){
                html += "<tr><td>"+item.id+"</td><td>"+item.nombre+"</td><td>"+item.apellido+"</td>";
                html += "<td>"+item.email+"</td><td>"+item.pais+"</td><td>"+item.fecha_registro+"</td>";
                html += "<td>"+item.membresia+"</td><td>"+item.caducidad+"</td>";
                html += "<td><button type='button' id='estatus-usuario' title='Estatus' class='btn btn-xs' value="+item.id+"><b>"+item.estatus+"</b></button>"; 
                html += " <a href="+item.id+" title='Editar' class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></a>"; 
                html += " <button type='button' id='eliminar-usuario' title='Eliminar' class='btn btn-danger btn-xs' value="+item.id+"><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
            });
            html +="</tbody></table>";
            $("#tabla-usuarios").html(html);
            total_registros = datos.total_registros;
            cantidad = datos.cantidad;
            paginarRegistros(pagina, total_registros, cantidad);
            $("#paginacion-usuario").html(paginador);
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
            $("#form-usuario")[0].reset();
            $("#title-usuario").text("Editar Usuario");
            $("#form-usuario").attr("action", "admin/actualizarUsuario");
            $("#btn-usuario").addClass("btn-warning").val("Editar");
            $("#idUsuario").val(idUsuario);
            if(datos[0] == 3){
                //$("#rol").val(datos[0]).text("Cliente");
                $("#tipo-usuario").val(datos[0]).attr("selected", true); 
                $("#tipo-membresia").show();
            }
            else{
                $("#tipo-membresia").hide();
            }
            $("#membresia").val(datos[1]).attr("selected", true); 
            $("#nombre").val(datos[2]);
            $("#apellido").val(datos[3]);
            $("#pais").val(datos[4]).attr("selected", true);
            $("#email").val(datos[5]);
            $("#pass").val(datos[6]);
            $("#modal-usuario").modal({
                show:true,
                backdrop:"static"
            });
        }
    });
}

//Generar códigos
function generarCodigos(){
    $.ajax({
        type:"POST",
        url:"admin/generarCodigos",
        cache: false,
        data:$("#formCodigo").serialize(),
        success: function(){
            $("#form-codigo")[0].reset();
            $("#modal-codigo").modal("hide");
            $("#msj-codigo").addClass("mensaje").html("Códigos generados correctamente.").show(200).delay(2500).hide(200);
        }
    });
}