//anclas @ymtorres
(function ($) {
    $(document).ready(function () {
        $('#noticiasrss').twbsPagination({
            totalPages: 9,
            visiblePages: 0,
            next: '>',
            prev: '<',
            first: '',
            last: '',
            onPageClick: function (event, page) {
                if ($(window).width() <= 640) {
                    $(".item").hide();
                    $(".noticias" + page).show();

                } else {
                    $(".item").hide();
                    $(".noticias" + page).addClass("primary-news");
                    $(".noticias" + page).show();
                    $(".noticias" + (page + 1)).show().removeClass("primary-news");
                    $(".noticias" + (page + 2)).show().removeClass("primary-news");
                }
            }
        });


    });
})(jQuery);
