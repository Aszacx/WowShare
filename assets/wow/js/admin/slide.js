//Gestión de Slides
    //Eliminar Slide
    $("body").on("click",".slides #eliminarSlide",function(event){
        idSlides = $(this).attr("value");
        eliminarSlide(idSlides);
    });
    
    //Estatus de Slide
    $("body").on("click",".slides #estatusSlide",function(event){
        idSlides = $(this).attr("value");       
        estatusSlide(idSlides); 
    });
    
//Gestión de Slides
function listarSlides(tipo){
    $.ajax({
        type:"POST",
        url:"admin/listarSlides",
        cache: false,
        data: "tipo="+tipo,
        success: function(datos){
            var slides = eval(datos);
            html = "<table class='table table-bordered'><thead>";
            html += "<tr><th>Nombre</th><th>Slide</th><th>Acciones</th></tr>";
            html += "</thead><tbody>";
            for (var i = 0; i < slides.length; i++) {
                html += "<td>"+slides[i]["nombre"]+"</td><td><img src=../"+slides[i]["miniatura"]+"></td>";
                html += "<td><button type='button' id='estatusSlide' title='Estatus' class='btn btn-xs' value="+slides[i]["idSlides"]+">"+slides[i]["estatus"]+"</button>"; 
                html += " <button type='button' id='eliminarSlide' title='Eliminar' class='btn btn-danger btn-xs' value="+slides[i]["idSlides"]+"><i class='glyphicon glyphicon-trash'></i></button></td></tr>";
            };
            html +="</tbody></table>";
            switch(tipo) {
                case 1:
                    $("#tablaSlides").html(html);
                    break;
                case 2:
                    $("#publicidad300x300").html(html);
                    break;
                case 3:
                    $("#publicidad1000x150").html(html);
            }
        }
    });
}

function agregarSlide(){
    var formData = new FormData($("#formSlide")[0]);
    //var seleccion = $("#slides").val();
    //formData.append(seleccion);
    $.ajax({
        type: "POST",
        url: "admin/guardarSlide",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(){
            $("#formSlide")[0].reset();
            listarSlides(1);
            listarSlides(2);
            listarSlides(3);
            $(".msjSlide").addClass("mensaje").html("Imágen subida correctamente.").show(200).delay(2500).hide(200);
        },
        error: function(){
            $(".msjSlide").addClass("mensaje").html("Error al subir imágen.").show(200).delay(2500).hide(200);
        }
    });
}

function eliminarSlide(id){
    var pregunta = confirm("¿Esta seguro de eliminar?");
    if(pregunta == true){
        $.ajax({
            type:"POST",
            url: "admin/eliminarSlide",
            cache: false,
            data: "idSlides= "+id,
            success: function(){
                listarSlides(1);
                listarSlides(2);
                listarSlides(3);
                $(".msjSlide").addClass("mensaje").html("Slide eliminado correctamente.").show(200).delay(2500).hide(200);
            },
            error: function(){
                $(".msjSlide").addClass("mensaje").html("No se puede eliminar slide.").show(200).delay(2500).hide(200);
            }
        });
    }
}

function estatusSlide(id){
    var pregunta = confirm("¿Seguro de cambiar estatus de esta imágen?");
    if(pregunta == true){
        $.ajax({
            type: "POST",
            url: "admin/estatusSlide",
            cache: false,
            data: "idSlides= "+id,
            success: function(){
                listarSlides(1);
                listarSlides(2);
                listarSlides(3);
                $(".msjSlide").addClass("mensaje").html("Actualización con exito.").show(200).delay(2500).hide(200);
            },
            error: function(){
                $(".msjSlide").addClass("mensaje").html("Error al cambiar estatus.").show(200).delay(2500).hide(200);
            }
        });
    }
}
