jQuery(document).ready(function( $ ) {

    //matchheight

    $('.post-wrap.grid .post').matchHeight();

		//Slick slider

		$('.appetizo_slides').slick({
            dots: false,
            infinite: true,
            speed: 750,
            autoplay: true,
            autoplaySpeed: 5000,
            slidesToShow: 4,
            slidesToScroll:1,
            prevArrow: '<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
            arrows:true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll:1,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll:1,
                        centerMode:false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll:1,
                        centerMode:false
                    }
                }
            ]
        });


    $('.appetizo_slides3').slick({
        infinite: true,
        speed: 750,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 3,
        slidesToScroll:1,
        centerMode:false,
        centerPadding:'200px',
        dots:false,
        prevArrow: '<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
        arrows:true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll:1,
                    centerPadding:'100px'
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll:1,
                    centerMode:false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll:1,
                    centerMode:false
                }
            }
        ]
    });

    $('.below-slider-wrapper .appetizo_popular_news_widget ul.side-newsfeed.clearfix').slick({
        infinite: true,
        speed: 750,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 4,
        centerMode: false,
        slidesToScroll:1,
        dots:true,
        prevArrow: '<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
        arrows:true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll:1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll:1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll:1
                }
            }
        ]
    });
$('.below-slider-wrapper .appetizo_recent_news_widget ul.side-newsfeed').slick({
        infinite: true,
        speed: 750,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 4,
        centerMode: false,
        slidesToScroll:1,
        dots:true,
        prevArrow: '<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
        arrows:true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll:1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll:1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll:1
                }
            }
        ]
    });
	    $('.ribbon').fadeIn();


    // Menu
    $('.appetizo-top-bar>.menu-wrap .main-nav').slicknav({
        prependTo:'.appetizo-top-bar .top-bar',
        label:'',
        nestedParentLinks:false,
        allowParentLinks: true
    });

		$( window ).resize( function() {
			var browserWidth = $( window ).width();

			if ( browserWidth > 920 ) {
				$(".main-nav,.secondary-menu").show();
			}
		} );





    var ico = $('<i class="fa fa-caret-down"></i>');
    var ico2 = $('<i class="fa fa-caret-down"></i>');
    var ico1 = $('<i class="fa fa-caret-right"></i>');


    $('.main-nav > li:has(ul) > a').append(ico);
    $('.main-nav li:has(ul)  li:has(ul)>a').append(ico1);


    $('.searchwrap a').on('click', function ( e ) {
        e.preventDefault();
        $('.display-search-view').toggle('slide');

        $('#modal-1 a.ct_icon.search').toggleClass('inc-zindex');
        $('#modal-1 a.ct_icon.search i').addClass('fa-search');
        $('#modal-1 a.ct_icon.search i').removeClass('fa-times-circle');
		$('a.ct_icon.search.inc-zindex i').addClass('fa-times-circle');
        $('a.ct_icon.search.inc-zindex i').removeClass('fa-search');
    });


    const open = document.getElementById("open-trigger");
    const close = document.getElementById("close-trigger");

    open.addEventListener('click', () => MicroModal.show('modal-1', {
            onShow: () => document.body.classList.add('howdy'),
        onClose: () => document.body.classList.remove('howdy'),
        awaitCloseAnimation: true,
        openClass: 'open'
}), false);

    close.addEventListener('click', () => MicroModal.close('modal-1'), false);

		//FitVids
		$(".post-content iframe").wrap("<div class='fitvid'/>");
		$(".arrayvideo,.fitvid").fitVids();



    $(function()
    {
        $.fn.scrollToTop = function() {
            $(this).hide().removeAttr('href');

            var scrollDiv = $(this);
            $(window).scroll(function()
            {
                if ($(window).scrollTop() >= 1000)
                {
                    $(scrollDiv).fadeIn('slow')
                }
                else
                {
                    $(scrollDiv).fadeOut('slow')
                }
            });
            $(this).click(function()
            {
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow')
            })
        }
    });
    $(function()
    {
        $('#credits').scrollToTop();
    });

    if($('.hearder-holder .header-image').length) {
        $('body').addClass('headerimage');
    }



    $('.main-nav a').focus( function () {
        $(this).siblings('.sub-menu').addClass('focused');
    }).blur(function(){
        $(this).siblings('.sub-menu').removeClass('focused');
    });

// Sub Menu
    $('.sub-menu a').focus( function () {
        $(this).parents('.sub-menu').addClass('focused');
    }).blur(function(){
        $(this).parents('.sub-menu').removeClass('focused');
    });


});
