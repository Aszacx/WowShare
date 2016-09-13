    //Elemento menú actual activado 
    var enlace = false;

    $('.menu li a').each(function(index) {
        if(this.href.trim() == window.location){
            $(this).parent().addClass("active");
            enlace = true;
        }
    });

    if(!enlace){
        $('.menu li:first').addClass("active");
    }

