//Gestión de Noticias
    //Abrir modal Noticias
    $("#nueva-noticia").on("click",function(){
        $("#title-noticia").text("Nueva Noticia");
        $("#btn-noticia").removeClass('btn-warning');
        $("#btn-noticia").addClass('btn-success').val("Guardar");
        $("#form-noticia")[0].reset();
        $("#form-noticia").attr("action", "admin/crearDatos");
        $("#modal-noticia").modal({
            show:true,
            backdrop:"static"
        });
    });
    
    //Escucha datos en barra de búsqueda Noticias
    $("#buscar-noticia").keyup(function(){
        buscar = $("#buscar-noticia").val();
        gestionarNoticias(buscar, 1);
    });
    
    //Editar Noticia
    $("body").on("click","#tabla-noticias a",function(event){
        event.preventDefault(); 
        idNoticias = $(this).attr("href");       
        editarNoticia(idNoticias); 
    });
    
    //Estatus de Noticia
    $("body").on("click","#tabla-noticias #estatus-noticia",function(event){
        idNoticias = $(this).attr("value");       
        estatusNoticia(idNoticias); 
    });
    
    //Eliminar Noticia
    $("body").on("click","#tabla-noticias #eliminar-noticia",function(event){
        idNoticias = $(this).attr("value");
        eliminarNoticia(idNoticias);
    });

    //Paginación
    $("body").on("click", "#paginacion-noticias li a", function(e){
        e.preventDefault();
        valor = $(this).attr("href");
        buscar = $("#buscar-noticia").val();
        gestionarNoticias(buscar, valor);
    });
    
    //Resetear modal al cerrar
    $(".modal > form").on("hidden.bs.modal", function(){
        $(this).find("form")[0].reset();
        //$(this).find("select").prop("defaultSelected");
    });
    
//Gestión de Noticias
function gestionarNoticias(buscar, pagina){
    $.ajax({
        type: "POST",
        url: "admin/leerDatos",
        cache: false,
        data: {buscar_noticia: buscar, pagina_noticia: pagina, tabla: "noticia"},
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

function agregarNoticia(){
    $.ajax({
        type:"POST",
        url: "admin/agregarNoticia",
        cache: false,
        data:$("#formNoticia").serialize(),
        success: function(){
            $(".modal-title").text("Agregar Noticia");
            $("#form-noticia")[0].reset();
            $("#modal-noticia").modal("hide");
            gestionarNoticias(buscar, 1);
            $("#msj-noticia").addClass("mensaje").html("Registro completado correctamente.").show(200).delay(2500).hide(200);
        },
        error: function(){
            $("#msj-noticia").addClass("mensaje").html("Registro fallido.").show(200).delay(2500).hide(200);

        }
    });
}

function editarNoticia(id){
    $.ajax({
        type: "POST",
        url: "admin/editarNoticia",
        cache: false,
        data: {idNoticias:id},
        success: function(datos){
            var datos = eval(datos);
            $("#formNoticia")[0].reset();
            $(".modal-title").text("Editar Noticia");
            $("#date").show();
            $("#idNoticias").val(idNoticias);
            $("#tipo-noticia").val(datos[0]).attr("selected", true);
            $("#titulo-noticia").val(datos[1]);
            $("#fecha-noticia").removeAttr("disabled").val(datos[2]);
            $(tinymce.get('noticias').getBody()).html(datos[3]);
            tinymce.triggerSave();
            $("#modal-noticia").modal({
                show:true,
                backdrop:"static"
            });
        }
    });
}

function actualizarNoticia(){
    $.ajax({
        type:"POST",
        url: "admin/actualizarNoticia",
        cache: false,
        data: $("#form-noticia").serialize(),
        success: function(){
            $("#modal-noticia").modal("hide");
            $("#form-noticia")[0].reset();
            gestionarNoticias(buscar, 1);
            $("#msj-noticia").addClass("mensaje").html("Se actualizo registro.").show(200).delay(2500).hide(200);
        },
        error: function(){
            alert("Hubo un error");
        }
    });
}