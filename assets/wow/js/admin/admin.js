$(document).ready(function() {
    //Inicializa las funciones al iniciar el sitio
    
    listarAutor();
    listarCategoria();
    listarPortada();
    //gestionarSlides(1);
    //gestionarSlides(2);
    //gestionarSlides(3);

    //Lista los datos en modal respectivo
    gestionarUsuarios("", 1); 
    gestionarContenido("", 1);
    gestionarAutores("", 1);
    gestionarCategorias("", 1);
    gestionarNoticias("", 1);
    gestionarPortadas(1);

});

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
                        $("#msj-usuario").addClass("alert text-center alert-danger alert-accion").html("Registro eliminado.").show(100).delay(3500).hide(100);
                    break;
                    case "contenido":
                        gestionarContenido("", 1);
                        $("#msj-contenido").addClass("alert text-center alert-danger alert-accion").html("Registro eliminado.").show(100).delay(3500).hide(100);
                    break;
                    case "autor":
                        gestionarAutores("", 1);
                        $("#msj-autor").addClass("alert text-center alert-danger alert-accion").html("Registro eliminado.").show(100).delay(3500).hide(100);
                    break;
                    case "categoria":
                        gestionarCategorias("", 1);
                        $("#msj-categoria").addClass("alert text-center alert-danger alert-accion").html("Registro eliminado.").show(100).delay(3500).hide(100);
                    break;
                }    
            } else {
                switch(tabla){
                    case "usuario":
                        $("#msj-usuario").addClass("alert text-center alert-danger alert-accion").html("Error al eliminar.").show(100).delay(3500).hide(100);
                    break;
                    case "contenido":
                        $("#msj-contenido").addClass("alert text-center alert-danger alert-accion").html("Error al eliminar.").show(100).delay(3500).hide(100);
                    break;
                    case "autor":
                        $("#msj-autor").addClass("alert text-center alert-danger alert-accion").html("Error al eliminar.").show(100).delay(3500).hide(100);
                    break;
                    case "categoria":
                        $("#msj-categoria").addClass("alert text-center alert-danger alert-accion").html("Error al eliminar.").show(100).delay(3500).hide(100);
                    break;
                }
            }     
        });
    }
}

function estatusRegistro(id, tabla){
    var pregunta = confirm("¿Seguro de cambiar estatus de este usuario?");
    if(pregunta == true){
        $.ajax({
            type:"POST",
            url: "admin/estatus",
            cache: false,
            data:{id:id, tabla:tabla},
            dataType: "JSON"
        }).success( function(response){
            if(response === true) {
                switch(tabla){
                    case "usuario":
                        gestionarUsuarios("", 1);
                        $("#msj-usuario").addClass("alert text-center alert-info alert-accion").html("Actualización con exito.").show(200).delay(2500).hide(200);
                    break;
                }    
            } else {
                switch(tabla){
                    case "usuario":
                        $("#msj-usuario").addClass("alert text-center alert-danger alert-accion").html("Error al actualizar.").show(100).delay(3500).hide(100);
                    break;
                }
            }
        });
    }
}