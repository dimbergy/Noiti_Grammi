/*global jQuery:false */
(function ($) {


    // $(window).load(function(){
    //     $("#navigation").sticky({ topSpacing: 0 });
    // });


    wow = new WOW(
        {
            animateClass: 'animated',
            offset:       0
        }
    );
    wow.init();

    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });



    // $(function(){
    //
    //     $('.navbar-nav li a').on('click', function(event) {
    //
    //
    //         var $test = $(this);
    //         var x = $($test.attr('href'));
    //
    //         var y = (x.selector).replace('projects', '');
    //
    //         console.log(y);
    //
    //          $('#lang a').attr("href", function() { return $(this).attr("href") + y });
    //
    //         // event.preventDefault();
    //
    //     });
    //
    //
    // });


    //jQuery for page scrolling feature - requires jQuery Easing plugin
    $(function() {
        $('.navbar-nav li a').bind('click', function(event) {
            var $anchor = $(this);
            var nav = $($anchor.attr('href'));


            if (nav.length) {
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top-90
                }, 1500, 'easeInOutExpo');

                $('#lang a').each(function() {

                    $(this).attr("href", $(this).attr("href").split('#')[0] + nav.selector);
                });

                // event.preventDefault();
            }
        });
        $('a.totop,a#btn-scroll,a.btn-slide').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });


    // //home slider
    // jQuery('#valera-slippry').slippry({
    //     pager: false
    //
    // });
    //
    // $('.testimonialslide').flexslider({
    //     animation: "slide",
    //     slideshow: false,
    //     directionNav:false,
    //     controlNav: true
    // });
    //
    // //owl carousel
    // $('#owl-works').owlCarousel({
    //     items : 4,
    //     itemsDesktop : [1199,5],
    //     itemsDesktopSmall : [980,5],
    //     itemsTablet: [768,5],
    //     itemsTabletSmall: [550,2],
    //     itemsMobile : [480,2],
    // });
    //
    // //nivo lightbox
    // $('.owl-carousel .item a').nivoLightbox({
    //     effect: 'fadeScale',                             // The effect to use when showing the lightbox
    //     theme: 'default',                           // The lightbox theme to use
    //     keyboardNav: true,                          // Enable/Disable keyboard navigation (left/right/escape)
    //     clickOverlayToClose: true,                  // If false clicking the "close" button will be the only way to close the lightbox
    //     onInit: function(){},                       // Callback when lightbox has loaded
    //     beforeShowLightbox: function(){},           // Callback before the lightbox is shown
    //     afterShowLightbox: function(lightbox){},    // Callback after the lightbox is shown
    //     beforeHideLightbox: function(){},           // Callback before the lightbox is hidden
    //     afterHideLightbox: function(){},            // Callback after the lightbox is hidden
    //     onPrev: function(element){},                // Callback when the lightbox gallery goes to previous item
    //     onNext: function(element){},                // Callback when the lightbox gallery goes to next item
    //     errorMessage: 'The requested content cannot be loaded. Please try again later.' // Error message when content can't be loaded
    // });


    jQuery('.appear').appear();
    jQuery(".appear").on("appear", function(data) {
        var id = $(this).attr("id");
        jQuery('.nav li').removeClass('active');
        jQuery(".nav a[href='#" + id + "']").parent().addClass("active");
    });

    //stats
    var runOnce = true;
    jQuery(".stats").on("appear", function(data) {
        var counters = {};
        var i = 0;
        if (runOnce){
            jQuery('.number').each(function(){
                counters[this.id] = $(this).html();
                i++;
            });
            jQuery.each( counters, function( i, val ) {
                //console.log(i + ' - ' +val);
                jQuery({countNum: 0}).animate({countNum: val}, {
                    duration: 3000,
                    easing:'linear',
                    step: function() {
                        jQuery('#'+i).text(Math.floor(this.countNum));
                    }
                });
            });
            runOnce = false;
        }
    });




    //nicescroll
    // $("html").niceScroll({zindex:999,cursorborder:"",cursorborderradius:"0px",cursorwidth:"10px",cursorcolor:"#555",cursoropacitymin:.5});
    // function initNice() {
    //     if($(window).innerWidth() <= 960) {
    //         $('html').niceScroll().remove();
    //     } else {
    //         $("html").niceScroll({zindex:999,cursorborder:"",cursorborderradius:"2px",cursorcolor:"#555",cursoropacitymin:.1});
    //     }
    // }
    // $(window).load(initNice);
    // $(window).resize(initNice);


    if (document.cookie.indexOf('visited=true') == -1) {
        // load the overlay
        $('#coming_soon').modal({show: true});

        var year = 1000 * 60 * 60 * 24 * 365;
        var expires = new Date((new Date()).valueOf() + year);
        document.cookie = "visited=true;expires=" + expires.toUTCString();

    }
    // if ($.cookie('pop') == null) {
    //     $('#coming_soon').modal('show');
    //     $.cookie('pop', '1');
    // }

})(jQuery);

// $(window).load(function() {
//     $(".loader").delay(300).fadeOut();
//     $("#page-loader").delay(500).fadeOut("slow");
// });


// $(window).on('load', function(){
//
//         $('#coming_soon').modal('show');
//
// });



$(document).ready(function () {

    $('a.lightbox-gallery').nivoLightbox();


    $(".owl-carousel").owlCarousel({

        navigation: false, // Show next and prev buttons
        singleItem:true

    });

    window.onscroll = function() {myFunction()};

    var header = document.getElementById("navigation");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }



    var hash=location.hash;


    $('#lang a').each(function() {
        $(this).attr("href", $(this).attr("href") + hash);
    });




    $('.btn-submit').on('click', function(e){
        e.preventDefault();
        validateForm();
    });

    function validateForm(){

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        var lname = $('input[name=lname]');
        var fname = $('input[name=fname]');
        var email = $('input[name=email]');
        var country = $('select[name=country]');
        var message = $('textarea');

        var lnameVal = lname.val();
        var fnameVal = fname.val();
        var emailVal = email.val();
        var countryVal = country.val();
        var messageVal = message.val();

        var errorEmmpty = lname.attr('data-empty');
        var errorMin = lname.attr('data-min');
        var errorMax = lname.attr('data-max');
        var errorEmail = email.attr('data-email');

        var lengthLname = lnameVal.length;
        var lengthFname = fnameVal.length;


        var isValidLname = false;
        var isValidFname = false;
        var isValidEmail = false;
        var isValidCountry = false;
        var isValidMessage = false;

        var inputs = new Array(lname, fname, email, country, message);
        var inputVal = new Array(lnameVal, fnameVal, emailVal, countryVal, messageVal);
        var errorMessage = new Array(errorEmmpty, errorMin, errorMax, errorEmail);
        var inputLength = new Array(lengthLname, lengthFname);
        var validInputs = new Array(isValidLname, isValidFname, isValidEmail, isValidCountry, isValidMessage);



        if(inputVal[0] == ""){
            inputs[0].next('.validation').css('display', 'block').html(errorMessage[0]);
            validInputs[0] = false;
        }
        else if(inputLength[0] < 3){
            inputs[0].next('.validation').css('display', 'block').html(errorMessage[1]);
            validInputs[0] = false;
        } else if (inputLength[0] > 100) {
            inputs[0].next('.validation').css('display', 'block').html(errorMessage[2]);
            validInputs[0] = false;
        } else {
            inputs[0].next('.validation').css('display', 'none');
            validInputs[0] = true;
        }

        if(inputVal[1] == ""){
            inputs[1].next('.validation').css('display', 'block').html(errorMessage[0]);
            validInputs[1] = false;
        }
        else if(inputLength[1] < 3){
            inputs[1].next('.validation').css('display', 'block').html(errorMessage[1]);
            validInputs[1] = false;
        } else if (inputLength[0] > 100) {
            inputs[1].next('.validation').css('display', 'block').html(errorMessage[2]);
            validInputs[1] = false;
        } else {
            inputs[1].next('.validation').css('display', 'none');
            validInputs[1] = true;
        }

        if(inputVal[2] == ""){
            inputs[2].next('.validation').css('display', 'block').html(errorMessage[0]);
            validInputs[2] = false;
        }
        else if(!emailReg.test(emailVal)){
            inputs[2].next('.validation').css('display', 'block').html(errorMessage[3]);
            validInputs[2] = false;
        } else {
            inputs[2].next('.validation').css('display', 'none');
            validInputs[2] = true;
        }

        if(inputVal[3] == null){
            inputs[3].parent().find('.validation').css('display', 'block').html(errorMessage[0]);
            validInputs[3] = false;
        } else {
            inputs[3].parent().find('.validation').css('display', 'none');
            validInputs[3] = true;
        }

        if(inputVal[4] == ""){
            inputs[4].next('.validation').css('display', 'block').html(errorMessage[0]);
            validInputs[4] = false;
        } else {
            inputs[4].next('.validation').css('display', 'none');
            validInputs[4] = true;
        }


        if(validInputs[0] && validInputs[1] && validInputs[2] && validInputs[3] && validInputs[4]) {


                var _this = $('#contactForm'),
                url = _this.attr('action'),
                    type = _this.attr('method'),
                    data = {};

                _this.find('[name]').each(function (index, value) {
                    var that = $(this),
                        name = that.attr('name'),
                        value = that.val();

                    data[name] = value;
                });


                $.ajax({
                    url: url,
                    type: type,
                    data: data,
                    success: function (response) {

                        if(response == 1) {

                        $('#sendmessage').addClass('show');

                        } else {

                        $('#errormessage').addClass('show');
                        }
                    }
                });

            $('#contactForm')[0].reset();

                return false;

        }


    }








});








