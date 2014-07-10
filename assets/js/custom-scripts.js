/* 
 * This file contains calls to various javascript files
 * 
 * Editing this file might lead to some broken theme features.
 * 
 */


/* Trigger home page slider and testimonial slider */
/* Both home page and testimonial slider are powered by FlexSlider by WooThemes */
jQuery(window).load(function() {
    
    jQuery('#gallery-content').flexslider({
        animation: "slide",
        prevText: "<i class='fa fa-angle-left'></i>",
	nextText: "<i class='fa fa-angle-right'></i>"
    });
    
    jQuery('#featured-posts').flexslider({
        animation: "slide",
        prevText: "<i class='fa fa-angle-left'></i>",
	nextText: "<i class='fa fa-angle-right'></i>",
        animationLoop: false,
        itemHeight: 375,
        itemMargin: 5
    });
});


/* Add a custom back to top button */
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });


    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
});

/* Trigger mobile responsive navigation powered by slicknav.js */
jQuery(document).ready(function($) {

    $('#site-navigation .menu>ul').slicknav({prependTo: '#mobile-menu'});
    $('#top-navigation .header-menu>ul').slicknav({prependTo: '#mobile-top-menu'});
});