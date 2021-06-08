jQuery(function () {
    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {


        jQuery('.name h1').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInLeft').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '95%'
        });

        if (!jQuery(this).scrollTop()) {
            jQuery('.topMenu').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

                jQuery(this).addClass('fadeInRight').css("opacity", "1").css("animation-fill-mode", "none");

            }, {
                offset: '95%'
            });
        }
        jQuery('footer').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('fadeInUp').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });


        jQuery('.gallery__view:even').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {
            jQuery(this).addClass('fadeInUp').css("opacity", "1").css("animation-fill-mode", "none");
        }, {
            offset: '90%'
        });

        jQuery('.gallery__view:odd').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {
            jQuery(this).addClass('fadeInDown').css("opacity", "1").css("animation-fill-mode", "none");
        }, {
            offset: '90%'
        });

        jQuery('.product__tile:even').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {
            jQuery(this).addClass('fadeInUp').css("opacity", "1").css("animation-fill-mode", "none");
        }, {
            offset: '90%'
        });

        jQuery('.product__tile:odd').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {
            jQuery(this).addClass('fadeInDown').css("opacity", "1").css("animation-fill-mode", "none");
        }, {
            offset: '90%'
        });


        jQuery('.pitAboutCenter').css("opacity", "0").addClass("oneAndHalfSec").waypoint(function (direction) {
            jQuery(this).addClass('zoomInDown').css("opacity", "1").css("animation-fill-mode", "none");
        }, {
            offset: '89%'
        });

        jQuery('section.contact').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {
            jQuery(this).addClass('fadeInLeft').css("opacity", "1").css("animation-fill-mode", "none");
        }, {
            offset: '89%'
        });

        jQuery('.slider__gallery').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('fadeInRight').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '89%'
        });


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////////////////HEEEAAAADDEEEERSS//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

        jQuery('.caption').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('fadeInDown').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '95%'
        });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	


        jQuery('.whyWeBlocks').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('zoomIn').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '95%'
        });

        jQuery('.gallery .row div').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('zoomIn').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '95%'
        });

        jQuery('.pitAboutFirst .pitAboutLeft').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInLeft').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '90%'
        });


        jQuery('.pitAboutFirst .pitAboutRight').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInRight').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '90%'
        });

        jQuery('.pitAboutLeftForSecond').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInLeft').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '90%'
        });


        jQuery('.pitAboutRightForSecond').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInRight').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '90%'
        });


        jQuery('.pitGoGallery').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInRight').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '95%'
        });

        jQuery('.map').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('slideInUp').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '95%'
        });


//gallery

        jQuery('#gallery').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('zoomInDown').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });

    } else {
        jQuery('.name h1').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInLeft').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });

        jQuery('.topMenu').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('fadeInRight').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });

        jQuery('.footer').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('zoomInLeft').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });

        jQuery('.pitAboutCenter').css("opacity", "0").addClass("oneAndHalfSec").waypoint(function (direction) {

            jQuery(this).addClass('zoomInDown').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////////////////HEEEAAAADDEEEERSS//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

        jQuery('.caption').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('fadeInDown').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	


        jQuery('.whyWeBlocks').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('zoomIn').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });

        jQuery('.gallery .row div').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('zoomIn').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });

        jQuery('.pitAboutFirst .pitAboutLeft').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInLeft').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });


        jQuery('.pitAboutFirst .pitAboutRight').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInRight').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });

        jQuery('.pitAboutLeftForSecond').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInLeft').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });


        jQuery('.pitAboutRightForSecond').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInRight').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });


        jQuery('.pitGoGallery').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('bounceInRight').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });

        jQuery('.map').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('slideInUp').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });


//gallery

        jQuery('#gallery').css("opacity", "0").addClass("oneSec").waypoint(function (direction) {

            jQuery(this).addClass('zoomInDown').css("opacity", "1").css("animation-fill-mode", "none");

        }, {
            offset: '100%'
        });


    }
});