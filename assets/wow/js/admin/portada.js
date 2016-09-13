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
    $("body").on("click", "#nueva-portada", function(){
        $("#title-portada").text("Nueva Portada");
        $("#btn-portada").removeClass('btn-warning');
        $("#btn-portada").addClass('btn-success').val("Guardar");
        $("#form-portada")[0].reset();
        $("#form-portada").attr("action", "admin/agregarPortada");
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

        $.ajax({
            url: $form.attr("action"),
            type: "POST",
            //data: $form.serialize(),
            data: $form.formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON"
        }).success( function(response) {
            $("#msj-portada").removeClass();
            if(response === true && $("#btn-portada").val() == "Guardar") {
                $("#form-portada")[0].reset();
                $("#modal-portada").modal("hide");
                listarPortada();
                gestionarPortadas("", 1);
                $("#msj-portada").addClass("alert text-center alert-success alert-accion").html("Portada registrada.").show(100).delay(3500).hide(100);
            }
            else {
                $("#msj-portada").addClass("alert text-center alert-danger alert-accion").html("Error al registrar.").show(100).delay(3500).hide(100);
            }
        });
    });
    
    //Eliminar Portada
    $("body").on("click","#tabla-portadas #eliminar-portada",function(event){
        idPortada = $(this).attr("value");
        eliminarPortada(idPortada);
    }); 

//Gestión de Portadas
function gestionarPortadas(){
    $.ajax({
        type:"POST",
        url:"admin/listarPortada",
        cache: false,
        success: function(datos){
            html = "<table class='table table-bordered'><thead>";
            html += "<tr><th>Miniatura</th><th>Nombre</th><th>Acciones</th></tr>";
            html += "</thead><tbody>";
            $.each(datos.autor, function (key, item){
                html += "<tr><td><img src=../"+item.miniatura+"></td><td>"+item.nombre+"</td><td>";
                //html += "<td><button type='button' id='estatus-usuario' title='Estatus' class='btn btn-xs' value="+item.idUsuario+">"+item.estatus+"</button>"; 
                html += " <button type='button' id='eliminar-portada' title='Eliminar' class='btn btn-danger btn-md' value="+item.idPortada+"><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
            });
            html +="</tbody></table>";
            $("#tabla-portadas").html(html)
        }
    });
}

function listarPortada(){
    $.ajax({
        type:"POST",
        url:"admin/listarPortada",
        cache: false,
        success: function(datos){
            html = "<label class='input-group-addon'>Portada:</label>";
            html += "<select id='cover' name='cover' class='form-control'>";                  
            html += "<option value=''>Selecciona Portada</option>";
            $.each(datos.portada, function (key, item){
                html += "<option value="+item.id+">"+item.nombre+"</option>";
            });
            html += "</select>";
            html += "<span class='input-group-btn'><button class='btn btn-primary' type='button' id='nueva-portada'><i class='fa fa-plus'></i></button></span>";
            $("#lista-portada").html(html);
        }
    });
}

/*function agregarPortada(){
    var formData = new FormData($("#form-portada")[0]);
    $.ajax({
        url: "admin/agregarPortada",
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(){
            $("#form-portada")[0].reset();
            $("#modal-portada").modal("hide");
            listarPortada();
            gestionarPortadas();
            $("#msj-portada").addClass("mensaje").html("Imágen subida correctamente.").show(200).delay(2500).hide(200);
        }
    });
}*/

function eliminarPortada(id){
    var pregunta = confirm("¿Esta seguro de eliminar portada?");
    if(pregunta == true){
        $.ajax({
            type: "POST",
            url: "admin/eliminarPortada",
            cache: false,
            data: "idPortada= "+id,
            success: function(){
                gestionarPortadas();
                $("#msj-portada").addClass("mensaje").html("Registro eliminado correctamente.").show(200).delay(2500).hide(200);
            },
            error: function(){
                $("#msj-portada").addClass("mensaje").html("No se puede eliminar portada.").show(200).delay(2500).hide(200);
            }
        });
    }
}