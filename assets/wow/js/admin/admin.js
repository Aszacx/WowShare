$(document).ready(function() {
    //Inicializa las funciones al iniciar el sitio
    
    listarDatos("autor");
    listarDatos("categoria");
    listarDatos("portada");

    //Lista los datos en modal respectivo
    gestionarUsuarios("", 1); 
    gestionarContenido("", 1);
    gestionarAutores("", 1);
    gestionarCategorias("", 1);
    gestionarNoticias("", 1);
    gestionarPortadas("", 1);
    gestionarSlides(1, 1);
    gestionarSlides(2, 1);
    gestionarSlides(3, 1);
});

function primeraMayus(string){
    cadena = string.toLowerCase();
    return cadena.charAt(0).toUpperCase() + cadena.slice(1);
}

function paginarRegistros(pagina, total_registros, cantidad) {
    link_select = Number(pagina);
    links = Math.ceil(total_registros/cantidad);
    paginador = "<ul class='pagination'>";
    //Paginación hacia atrás
    if(link_select > 1) {
        paginador += "<li><a href='1'>&laquo;</a></li>";
        paginador += "<li><a href='"+(link_select - 1)+"'>&lsaquo;</a></li>";
    } else {
        paginador += "<li class='disabled'><a href='#'>&laquo;</a></li>";
        paginador += "<li class='disabled'><a href='#'>&lsaquo;</a></li>";
    }

    //Cantidad de links hacia atrás y adelante
    cant = 1;
    pag_inicio = (link_select > cant) ? (link_select - cant) : 1;
    if(links > cant) {
        pag_restantes = links - link_select;
        pag_fin = (pag_restantes > cant) ? (link_select + cant) : links;
    } else {
        pag_fin = links;
    }

    for (var i = pag_inicio; i <= pag_fin; i++) {
        if(i == link_select)
            paginador += "<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
        else
            paginador += "<li><a href='"+i+"'>"+i+"</a></li>";
    }

    //Paginación hacia adelante
    if(link_select < links) {
        paginador += "<li><a href='"+(link_select + 1)+"'>&rsaquo;</a></li>";
        paginador += "<li><a href='"+(links)+"'>&raquo;</a></li>";
    } else {
        paginador += "<li class='disabled'><a href='#'>&rsaquo;</a></li>";
        paginador += "<li class='disabled'><a href='#'>&raquo;</a></li>";
    }

    paginador += "</ul>";
    return paginador;
}

function listarDatos(tabla){
    $.ajax({
        type:"POST",
        url:"admin/listarDatos",
        cache: false,
        data: {tabla: tabla},
        dataType: "JSON",
    }).success( function(datos){
            var nombre = primeraMayus(tabla);
            html = "<label class='input-group-addon'>"+nombre+":</label>";
            html += "<select id='"+tabla+"' name='"+tabla+"' class='form-control'>";                  
            html += "<option value=''>Selecciona "+nombre+"</option>";
            $.each(datos, function (key, item) {
                switch(tabla){
                    case "autor":
                        html += "<option value="+item.id+">"+item.autor+"</option>";
                    break;
                    case "categoria":
                        html += "<option value="+item.id+">"+item.categoria+"</option>";
                    break;
                    case "portada":
                        html += "<option value="+item.id+">"+item.nombre+"</option>";
                    break;
                }
            });
            html += "</select>";
            html += "<span class='input-group-btn'><button class='btn btn-primary' type='button' id='nuevo-"+tabla+"'><i class='fa fa-plus'></i></button></span>";
            $("#lista-"+tabla+"").html(html);
    });
}

function eliminarRegistro(id, tabla){
    var pregunta = confirm("¿Esta seguro de eliminar este usuario?");
    if(pregunta == true){
        $.ajax({
            type: "POST",
            url: "admin/eliminarDatos",
            cache: false,
            data:{id: id, tabla: tabla},
            dataType: "JSON"
        }).success( function(response){
            if(response === true) {
                switch(tabla){
                    case "usuario":
                        gestionarUsuarios("", 1);
                    break;
                    case "contenido":
                        gestionarContenido("", 1);
                    break;
                    case "autor":
                        gestionarAutores("", 1);
                    break;
                    case "categoria":
                        gestionarCategorias("", 1);
                    break;
                    case "portada":
                        gestionarPortadas("", 1);
                    break;
                    case "slide":
                        gestionarSlides(1, 1);
                        gestionarSlides(2, 1);
                        gestionarSlides(3, 1);
                    break;
                }    
                $("#msj-"+tabla+"").addClass("alert text-center alert-danger alert-accion").html("Registro eliminado.").show(100).delay(3500).hide(100);
            } else {
                $("#msj-"+tabla+"").addClass("alert text-center alert-danger alert-accion").html("Error al eliminar.").show(100).delay(3500).hide(100);
            }     
        });
    }
}

function estatusRegistro(id, tabla){
    var pregunta = confirm("¿Seguro de cambiar estatus de este usuario?");
    if(pregunta == true){
        $.ajax({
            type:"POST",
            url: "admin/estatusRegistro",
            cache: false,
            data:{id:id, tabla:tabla},
            dataType: "JSON"
        }).success( function(response){
            if(response === true) {
                switch(tabla){
                    case "usuario":
                        gestionarUsuarios("", 1);
                    break;
                    case "contenido":
                        gestionarContenido("", 1);
                    break;
                    $("#msj-"+tabla+"").addClass("alert text-center alert-info alert-accion").html("Actualización con exito.").show(200).delay(2500).hide(200);
                }    
            } else {
                $("#msj-"+tabla+"").addClass("alert text-center alert-danger alert-accion").html("Error al actualizar.").show(100).delay(3500).hide(100);
            }
        });
    }
}