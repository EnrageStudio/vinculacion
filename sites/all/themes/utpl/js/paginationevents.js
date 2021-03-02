/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//anclas @ymtorres
(function ($) {
    $(document).ready(function () {
        $('#eventosrss').twbsPagination({
            totalPages: 10,
            visiblePages: 0,
            next: '>',
            prev: '<',
            first: '',
            last: '',
            onPageClick: function (event, page) {
                $(".item-evento").hide();
                $(".evento" + page).show();
                $(".evento" + (page + 1)).show();
                $(".evento" + (page + 2)).show();
                ;
            }
        });

    });
})(jQuery);
