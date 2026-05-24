$(document).ready(function(){
    $('#menu-toggle').click(function(){
        $('.mob-header').addClass('active');
    });
    $('.sub-menu-toggle').click(function(){
        $(this).next().slideToggle();
        if($(this).find('i').hasClass('fa-chevron-down')){
          $(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
        }else{
          $(this).find('i').addClass('fa-chevron-down').removeClass('fa-chevron-up')
        }
    });
    $('.closepanel').click(function(){
        $('.mob-header').removeClass('active');
    });
    $(".gallery a").attr("data-fancybox","mygallery");
    $(".gallery a").each(function(){
        $(this).attr("data-caption", $(this).find("img").attr("alt"));
        $(this).attr("title", $(this).find("img").attr("alt"));
    });
    $(".gallery a").fancybox({
      loop: true
    });
    $('#toggle-search').click(function(){
        if('.search-bar')
        $('.search-bar').toggleClass('open');
    });
    AOS.init();
});

$(window).scroll(function(){
    var sticky = $('.fixed-menu'),
    scroll = $(window).scrollTop();
    if (scroll >= 150) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
});
$('#banner-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay: true,
    autoplayTimeout:5000,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
$("#testi-carousel").owlCarousel({
    autoplay: true,
    slideSpeed: 3000,
    smartSpeed: 1000,
    loop:true,
    margin:25,
    dots: false,
    nav: true,
    navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
    ],
    responsiveClass:true,
    responsive:{
	    0:{
		      items:1
	    },
	    600:{
		      items:2
	    },
	    1000:{
		      items:3
	    }
	}
});
$("#publi-carousel").owlCarousel({
    items: 1,
    autoplay: false,
    slideSpeed: 3000,
    smartSpeed: 1000,
    loop:true,
    margin:25,
    dots: false,
    nav: true,
    navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
    ],
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

$("#course-carousel").owlCarousel({
    autoplay: true,
    loop:true,
    margin:30,
    dots: false,
    nav: true,
    navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
    ],
    autoplay: true,
    responsiveClass:true,
    responsive:{
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});

$(".publication-carousel").owlCarousel({
    slideSpeed: 3000,
    smartSpeed: 1000,
    loop:true,
    margin:25,
    dots: false,
    nav: true,
    navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
    ],
    autoplay: true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
});
$("#gallery-carousel").owlCarousel({
    slideSpeed: 3000,
    smartSpeed: 1000,
    loop:true,
    margin:25,
    dots: false,
    nav: true,
    navText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i>"
    ],
    autoplay: false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
});

AOS.init({
    duration: 1200,
})
$(document).ready(function(){
    // Add minus icon for collapse element which is open by default
    $(".collapse.show").each(function(){
        $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        $(this).parent().find('.card-header').addClass('active');
    });
    
    // Toggle plus minus icon on show hide of collapse element
    $(".collapse").on('show.bs.collapse', function(){
        $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        $(this).parent().find('.card-header').addClass('active');
    }).on('hide.bs.collapse', function(){
        $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        $(this).parent().find('.card-header').removeClass('active');
    });
});
$(function () {
    $("#dob").datepicker({ 
        autoclose: true, 
        todayHighlight: true
    }).datepicker('update', new Date());
    $('.news-area').vTicker({
        speed: 500,
        pause: 3000,
        animation: 'fade',
        mousePause: true,
        showItems: 3
    })
});
