//Gestión de Categorias
    //Abrir modal de Gestionar Categorías
    $("#gestion-categoria").on("click",function(){
        $("#title-categorias").text("Gestión de Categorias");
        $("#gestionar-categorias").modal({
            show:true,
            backdrop:"static"
        });
    });

    //Agregar Categoria
    $("body").on("click", "#nueva-categoria", function(){
        $("#title-categoria").text("Nueva Categoria");
        $("#btn-categoria").removeClass('btn-warning');
        $("#btn-categoria").addClass('btn-success').val("Guardar");
        $("#form-categoria")[0].reset();
        $("#form-categoria").attr("action", "admin/agregarCategoria");
        $("#modal-categoria").modal({
            show:true,
            backdrop:"static"
        });
    });
    
    
    //Editar Categoria
    $("body").on("click","#tabla-categorias a",function(event) {
        event.preventDefault(); 
        idCategoria = $(this).attr("href");       
        editarCategoria(idCategoria); 
    });

    $("#form-categoria").formValidation({
        framework: "bootstrap",
        container: 'tooltip',
        icon: {
            valid: "glyphicon",
            invalid: "glyphicon",
            validating: "glyphicon glyphicon-refresh"
        },
        fields: {
            categoria: {
                validators: {
                    notEmpty: {
                        message: "Nombre de categoría vacío."
                    },
                    stringLength: {
                        min: 5,
                        max: 30,
                        //message: ""
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
            $("#msj-categoria").removeClass();
            if(response === true && $("#btn-categoria").val() == "Guardar") {
                $("#form-categoria")[0].reset();
                $("#modal-categoria").modal("hide");
                listarCategoria();
                gestionarCategorias("", 1);
                $("#msj-categoria").addClass("alert text-center alert-success alert-accion").html("Categoria registrada.").show(100).delay(3500).hide(100);
            }
            else if(response === true && $("#btn-categoria").val() == "Editar") {
                $("#form-categoria")[0].reset();
                $("#modal-categoria").modal("hide");
                listarCategoria();
                gestionarCategorias("", 1);
                $("#msj-categoria").addClass("alert text-center alert-warning alert-accion").html("Categoria editada.").show(100).delay(3500).hide(100);
            } else {
                $("#msj-categoria").addClass("alert text-center alert-danger alert-accion").html("Error al registrar.").show(100).delay(3500).hide(100);
            }
        });
    });
    
    //Buscar Categoría
    $("#buscar-categoria").keyup(function(){
        buscar = $("#buscar-categoria").val();
        gestionarCategorias(buscar, 1);
    });

    //Eliminar Categoría
    $("body").on("click","#tabla-categorias #eliminar-categoria",function(event){
        $("#msj-categoria").removeClass();
        idCategoria = $(this).attr("value");
        eliminarCategoria(idCategoria);
    });

    //Paginación
    $("body").on("click", "#paginacion-categorias li a", function(e){
        e.preventDefault();
        valor = $(this).attr("href");
        buscar = $("#buscar-categoria").val();
        gestionarCategorias(buscar, valor);
    });

//Gestión de Categorías
//Modificando form de alta de contenido
function tipoContenido() {
    var tCont = $("#tipo-contenido").val();
    if(tCont == 4){
        $('#portada').css("display", "block");
    }else{
        $('#portada').css("display", "none");
    }
}
$('#tipo-contenido').change(tipoContenido);
tipoContenido();

function gestionarCategorias(buscar, pagina){
    $.ajax({
        type: "POST",
        url: "admin/gestionarCategorias",
        cache: false,
        data: {buscar_categoria: buscar, pagina_categoria: pagina},
        dataType: "JSON", 
    }).success( function(datos){
        html = "<table class='table table-bordered'><thead>";
        html += "<tr><th>Categoría</th><th>Acciones</th></tr>";
        html += "</thead><tbody>";
        $.each(datos.categoria, function (key, item){
            html += "<tr><td>"+item.categoria+"</td><td>";
            html += " <a href="+item.id+" title='Editar' class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-pencil'></i></a>"; 
            html += " <button type='button' id='eliminar-categoria' title='Eliminar' class='btn btn-danger btn-xs' value="+item.id+"><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
        });
        html +="</tbody></table>";
        $("#tabla-categorias").html(html);
        total_registros = datos.total_registros;
        cantidad = datos.cantidad;
        paginarRegistros(pagina, total_registros, cantidad);
        $("#paginacion-categorias").html(paginador);
    });
}

function listarCategoria(){
    $.ajax({
        type:"POST",
        url:"admin/listarCategoria",
        cache: false,
        dataType: "JSON",
        success: function(datos){
            html = "<label class='input-group-addon'>Categoria:</label>";
            html += "<select id='categoria' name='categoria' class='form-control'>";                    
            html += "<option value=''>Selecciona Categoria</option>";
            $.each(datos, function (key, item){
                html += "<option value="+item.id+">"+item.categoria+"</option>";
            });
            html += "</select>";
            html += "<span class='input-group-btn'><button class='btn btn-primary' type='button' id='nueva-categoria'><i class='fa fa-plus'></i></button></span>";
            $("#lista-categoria").html(html);
        }
    });
}

function editarCategoria(id){
    $.ajax({
        type: "POST",
        url: "admin/editarCategoria",
        cache: false,
        data: {idCategoria:id},
        success: function(datos){
            var datos = eval(datos);
            $("#form-categoria")[0].reset();
            $("#form-categoria").attr("action", "admin/actualizarCategoria");
            $("#title-categoria").text("Editar Categoria");
            $("#btn-categoria").addClass("btn-warning").val("Editar");
            $("#idCategoria").val(idCategoria);
            $("#edit-categoria").val(datos[0]);
            $("#modal-categoria").modal({
                show:true,
                backdrop:"static"
            });
        }
    });
}

function eliminarCategoria(id){
    var pregunta = confirm("¿Esta seguro de eliminar esta categoría?");
    if(pregunta == true){
        $.ajax({
            type:"POST",
            url: "admin/eliminarCategoria",
            cache: false,
            data: "idCategoria= "+id,
            dataType: "JSON",
            }).success( function(response) {
            if(response === true) {
                listarCategoria();
                gestionarCategorias("", 1);
                $("#msj-categoria").addClass("alert text-center alert-success alert-accion").html("Registro eliminado.").show(100).delay(3500).hide(100);
            } else {
                $("#msj-categoria").addClass("alert text-center alert-danger alert-accion").html("Error al eliminar.").show(100).delay(3500).hide(100);
            }
        });
    }
}