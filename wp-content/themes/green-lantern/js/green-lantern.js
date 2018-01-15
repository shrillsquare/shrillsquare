"use strict";

jQuery(document).ready(function ($) {
/* Revolution Slider */
    //show until every thing loaded
    jQuery('.rev-slider-fixed,.rev-slider-full').css('visibility', 'visible');
	//Fixed Size
    jQuery('.rev-slider-banner-fixed').revolution({
        delay: 1000,
        startwidth: 926,
        startheight: 430,

        onHoverStop: "on",

        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 3,

        hideThumbs: 0,

        navigationType: "bullet",
        navigationArrows: "solo",
        navigationStyle: "round",


        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 30,
        navigationVOffset: -40,

        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 5,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 5,
        soloArrowRightVOffset: 0,

        touchenabled: "on",

        stopAtSlide: -1,
        stopAfterLoops: -1,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        hideSliderAtLimit: 0,

        fullWidth: "off",
        fullScreen: "off",
        fullScreenOffsetContainer: "#topheader-to-offset",

        shadow: 0

    });
    


    

	//BLOG Slides
	 var $blogFeaturesCarousel = $(".blog-features-carousel");
    $blogFeaturesCarousel.carouFredSel({
        responsive: true,
        prev: {
            button: ".feature-arrow-left",
            key: "left",
            items: 1
        },
        next: {
            button: ".feature-arrow-right",
            key: "right",
            items: 1
        },
        items: {
           width: 375,
            height: 450,
            visible: {
                min: 1,
                max: 3
            },
        },
        auto: false,
        scroll: 1,
        circular: false
    });
	/* Portfolio PrettyPhoto */
    $("a[data-rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'fast', /* fast/slow/normal */
        slideshow: 5000, /* false OR interval time in ms */
        autoplay_slideshow: false, /* true/false */
        opacity: 0.80  /* Value between 0 and 1 */
    });  

   
});
/* Centering Bullets */
function centeringBullets() {
    //Bullets center fixing in revolution slide
    jQuery('.simplebullets,.slider-fixed-frame .home-bullets').each(function () {
        var $this = $(this), w = $this.width();
        $this.css('margin-left', -(w / 2) + 'px');
    });
}
