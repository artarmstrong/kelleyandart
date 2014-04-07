/* ==========================================================
 * BaseWeb - jQuery Document & Image Ready Scripts
 * https://github.com/sebnitu/BaseWeb
 * ==========================================================
 * Copyright 2012 Sebastian Nitu.
 * ========================================================== */

/* ==========================================================
    When Document is Ready
============================================================= */
$(document).ready(function() {

    // Ajax FancyBox
    ajax_fancybox( $('.fancybox') );
    /*$('#fancybox-registry').trigger('click'); */

    $('.fancybox-gallery').fancybox({
<<<<<<< HEAD
			openEffect	: 'none',
			closeEffect	: 'none'
		});

=======
		openEffect	: 'none',
		closeEffect	: 'none'
	});
>>>>>>> Remove git errors & sync
		// Countdown
		$('#countdown_timer').countdown({
			until: new Date(2013, 4 - 1, 13),
			layout: '{d<}{dn} {dl}, {d>}{h<}{hn} {hl}, {h>}{m<}{mn} {ml}{m>}'
		});
<<<<<<< HEAD
		
=======

>>>>>>> Remove git errors & sync
    // Mobile Orientation and Scale Fix
    mobileOrientationScale();

    // Desktop, Tablet, Phone classes
    responsiveClasses();
    resizeTrigger(responsiveClasses);

});
/* ==========================================================
    When Images are Loaded
============================================================= */
$(window).load(function() {

    $.backstretch("assets/img/content/bg.jpg");

});

/* ==========================================================
    End of Document & Image Ready Scripts
============================================================= */
