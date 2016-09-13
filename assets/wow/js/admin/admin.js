$(document).ready(function() {
    //Inicializa las funciones al iniciar el sitio
    
    listarAutor();
    listarCategoria();
    //listarSlides(1);
    //listarSlides(2);
    //listarSlides(3);
    //listarNoticias();
    //listarPortada();

    //Lista los datos en modal respectivo
    //gestionarUsuarios("", 1); 
    //gestionarContenido("", 1);
    gestionarAutores("", 1);
    gestionarCategorias("", 1);
    //gestionarPortadas("", 1);

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