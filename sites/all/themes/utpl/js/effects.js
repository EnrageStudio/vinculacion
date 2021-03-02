//anclas @ymtorres
(function ($) {
    $(document).ready(function () {

        //accordion
        $(".accordion-title").click(function () {
            $(".accordion-title").removeClass("selected");
            $(this).addClass("selected");
            $(this).next().addClass("accordeon-selected");
            $(this).next().toggle("slow");
        });
        //botones
        $(".boton .field-item").append($("<div class='flecha'><p class='boton-mouseover'><i class='material-icons'>chevron_right</i></p>\n\
           <p class='boton-bg'><i class='material-icons'>arrow_right_alt</i></p></div>"));
        $(".boton .field-item").mouseover(function () {
            $(this).addClass("selected");
        });
        $(".boton .field-item").mouseout(function () {
            $(this).removeClass("selected");
        });

        //modal
        $(".modal-video > div").append($("<div class='exit-modal'><i class='material-icons'>close</i></div > "));
        $(".modal-imagen").click(function () {
            $(".modal-video").addClass("open-modal");
        });
        $(".modal-title").click(function () {
            $(this).next().addClass("open-modal");
        });
        $(".exit-modal").click(function () {
            $(".modal-video").removeClass("open-modal");
            jQuery('iframe').attr('src', jQuery('iframe').attr('src'));

        });
        //bloque con imagenes
        $(".group-enlace-bloque-img").mouseover(function () {
            $(this).addClass("selected");
        });
        $(".group-enlace-bloque-img").mouseout(function () {
            $(this).removeClass("selected");
        });
        $(".lineasestrategicas .group-enlace-bloque-img").click(function () {
            return false;
        });
        $(".movilidad .group-enlace-bloque-img").click(function () {
            return false;
        });
        $(".centrosinternacionales .group-enlace-bloque-img").click(function () {
            return false;
        });
        $(".centrosnacionales .group-enlace-bloque-img").click(function () {
            return false;
        });
        //submenu   
        if ($('.region-submenu').length) {
            // it exists
        } else {
            $('.submenu').hide();
            if ($('.region-carousel').length) {
            } else {
                $(".header-wrapper").addClass("header-internas");
                // $(".header-wrapper").css({'position':'initial', 'background':'#003f72'});
            }

        }


        //efecto carrusel
        $(".carrusel-contenido")
            .animate({ opacity: 0.2 }, 100)
            .animate({ left: 0 }, 800)
            .animate({ opacity: 1 }, 1000);
        $(".carrusel-enlace a")
            .animate({ opacity: 1 }, 1000);
        window.sr = ScrollReveal();
        sr.reveal('#logo', { duration: 2000 }, 50);
        sr.reveal('.oferta .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('.enlaces-interes .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('.lineasestrategicas .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('.lidereseducando .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('.generamosconocimiento .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('.intercambios .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('.movilidad .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('.estasbuscando .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('.centrosnacionales .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('.centrosinternacionales .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('#nuestrocampus .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('#enlacesubicanos .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('.iniciativaslocales .contenido-bg .field-item', { duration: 2000 }, 50);
        sr.reveal('#generamosconocimiento .contenido-bg .field-item', { duration: 2000 }, 50);
        $("#gototop").click(function () {
            $("#gototop").effect("fade");
        });
        $("#gototopfoot").click(function () {
            $("#gototopfoot").effect("fade");
        });

        //investigacion
        $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(7)').addClass('displaydata');
        $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(8)').addClass('displaydata');
        $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(9)').addClass('displaydata');
        $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(10)').addClass('displaydata');
        $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(11)').addClass('displaydata');
        $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(12)').addClass('displaydata');
        $('#paquetesdetrabajo a#left').addClass('active');

        $("#paquetesdetrabajo #right").click(function () {
            $('#paquetesdetrabajo .contenido-bg > .field-items > div').removeClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(1)').addClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(2)').addClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(3)').addClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(4)').addClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(5)').addClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(6)').addClass('displaydata');
            $('#paquetesdetrabajo .etiqueta').html('2/2');
            $('#paquetesdetrabajo a#left').removeClass('active');
            $('#paquetesdetrabajo a#right').addClass('active');

        });
        $("#paquetesdetrabajo #left").click(function () {
            $('#paquetesdetrabajo .contenido-bg > .field-items > div').removeClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(7)').addClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(8)').addClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(9)').addClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(10)').addClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(11)').addClass('displaydata');
            $('#paquetesdetrabajo .contenido-bg > .field-items > div:nth-of-type(12)').addClass('displaydata');
            $('#paquetesdetrabajo .etiqueta').html('1/2');
            $('#paquetesdetrabajo a#right').removeClass('active');
            $('#paquetesdetrabajo a#left').addClass('active');
        });




        $("#smartland .contenido-bg > .field-items > .field-item").mouseover(function () {
            $(this).addClass("selected");
        });
        $("#smartland .contenido-bg > .field-items > .field-item").mouseout(function () {
            $(this).removeClass("selected");
        });

        //testimonios
        var $divstestimonios = $(".testimonios .contenido-bg > .field-items > .field-item").toArray().length;
        console.log("Hay " + $divstestimonios + " elementos");
        //agregar flechas
        $(".testimonios .contenido-bg > .field-items").append($('<p class="arrows"><a id="left" class="active"><i class="material-icons">chevron_left </i></a><a id="right"> <i class="material-icons"> chevron_right </i></a></p>'));
        //inicializar
        $('.testimonios .contenido-bg > .field-items > div:nth-of-type(1)').addClass('displaydata');
        $('.testimonios .contenido-bg > .field-items > div:nth-of-type(2)').addClass('displaydata');
        var $count = 2;
        $(".testimonios #right").click(function () {
            if ($count < $divstestimonios) {
                var $isdiv1 = '.testimonios .contenido-bg > .field-items > div:nth-of-type(' + parseInt($count + 1) + ')';
                var $isdiv2 = '.testimonios .contenido-bg > .field-items > div:nth-of-type(' + parseInt($count + 2) + ')';
                $('.testimonios .contenido-bg > .field-items > div').removeClass('displaydata');
                $($isdiv1).addClass('displaydata');
                $($isdiv2).addClass('displaydata');
                $count += 2;
            }
            console.log($count);
        });
        $(".testimonios #left").click(function () {
            if ($count > 2) {
                var $isdiv1 = '.testimonios .contenido-bg > .field-items > div:nth-of-type(' + parseInt($count - 2) + ')';
                var $isdiv2 = '.testimonios .contenido-bg > .field-items > div:nth-of-type(' + parseInt($count - 3) + ')';

                $('.testimonios .contenido-bg > .field-items > div').removeClass('displaydata');
                $($isdiv1).addClass('displaydata');
                $($isdiv2).addClass('displaydata');
                $count -= 2;
            }
            console.log($count);
        });

        //resultados
        var $divresultados = $(".resultados .contenido-bg > .field-items > .field-item").toArray().length;
        console.log("Hay " + $divresultados + " elementos");
        //agregar flechas
        $(".resultados .contenido-bg > .field-items").append($('<p class="arrows"><a id="left" class="active"><i class="material-icons">chevron_left </i></a><a id="right"> <i class="material-icons"> chevron_right </i></a></p>'));
        //inicializar
        $('.resultados .contenido-bg > .field-items > div:nth-of-type(1)').addClass('displaydata');
        $('.resultados .contenido-bg > .field-items > div:nth-of-type(2)').addClass('displaydata');
        var $count = 2;
        $(".resultados #right").click(function () {
            if ($count < $divresultados) {
                var $isdiv1 = '.resultados .contenido-bg > .field-items > div:nth-of-type(' + parseInt($count + 1) + ')';
                var $isdiv2 = '.resultados .contenido-bg > .field-items > div:nth-of-type(' + parseInt($count + 2) + ')';
                $('.resultados .contenido-bg > .field-items > div').removeClass('displaydata');
                $($isdiv1).addClass('displaydata');
                $($isdiv2).addClass('displaydata');
                $count += 2;
            }
            console.log($count);
        });
        $(".resultados #left").click(function () {
            if ($count > 2) {
                var $isdiv1 = '.resultados .contenido-bg > .field-items > div:nth-of-type(' + parseInt($count - 2) + ')';
                var $isdiv2 = '.resultados .contenido-bg > .field-items > div:nth-of-type(' + parseInt($count - 3) + ')';

                $('.resultados .contenido-bg > .field-items > div').removeClass('displaydata');
                $($isdiv1).addClass('displaydata');
                $($isdiv2).addClass('displaydata');
                $count -= 2;
            }
            console.log($count);
        });



        //* efecto noticias*//
        var $cantidad = $('ul.actividades li').length;
        console.log($cantidad);

        for (var i = 0; i < $cantidad; i++) {

            var $etiqueta1 = "views-row-" + i;
            var $etiqueta2 = "views-row-" + (i + 1);

            console.log($etiqueta1);
            console.log($etiqueta2);
        }


    });
})(jQuery);
