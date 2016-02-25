 $(function() {
     
	 
	 $(".type").typed({
         strings: ["HTML5", "Saas", "CSS3", "Javascript", "Jquery", "Ajax", "Bootstrap", "PHP", "Git", "MySQL", "Wordpress", "Web dev !"],
         typeSpeed: 90,
         backSpeed: 0,
         startDelay: 0,
         backDelay: 1200,
         loop: true,
         loopCount: false,
         showCursor: true,
         attr: null,
         callback: function() {

         }
     });
	 
if(screen.width < 480) { 
// do any 480 width stuff here, or simply do nothing
return;
} else {
// do all your cool stuff here for larger screens
}

         $('#fullpage').fullpage({
             anchors: ['home', 'presentation', 'projects', 'contact'],
             recordHistory: true,
             scrollingSpeed: 1000,
             slidesNavigation: true,
			 
             loopHorizontal: false,
			 afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex){
				var loadedSlide = $(this);
				if(anchorLink == 'projects' && slideIndex == 0){
					$('.website1').removeClass('website-animated');
				}
				//first slide of the second section
				if(anchorLink == 'projects' && slideIndex == 1){
					$('.website1').addClass('website-animated');
					$('.website2').removeClass('website-animated2');
				}

				//second slide of the second section (supposing #secondSlide is the
				//anchor for the second slide
				if(anchorLink == 'projects' && slideIndex == 2){
					$('.website1').removeClass('website-animated');
					$('.website2').addClass('website-animated2');
				}
				
				if(anchorLink == 'presentation' && slideIndex == 1){
					
					$('.skillbar').each(function(){
						$(this).find('.skillbar-bar').animate({
								width:$(this).attr('data-percent')
						},5500);
					});
				}
			  },
             onLeave: function(index, nextIndex, direction) {
                 var leavingSection = $(this);

                 
				 
				 //after leaving section 2
                 if (index == 1 && direction == 'down') {

                     $('#profile').addClass('animated fadeInLeft');
                     $('.social').addClass('animated fadeInDown');

                 } else if (index == 2 && direction == 'up') {

                     $('#profile').removeClass('animated fadeInLeft');
                     $('.social').removeClass('animated fadeInDown');


                 } else if (index == 2 && direction == 'down') {

                     $('.slideIn').addClass('animated fadeInLeft');


                 } else if (index == 3 && direction == 'up') {

                     $('.slideIn').removeClass('animated fadeInLeft');


                 } else if (index == 3 && direction == 'down') {



                 }


             },
			/*  afterLoad: function (anchorLink, index) {
					
				
					if (index == 0) {
						//adding active class to the 1st element in the slide menu
						$('#menu').find('li').eq(0).addClass('active');
						$('#menu').find('li').eq(1).removeClass('active');
						//$('#menu').find('li').eq(2).removeClass('active');
					
					}
					if (index == 1) {
						//adding active class to the 1st element in the slide menu
						$('#menu').find('li').eq(1).addClass('active');
						$('#menu').find('li').eq(0).removeClass('active');
						//$('#menu').find('li').eq(2).removeClass('active');
						
						
					}
					if (index == 2) {
						//adding active class to the 1st element in the slide menu
						$('#menu').find('li').eq(0).addClass('active');
						//$('#menu').find('li').eq(0).removeClass('active');
						//$('#menu').find('li').eq(1).removeClass('active');

					}


             },*/
			  
         });

         $('.logo').hover(

             function() {
                 $('.logo .row div').addClass('active')
             },
             function() {
                 $('.logo .row div').removeClass('active')
             }
         );
		 
		 $('.mac-wrapper').hover(

             function() {
				
                 $('.mac-wrapper h1, .mac-wrapper h2, .mac-wrapper a').addClass('animated fadeInDown');
             },
             function() {
                 $('.mac-wrapper h1, .mac-wrapper h2, .mac-wrapper a').removeClass('animated fadeInDown');
			
             }
         );

		 
		 
		 $("#toggle").click(function() {
	$(this).toggleClass("on");
	$("#menu").toggleClass("visible");
  });
	$("#menu ul li a").click(function() {
	  $("#toggle").toggleClass("on");
	  $("#menu").toggleClass("visible");
	});

 });