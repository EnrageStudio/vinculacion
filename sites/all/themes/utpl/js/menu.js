

//menu responsivo @ymtorres
(function ($) {

    $(document).ready(function () {


        $(".mainmenu-toggle").click(function () {
            $('.nav-menu').toggle("slow");
        });
        $(".submenu-toggle").click(function () {
            $('.nav-submenu').toggle("slow");
        });

//        if ($(".title-menu").css('display') == 'none')
//        {
//            $('.nav-menu').css("display", "flex");
//        } else {
//            $('.nav-menu').toggle("slow");
//            $('.nav-submenu').toggle("slow");
//
//        }



        if ($(".title-menu").css('display') == 'none')
        {
        } else {
            $(".sub-menu .field-items .field-item a").click(function () {
                $('.nav-submenu').toggle("slow");

            });

        }


        var nav = $('.submenu');
        $(window).scroll(function () {
            if ($(this).scrollTop() > 600) {
                nav.addClass("f-nav");
            } else {
                nav.removeClass("f-nav");
            }
        });

    });
})(jQuery);
