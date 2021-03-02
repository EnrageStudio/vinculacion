(function ($) {

    $(document).ready(function () {
        //Elimina la clase para que no existan padding laterales en todo el contenido
        $(".node-type-contenido-para-observatorios .content-sidebar-wrap").removeClass("layout-1");

        let labelquienesSomos= "items-quienessomos";
        let labelnovedades= "items-container";

        // Carrusel 
        //var widthquienessomos = document.getElementById("items-quienessomos").clientWidth;
 
        document.querySelectorAll(".item-quienessomos").forEach(element => {
            element.style["min-width"]=`${widthquienessomos}px`;
        });

        $("#quienessomos .next").click(function () {
            document.getElementById(labelquienesSomos).scrollBy(right_scroll(widthquienessomos));
            
        });

        $("#quienessomos .prev").click(function () {
            document.getElementById(labelquienesSomos).scrollBy(left_scroll(-widthquienessomos));
        });

        $("#novedades .next").click(function () {
            document.getElementById(labelnovedades).scrollBy(right_scroll(375));
        });

        $("#novedades .prev").click(function () {
            document.getElementById(labelnovedades).scrollBy(left_scroll(-375));
        });


        function right_scroll(size){
            return {
                behavior: 'smooth',
                left: size
            }
        }
        function left_scroll(size){
            return {
                behavior: 'smooth',
                left: size
            }
        }
        //Ocultar novedades si no existen
        if (!$("#novedades #items-container .item").length ) {
            $("#novedades").addClass("hide");
            $("#menu-novedad").addClass("hide");
        }

        // Ocultar Scroll y centrar novedades
        if (!$('#novedades #items-container #item-5').length) {
            $("#novedades .position-nav").addClass("hide");
            $("#novedades #items-container").addClass("item-view-3");
            //$("#novedades").addClass("hide");  flex-flow: wrap;
        } 

    });

})(jQuery);

