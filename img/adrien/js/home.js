/*! Main */
jQuery(document).ready(function($) {
  
    // Fixa navbar ao ultrapassa-lo
    var navbar = $('#menu'),
    		distance = navbar.offset().top,
        $window = $(window);

    $window.scroll(function() {
        if ($window.scrollTop() >= distance) {
            navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top');
          	$("body").css("padding-top", "51px");
        } else {
            navbar.removeClass('navbar-fixed-top');
            $("body").css("padding-top", "0px");
        }
    });
	
	
	
	
	
	
	
	
});