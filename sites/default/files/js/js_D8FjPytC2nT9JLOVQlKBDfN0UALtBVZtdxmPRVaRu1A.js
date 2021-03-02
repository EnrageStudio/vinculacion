/*
 * jQuery FlexSlider v2.0
 * Copyright 2012 WooThemes
 * Contributing Author: Tyler Smith
 */
;(function(d){d.flexslider=function(h,k){var a=d(h),c=d.extend({},d.flexslider.defaults,k),e=c.namespace,o="ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch,s=o?"touchend":"click",l="vertical"===c.direction,m=c.reverse,i=0<c.itemWidth,p="fade"===c.animation,r=""!==c.asNavFor,f={};d.data(h,"flexslider",a);f={init:function(){a.animating=!1;a.currentSlide=c.startAt;a.animatingTo=a.currentSlide;a.atEnd=0===a.currentSlide||a.currentSlide===a.last;a.containerSelector=c.selector.substr(0,
c.selector.search(" "));a.slides=d(c.selector,a);a.container=d(a.containerSelector,a);a.count=a.slides.length;a.syncExists=0<d(c.sync).length;"slide"===c.animation&&(c.animation="swing");a.prop=l?"top":"marginLeft";a.args={};a.manualPause=!1;a.transitions=!c.video&&!p&&c.useCSS&&function(){var b=document.createElement("div"),c=["perspectiveProperty","WebkitPerspective","MozPerspective","OPerspective","msPerspective"],d;for(d in c)if(b.style[c[d]]!==void 0){a.pfx=c[d].replace("Perspective","").toLowerCase();
a.prop="-"+a.pfx+"-transform";return true}return false}();""!==c.controlsContainer&&(a.controlsContainer=0<d(c.controlsContainer).length&&d(c.controlsContainer));""!==c.manualControls&&(a.manualControls=0<d(c.manualControls).length&&d(c.manualControls));c.randomize&&(a.slides.sort(function(){return Math.round(Math.random())-0.5}),a.container.empty().append(a.slides));a.doMath();r&&f.asNav.setup();a.setup("init");c.controlNav&&f.controlNav.setup();c.directionNav&&f.directionNav.setup();c.keyboard&&
(1===d(a.containerSelector).length||c.multipleKeyboard)&&d(document).bind("keyup",function(b){b=b.keyCode;if(!a.animating&&(b===39||b===37)){b=b===39?a.getTarget("next"):b===37?a.getTarget("prev"):false;a.flexAnimate(b,c.pauseOnAction)}});c.mousewheel&&a.bind("mousewheel",function(b,g){b.preventDefault();var d=g<0?a.getTarget("next"):a.getTarget("prev");a.flexAnimate(d,c.pauseOnAction)});c.pausePlay&&f.pausePlay.setup();c.slideshow&&(c.pauseOnHover&&a.hover(function(){a.pause()},function(){a.manualPause||
a.play()}),0<c.initDelay?setTimeout(a.play,c.initDelay):a.play());o&&c.touch&&f.touch();(!p||p&&c.smoothHeight)&&d(window).bind("resize focus",f.resize);setTimeout(function(){c.start(a)},200)},asNav:{setup:function(){a.asNav=!0;a.animatingTo=Math.floor(a.currentSlide/a.move);a.currentItem=a.currentSlide;a.slides.removeClass(e+"active-slide").eq(a.currentItem).addClass(e+"active-slide");a.slides.click(function(b){b.preventDefault();var b=d(this),g=b.index();!d(c.asNavFor).data("flexslider").animating&&
!b.hasClass("active")&&(a.direction=a.currentItem<g?"next":"prev",a.flexAnimate(g,c.pauseOnAction,!1,!0,!0))})}},controlNav:{setup:function(){a.manualControls?f.controlNav.setupManual():f.controlNav.setupPaging()},setupPaging:function(){var b=1,g;a.controlNavScaffold=d('<ol class="'+e+"control-nav "+e+("thumbnails"===c.controlNav?"control-thumbs":"control-paging")+'"></ol>');if(1<a.pagingCount)for(var q=0;q<a.pagingCount;q++)g="thumbnails"===c.controlNav?'<img src="'+a.slides.eq(q).attr("data-thumb")+
'"/>':"<a>"+b+"</a>",a.controlNavScaffold.append("<li>"+g+"</li>"),b++;a.controlsContainer?d(a.controlsContainer).append(a.controlNavScaffold):a.append(a.controlNavScaffold);f.controlNav.set();f.controlNav.active();a.controlNavScaffold.delegate("a, img",s,function(b){b.preventDefault();var b=d(this),g=a.controlNav.index(b);b.hasClass(e+"active")||(a.direction=g>a.currentSlide?"next":"prev",a.flexAnimate(g,c.pauseOnAction))});o&&a.controlNavScaffold.delegate("a","click touchstart",function(a){a.preventDefault()})},
setupManual:function(){a.controlNav=a.manualControls;f.controlNav.active();a.controlNav.live(s,function(b){b.preventDefault();var b=d(this),g=a.controlNav.index(b);b.hasClass(e+"active")||(g>a.currentSlide?a.direction="next":a.direction="prev",a.flexAnimate(g,c.pauseOnAction))});o&&a.controlNav.live("click touchstart",function(a){a.preventDefault()})},set:function(){a.controlNav=d("."+e+"control-nav li "+("thumbnails"===c.controlNav?"img":"a"),a.controlsContainer?a.controlsContainer:a)},active:function(){a.controlNav.removeClass(e+
"active").eq(a.animatingTo).addClass(e+"active")},update:function(b,c){1<a.pagingCount&&"add"===b?a.controlNavScaffold.append(d("<li><a>"+a.count+"</a></li>")):1===a.pagingCount?a.controlNavScaffold.find("li").remove():a.controlNav.eq(c).closest("li").remove();f.controlNav.set();1<a.pagingCount&&a.pagingCount!==a.controlNav.length?a.update(c,b):f.controlNav.active()}},directionNav:{setup:function(){var b=d('<ul class="'+e+'direction-nav"><li><a class="'+e+'prev" href="#">'+c.prevText+'</a></li><li><a class="'+
e+'next" href="#">'+c.nextText+"</a></li></ul>");a.controlsContainer?(d(a.controlsContainer).append(b),a.directionNav=d("."+e+"direction-nav li a",a.controlsContainer)):(a.append(b),a.directionNav=d("."+e+"direction-nav li a",a));f.directionNav.update();a.directionNav.bind(s,function(b){b.preventDefault();b=d(this).hasClass(e+"next")?a.getTarget("next"):a.getTarget("prev");a.flexAnimate(b,c.pauseOnAction)});o&&a.directionNav.bind("click touchstart",function(a){a.preventDefault()})},update:function(){var b=
e+"disabled";c.animationLoop||(1===a.pagingCount?a.directionNav.addClass(b):0===a.animatingTo?a.directionNav.removeClass(b).filter("."+e+"prev").addClass(b):a.animatingTo===a.last?a.directionNav.removeClass(b).filter("."+e+"next").addClass(b):a.directionNav.removeClass(b))}},pausePlay:{setup:function(){var b=d('<div class="'+e+'pauseplay"><a></a></div>');a.controlsContainer?(a.controlsContainer.append(b),a.pausePlay=d("."+e+"pauseplay a",a.controlsContainer)):(a.append(b),a.pausePlay=d("."+e+"pauseplay a",
a));f.pausePlay.update(c.slideshow?e+"pause":e+"play");a.pausePlay.bind(s,function(b){b.preventDefault();if(d(this).hasClass(e+"pause")){a.pause();a.manualPause=true}else{a.play();a.manualPause=false}});o&&a.pausePlay.bind("click touchstart",function(a){a.preventDefault()})},update:function(b){"play"===b?a.pausePlay.removeClass(e+"pause").addClass(e+"play").text(c.playText):a.pausePlay.removeClass(e+"play").addClass(e+"pause").text(c.pauseText)}},touch:function(){function b(b){j=l?d-b.touches[0].pageY:
d-b.touches[0].pageX;o=l?Math.abs(j)<Math.abs(b.touches[0].pageX-e):Math.abs(j)<Math.abs(b.touches[0].pageY-e);if(!o||500<Number(new Date)-k)b.preventDefault(),!p&&a.transitions&&(c.animationLoop||(j/=0===a.currentSlide&&0>j||a.currentSlide===a.last&&0<j?Math.abs(j)/n+2:1),a.setProps(f+j,"setTouch"))}function g(){if(a.animatingTo===a.currentSlide&&!o&&null!==j){var i=m?-j:j,l=0<i?a.getTarget("next"):a.getTarget("prev");a.canAdvance(l)&&(550>Number(new Date)-k&&20<Math.abs(i)||Math.abs(i)>n/2)?a.flexAnimate(l,
c.pauseOnAction):a.flexAnimate(a.currentSlide,c.pauseOnAction,!0)}h.removeEventListener("touchmove",b,!1);h.removeEventListener("touchend",g,!1);f=j=e=d=null}var d,e,f,n,j,k,o=!1;h.addEventListener("touchstart",function(j){a.animating?j.preventDefault():1===j.touches.length&&(a.pause(),n=l?a.h:a.w,k=Number(new Date),f=i&&m&&a.animatingTo===a.last?0:i&&m?a.limit-(a.itemW+c.itemMargin)*a.move*a.animatingTo:i&&a.currentSlide===a.last?a.limit:i?(a.itemW+c.itemMargin)*a.move*a.currentSlide:m?(a.last-a.currentSlide+
a.cloneOffset)*n:(a.currentSlide+a.cloneOffset)*n,d=l?j.touches[0].pageY:j.touches[0].pageX,e=l?j.touches[0].pageX:j.touches[0].pageY,h.addEventListener("touchmove",b,!1),h.addEventListener("touchend",g,!1))},!1)},resize:function(){!a.animating&&a.is(":visible")&&(i||a.doMath(),p?f.smoothHeight():i?(a.slides.width(a.computedW),a.update(a.pagingCount),a.setProps()):l?(a.viewport.height(a.h),a.setProps(a.h,"setTotal")):(c.smoothHeight&&f.smoothHeight(),a.newSlides.width(a.computedW),a.setProps(a.computedW,
"setTotal")))},smoothHeight:function(b){if(!l||p){var c=p?a:a.viewport;b?c.animate({height:a.slides.eq(a.animatingTo).height()},b):c.height(a.slides.eq(a.animatingTo).height())}},sync:function(b){var g=d(c.sync).data("flexslider"),e=a.animatingTo;switch(b){case "animate":g.flexAnimate(e,c.pauseOnAction,!1,!0);break;case "play":!g.playing&&!g.asNav&&g.play();break;case "pause":g.pause()}}};a.flexAnimate=function(b,g,q,h,k){if(!a.animating&&(a.canAdvance(b)||q)&&a.is(":visible")){if(r&&h)if(q=d(c.asNavFor).data("flexslider"),
a.atEnd=0===b||b===a.count-1,q.flexAnimate(b,!0,!1,!0,k),a.direction=a.currentItem<b?"next":"prev",q.direction=a.direction,Math.ceil((b+1)/a.visible)-1!==a.currentSlide&&0!==b)a.currentItem=b,a.slides.removeClass(e+"active-slide").eq(b).addClass(e+"active-slide"),b=Math.floor(b/a.visible);else return a.currentItem=b,a.slides.removeClass(e+"active-slide").eq(b).addClass(e+"active-slide"),!1;a.animating=!0;a.animatingTo=b;c.before(a);g&&a.pause();a.syncExists&&!k&&f.sync("animate");c.controlNav&&f.controlNav.active();
i||a.slides.removeClass(e+"active-slide").eq(b).addClass(e+"active-slide");a.atEnd=0===b||b===a.last;c.directionNav&&f.directionNav.update();b===a.last&&(c.end(a),c.animationLoop||a.pause());if(p)a.slides.eq(a.currentSlide).fadeOut(c.animationSpeed,c.easing),a.slides.eq(b).fadeIn(c.animationSpeed,c.easing,a.wrapup);else{var n=l?a.slides.filter(":first").height():a.computedW;i?(b=c.itemWidth>a.w?2*c.itemMargin:c.itemMargin,b=(a.itemW+b)*a.move*a.animatingTo,b=b>a.limit&&1!==a.visible?a.limit:b):b=
0===a.currentSlide&&b===a.count-1&&c.animationLoop&&"next"!==a.direction?m?(a.count+a.cloneOffset)*n:0:a.currentSlide===a.last&&0===b&&c.animationLoop&&"prev"!==a.direction?m?0:(a.count+1)*n:m?(a.count-1-b+a.cloneOffset)*n:(b+a.cloneOffset)*n;a.setProps(b,"",c.animationSpeed);if(a.transitions){if(!c.animationLoop||!a.atEnd)a.animating=!1,a.currentSlide=a.animatingTo;a.container.unbind("webkitTransitionEnd transitionend");a.container.bind("webkitTransitionEnd transitionend",function(){a.wrapup(n)})}else a.container.animate(a.args,
c.animationSpeed,c.easing,function(){a.wrapup(n)})}c.smoothHeight&&f.smoothHeight(c.animationSpeed)}};a.wrapup=function(b){!p&&!i&&(0===a.currentSlide&&a.animatingTo===a.last&&c.animationLoop?a.setProps(b,"jumpEnd"):a.currentSlide===a.last&&(0===a.animatingTo&&c.animationLoop)&&a.setProps(b,"jumpStart"));a.animating=!1;a.currentSlide=a.animatingTo;c.after(a)};a.animateSlides=function(){a.animating||a.flexAnimate(a.getTarget("next"))};a.pause=function(){clearInterval(a.animatedSlides);a.playing=!1;
c.pausePlay&&f.pausePlay.update("play");a.syncExists&&f.sync("pause")};a.play=function(){a.animatedSlides=setInterval(a.animateSlides,c.slideshowSpeed);a.playing=!0;c.pausePlay&&f.pausePlay.update("pause");a.syncExists&&f.sync("play")};a.canAdvance=function(b){var d=r?a.pagingCount-1:a.last;return r&&0===a.currentItem&&b===a.pagingCount-1&&"next"!==a.direction?!1:b===a.currentSlide&&!r?!1:c.animationLoop?!0:a.atEnd&&0===a.currentSlide&&b===d&&"next"!==a.direction?!1:a.atEnd&&a.currentSlide===d&&0===
b&&"next"===a.direction?!1:!0};a.getTarget=function(b){a.direction=b;return"next"===b?a.currentSlide===a.last?0:a.currentSlide+1:0===a.currentSlide?a.last:a.currentSlide-1};a.setProps=function(b,d,e){var f=function(){var e=b?b:(a.itemW+c.itemMargin)*a.move*a.animatingTo;return-1*function(){if(i)return"setTouch"===d?b:m&&a.animatingTo===a.last?0:m?a.limit-(a.itemW+c.itemMargin)*a.move*a.animatingTo:a.animatingTo===a.last?a.limit:e;switch(d){case "setTotal":return m?(a.count-1-a.currentSlide+a.cloneOffset)*
b:(a.currentSlide+a.cloneOffset)*b;case "setTouch":return b;case "jumpEnd":return m?b:a.count*b;case "jumpStart":return m?a.count*b:b;default:return b}}()+"px"}();a.transitions&&(f=l?"translate3d(0,"+f+",0)":"translate3d("+f+",0,0)",e=void 0!==e?e/1E3+"s":"0s",a.container.css("-"+a.pfx+"-transition-duration",e));a.args[a.prop]=f;(a.transitions||void 0===e)&&a.container.css(a.args)};a.setup=function(b){if(p)a.slides.css({width:"100%","float":"left",marginRight:"-100%",position:"relative"}),"init"===
b&&a.slides.eq(a.currentSlide).fadeIn(c.animationSpeed,c.easing),c.smoothHeight&&f.smoothHeight();else{var g,h;"init"===b&&(a.viewport=d('<div class="flex-viewport"></div>').css({overflow:"hidden",position:"relative"}).appendTo(a).append(a.container),a.cloneCount=0,a.cloneOffset=0,m&&(h=d.makeArray(a.slides).reverse(),a.slides=d(h),a.container.empty().append(a.slides)));c.animationLoop&&!i&&(a.cloneCount=2,a.cloneOffset=1,"init"!==b&&a.container.find(".clone").remove(),a.container.append(a.slides.first().clone().addClass("clone")).prepend(a.slides.last().clone().addClass("clone")));
a.newSlides=d(c.selector,a);g=m?a.count-1-a.currentSlide+a.cloneOffset:a.currentSlide+a.cloneOffset;l&&!i?(a.container.height(200*(a.count+a.cloneCount)+"%").css("position","absolute").width("100%"),setTimeout(function(){a.newSlides.css({display:"block"});a.doMath();a.viewport.height(a.h);a.setProps(g*a.h,"init")},"init"===b?100:0)):(a.container.width(200*(a.count+a.cloneCount)+"%"),a.setProps(g*a.computedW,"init"),setTimeout(function(){a.doMath();a.newSlides.css({width:a.computedW,"float":"left",
display:"block"});c.smoothHeight&&f.smoothHeight()},"init"===b?100:0))}i||a.slides.removeClass(e+"active-slide").eq(a.currentSlide).addClass(e+"active-slide")};a.doMath=function(){var b=a.slides.first(),d=c.itemMargin,e=c.minItems,f=c.maxItems;a.w=a.width();a.h=b.height();a.boxPadding=b.outerWidth()-b.width();i?(a.itemT=c.itemWidth+d,a.minW=e?e*a.itemT:a.w,a.maxW=f?f*a.itemT:a.w,a.itemW=a.minW>a.w?(a.w-d*e)/e:a.maxW<a.w?(a.w-d*f)/f:c.itemWidth>a.w?a.w:c.itemWidth,a.visible=Math.floor(a.w/(a.itemW+
d)),a.move=0<c.move&&c.move<a.visible?c.move:a.visible,a.pagingCount=Math.ceil((a.count-a.visible)/a.move+1),a.last=a.pagingCount-1,a.limit=1===a.pagingCount?0:c.itemWidth>a.w?(a.itemW+2*d)*a.count-a.w-d:(a.itemW+d)*a.count-a.w):(a.itemW=a.w,a.pagingCount=a.count,a.last=a.count-1);a.computedW=a.itemW-a.boxPadding};a.update=function(b,d){a.doMath();i||(b<a.currentSlide?a.currentSlide+=1:b<=a.currentSlide&&0!==b&&(a.currentSlide-=1),a.animatingTo=a.currentSlide);if(c.controlNav&&!a.manualControls)if("add"===
d&&!i||a.pagingCount>a.controlNav.length)f.controlNav.update("add");else if("remove"===d&&!i||a.pagingCount<a.controlNav.length)i&&a.currentSlide>a.last&&(a.currentSlide-=1,a.animatingTo-=1),f.controlNav.update("remove",a.last);c.directionNav&&f.directionNav.update()};a.addSlide=function(b,e){var f=d(b);a.count+=1;a.last=a.count-1;l&&m?void 0!==e?a.slides.eq(a.count-e).after(f):a.container.prepend(f):void 0!==e?a.slides.eq(e).before(f):a.container.append(f);a.update(e,"add");a.slides=d(c.selector+
":not(.clone)",a);a.setup();c.added(a)};a.removeSlide=function(b){var e=isNaN(b)?a.slides.index(d(b)):b;a.count-=1;a.last=a.count-1;isNaN(b)?d(b,a.slides).remove():l&&m?a.slides.eq(a.last).remove():a.slides.eq(b).remove();a.doMath();a.update(e,"remove");a.slides=d(c.selector+":not(.clone)",a);a.setup();c.removed(a)};f.init()};d.flexslider.defaults={namespace:"flex-",selector:".slides > li",animation:"fade",easing:"swing",direction:"horizontal",reverse:!1,animationLoop:!0,smoothHeight:!1,startAt:0,
slideshow:!0,slideshowSpeed:7E3,animationSpeed:600,initDelay:0,randomize:!1,pauseOnAction:!0,pauseOnHover:!1,useCSS:!0,touch:!0,video:!1,controlNav:!0,directionNav:!0,prevText:"Previous",nextText:"Next",keyboard:!0,multipleKeyboard:!1,mousewheel:!1,pausePlay:!1,pauseText:"Pause",playText:"Play",controlsContainer:"",manualControls:"",sync:"",asNavFor:"",itemWidth:0,itemMargin:0,minItems:0,maxItems:0,move:0,start:function(){},before:function(){},after:function(){},end:function(){},added:function(){},
removed:function(){}};d.fn.flexslider=function(h){h=h||{};if("object"===typeof h)return this.each(function(){var a=d(this),c=a.find(h.selector?h.selector:".slides > li");1===c.length?(c.fadeIn(400),h.start&&h.start(a)):void 0===a.data("flexslider")&&new d.flexslider(this,h)});var k=d(this).data("flexslider");switch(h){case "play":k.play();break;case "pause":k.pause();break;case "next":k.flexAnimate(k.getTarget("next"),!0);break;case "prev":case "previous":k.flexAnimate(k.getTarget("prev"),!0);break;
default:"number"===typeof h&&k.flexAnimate(h,!0)}}})(jQuery);;
/**
 * @file
 * Responsive Green Slider Javascript.
 *
 */
(function ($) {
Drupal.behaviors.slider = {
attach: function (context, settings) {
  $(window).load(function() {
    $("#single-post-slider").flexslider({
      animation: 'slide',
      slideshow: true,
      controlNav: true,
      smoothHeight: true,
      start: function(slider) {
        slider.container.click(function(e) {
          if(!slider.animating) {
            slider.flexAnimate(slider.getTarget('next'));
          }
        });
      }
    });
  });
}
};
})(jQuery);
;


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
;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




//go to top @ymtorres
(function ($) {

    $(document).ready(function () {
        $("#gototop").click(function () {
            $("html, body").animate({scrollTop: 0}, 1000);
        });

        $("#gototopfoot").click(function () {
            $("html, body").animate({scrollTop: 0}, 1000);
        });

        var navtop = $('.gototopfoot');
        $(window).scroll(function () {
            if ($(this).scrollTop() > 600 && $(this).scrollTop() + 1000 < ($("html").height())) {
                navtop.addClass("top-nav");
            } else {
                navtop.removeClass("top-nav");
            }
        });
    });


})(jQuery);
;
//anclas @ymtorres
(function ($) {
    $(document).ready(function () {
//        $('.nav-submenu a').click(function (e) {
//            e.preventDefault(); //evitar el eventos del enlace normal
//            var cadena = $(this).attr('href'),
//                    patron = "/utpl/", //patron antes del ancla
//                    nuevoValor = "",
//                    nuevaCadena = cadena.replace(patron, nuevoValor);
//            $('body,html').stop(true, true).animate({
//                scrollTop: $(nuevaCadena).offset().top - 7
//            }, 1000);
//        });

        $('.nav-submenu a').click(function (e) {
            e.preventDefault(); //evitar el eventos del enlace normal
            var cadena = $(this).attr('href');
            var ancla = "#" + cadena.split("#")[1];

            $('body,html').stop(true, true).animate({
                scrollTop: $(ancla).offset().top - 7
            }, 1000);
        });

        //bloque de contenido admisiones
        $('.estasbuscando .group-enlace-bloque-img').click(function (e) {
            e.preventDefault(); //evitar el eventos del enlace normal
            var cadena = $(this).attr('href');
            var ancla = "#" + cadena.split("#")[1];
            $('body,html').stop(true, true).animate({
                scrollTop: $(ancla).offset().top - 7
            }, 1000);
        });




        $(window).scroll(function () {
            var WindowTop = $(window).scrollTop();
            $('section').each(function (i) {
                var seccion = $(this).attr('id');
                if (WindowTop > $(this).offset().top - 50 &&
                        WindowTop < $(this).offset().top + $(this).outerHeight(true)
                        ) {
                    $('.nav-submenu a').removeClass('active');
                    $(".nav-submenu a[href$='" + seccion + "']").addClass('active');
                }
            });

        });

    });
})(jQuery);
;
/*
 * jQuery pagination plugin v1.4
 * http://esimakin.github.io/twbs-pagination/
 *
 * Copyright 2014-2016, Eugene Simakin
 * Released under Apache 2.0 license
 * http://apache.org/licenses/LICENSE-2.0.html
 */
(function(e,d,a,f){var b=e.fn.twbsPagination;var c=function(i,g){this.$element=e(i);this.options=e.extend({},e.fn.twbsPagination.defaults,g);if(this.options.startPage<1||this.options.startPage>this.options.totalPages){throw new Error("Start page option is incorrect")}this.options.totalPages=parseInt(this.options.totalPages);if(isNaN(this.options.totalPages)){throw new Error("Total pages option is not correct!")}this.options.visiblePages=parseInt(this.options.visiblePages);if(isNaN(this.options.visiblePages)){throw new Error("Visible pages option is not correct!")}if(this.options.totalPages==1){return this}if(this.options.totalPages<this.options.visiblePages){this.options.visiblePages=this.options.totalPages}if(this.options.onPageClick instanceof Function){this.$element.first().on("page",this.options.onPageClick)}if(this.options.href){this.options.startPage=this.getPageFromQueryString();if(!this.options.startPage){this.options.startPage=1}}var h=(typeof this.$element.prop==="function")?this.$element.prop("tagName"):this.$element.attr("tagName");if(h==="UL"){this.$listContainer=this.$element}else{this.$listContainer=e("<ul></ul>")}this.$listContainer.addClass(this.options.paginationClass);if(h!=="UL"){this.$element.append(this.$listContainer)}if(this.options.initiateStartPageClick){this.show(this.options.startPage)}else{this.render(this.getPages(this.options.startPage));this.setupEvents()}return this};c.prototype={constructor:c,destroy:function(){this.$element.empty();this.$element.removeData("twbs-pagination");this.$element.off("page");return this},show:function(g){if(g<1||g>this.options.totalPages){throw new Error("Page is incorrect.")}this.currentPage=g;this.render(this.getPages(g));this.setupEvents();this.$element.trigger("page",g);return this},buildListItems:function(g){var l=[];if(this.options.first){l.push(this.buildItem("first",1))}if(this.options.prev){var k=g.currentPage>1?g.currentPage-1:this.options.loop?this.options.totalPages:1;l.push(this.buildItem("prev",k))}for(var h=0;h<g.numeric.length;h++){l.push(this.buildItem("page",g.numeric[h]))}if(this.options.next){var j=g.currentPage<this.options.totalPages?g.currentPage+1:this.options.loop?1:this.options.totalPages;l.push(this.buildItem("next",j))}if(this.options.last){l.push(this.buildItem("last",this.options.totalPages))}return l},buildItem:function(i,j){var k=e("<li></li>"),h=e("<a></a>"),g=this.options[i]?this.makeText(this.options[i],j):j;k.addClass(this.options[i+"Class"]);k.data("page",j);k.data("page-type",i);k.append(h.attr("href",this.makeHref(j)).addClass(this.options.anchorClass).html(g));return k},getPages:function(j){var g=[];var k=Math.floor(this.options.visiblePages/2);var l=j-k+1-this.options.visiblePages%2;var h=j+k;if(l<=0){l=1;h=this.options.visiblePages}if(h>this.options.totalPages){l=this.options.totalPages-this.options.visiblePages+1;h=this.options.totalPages}var i=l;while(i<=h){g.push(i);i++}return{currentPage:j,numeric:g}},render:function(g){var i=this;this.$listContainer.children().remove();var h=this.buildListItems(g);jQuery.each(h,function(j,k){i.$listContainer.append(k)});this.$listContainer.children().each(function(){var k=e(this),j=k.data("page-type");switch(j){case"page":if(k.data("page")===g.currentPage){k.addClass(i.options.activeClass)}break;case"first":k.toggleClass(i.options.disabledClass,g.currentPage===1);break;case"last":k.toggleClass(i.options.disabledClass,g.currentPage===i.options.totalPages);break;case"prev":k.toggleClass(i.options.disabledClass,!i.options.loop&&g.currentPage===1);break;case"next":k.toggleClass(i.options.disabledClass,!i.options.loop&&g.currentPage===i.options.totalPages);break;default:break}})},setupEvents:function(){var g=this;this.$listContainer.off("click").on("click","li",function(h){var i=e(this);if(i.hasClass(g.options.disabledClass)||i.hasClass(g.options.activeClass)){return false}!g.options.href&&h.preventDefault();g.show(parseInt(i.data("page")))})},makeHref:function(g){return this.options.href?this.generateQueryString(g):"#"},makeText:function(h,g){return h.replace(this.options.pageVariable,g).replace(this.options.totalPagesVariable,this.options.totalPages)},getPageFromQueryString:function(g){var h=this.getSearchString(g),i=new RegExp(this.options.pageVariable+"(=([^&#]*)|&|#|$)"),j=i.exec(h);if(!j||!j[2]){return null}j=decodeURIComponent(j[2]);j=parseInt(j);if(isNaN(j)){return null}return j},generateQueryString:function(g,h){var i=this.getSearchString(h),j=new RegExp(this.options.pageVariable+"=*[^&#]*");if(!i){return""}return"?"+i.replace(j,this.options.pageVariable+"="+g)},getSearchString:function(g){var h=g||d.location.search;if(h===""){return null}if(h.indexOf("?")===0){h=h.substr(1)}return h}};e.fn.twbsPagination=function(i){var h=Array.prototype.slice.call(arguments,1);var k;var l=e(this);var j=l.data("twbs-pagination");var g=typeof i==="object"?i:{};if(!j){l.data("twbs-pagination",(j=new c(this,g)))}if(typeof i==="string"){k=j[i].apply(j,h)}return(k===f)?l:k};e.fn.twbsPagination.defaults={totalPages:1,startPage:1,visiblePages:5,initiateStartPageClick:true,href:false,pageVariable:"{{page}}",totalPagesVariable:"{{total_pages}}",page:null,first:"First",prev:"Previous",next:"Next",last:"Last",loop:false,onPageClick:null,paginationClass:"pagination",nextClass:"page-item next",prevClass:"page-item prev",lastClass:"page-item last",firstClass:"page-item first",pageClass:"page-item",activeClass:"active",disabledClass:"disabled",anchorClass:"page-link"};e.fn.twbsPagination.Constructor=c;e.fn.twbsPagination.noConflict=function(){e.fn.twbsPagination=b;return this};e.fn.twbsPagination.version="1.4"})(window.jQuery,window,document);;
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
;
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
;
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
;
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

;
