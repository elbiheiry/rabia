/* Home Section
=============================*/
$(document).ready(function () {
    "use strict";
    function headerSize() {
        var fullH = $(window).innerHeight() / 1.1,
            halfH = $(window).innerHeight() / 2,
            div = $(".center-height"),
            divHeight = $(".center-height").outerHeight(),
            imageHeight = $(".bottom-height").outerHeight(),
            divHalfHeight = divHeight / 2,
            centerDiv = halfH - divHalfHeight;
        $("#home").css({
            height: fullH
        });
        $(".center-height").css({
            top: centerDiv
        });
        $(document).scroll(function (e) {
            var scrollPercent = (divHeight - window.scrollY) / divHeight;
            if (scrollPercent >= 0) {
                div.css('opacity', scrollPercent);
            }
        });
    }
    headerSize();
    $(window).resize(function () {
        headerSize();
    });
});

/* Home Slider
================================*/
$(document).ready(function () {
    "use strict";
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        lazy: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
/* Gallery
=================================*/
$(document).ready(function () {
    "use strict";
    $('.popup-gallery').magnificPopup({
        type: 'image',
        removalDelay: 300,
        gallery: {
            enabled: true,
            preload: [0, 2],
            navigateByImgClick: true,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            tPrev: 'Previous (Left arrow key)',
            tNext: 'Next (Right arrow key)',
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>'
        }
    });
    $('.pop-image').magnificPopup({
        type: 'image',
        removalDelay: 300,
        gallery: {
            enabled: true,
            preload: [0, 2],
            navigateByImgClick: true,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            tPrev: 'Previous (Left arrow key)',
            tNext: 'Next (Right arrow key)',
            tCounter: '<span class="mfp-counter">%curr% of %total%</span>'
        }
    });
});
/* OWL Slider
================================*/
$(document).ready(function () {
    "use strict";
    $(".certificate-slid").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        margin: 15,
        rtl: true ,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },
            767: {
                items: 3
            },
            991: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });
    $(".clients-slid").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        margin: 10,
        rtl: true ,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
        autoplay: true,
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 4
            },
            767: {
                items: 4
            },
            991: {
                items: 5
            },
            1200: {
                items: 7
            }
        }
    });
    $(".work-slid").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        margin: 15,
        rtl: true ,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
        autoplay: true,
        items: 1
    });
});

/* Date Picker
=============================*/
$(document).ready(function () {
    "use strict";
    $('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
        inline: false,
        pickerPosition: "bottom-right"
    });
});

/* Date Picker
=============================*/
$(document).ready(function () {
    "use strict";
    $(".tags").select2();
});

/*Scroll Top
=============================*/
$(document).ready(function () {
    "use strict";
    // Scroll to top
    var scrollbutton = $(".up-btn");
    $(window).scroll(function () {
        $(this).scrollTop() >= 700 ? scrollbutton.show() : scrollbutton.hide();
    });
    scrollbutton.click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 600);
    });
});

/*Loading
===============================*/
$(window).on("load", function() {
    $(".loading .loading-content").fadeOut(function() {
        $(this).parent().fadeOut();
        $("body").css({"overflow-y":"visible"});
    })
});
/* CV Btn
================*/
const cvuploadButton = document.querySelector('.cv-browse-btn');
const cvfileInfo = document.querySelector('.cv-file-info');
const cvInput = document.getElementById('cv-input');
cvuploadButton.addEventListener('click', (e) => {
  cvInput.click();
});
cvInput.addEventListener('change', () => {
  const name = cvInput.value.split(/\\|\//).pop();
  const truncated = name.length > 20 
    ? name.substr(name.length - 20) 
    : name;
  
  cvfileInfo.innerHTML = truncated;
});
