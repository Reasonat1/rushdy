/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {

/************  responsive menu  **************/

	$('body').addClass("menu-close");

	$(".mobile-menu").click(function(){
	   if ($("body").hasClass("menu-close")){
	      $("body").removeClass("menu-close").addClass("menu-open");
	   }
	   else {
	      $("body").addClass("menu-close").removeClass("menu-open");
	   }
	});





/*	if ($("body").hasClass("front")){
	    $space = $("#hp-bean-container-image img").naturalHeight - $("#hp-bean-container-text").height();
		if ($space > 0){
			$("#hp-bean-container-text #top-text").css("margin-top",$space/2.5);
			$("#hp-bean-container-text .hp-bean-slogan").css("margin-top",($space)/6.5);
			$("#hp-bean-container-text .hp-bean-slogan").css("margin-bottom",($space)/6.5);
		}
		$(window).resize(function(){
				$("#hp-bean-container-text #top-text").css("margin-top",0);
				$("#hp-bean-container-text .hp-bean-slogan").css("margin-top",0);
				$("#hp-bean-container-text .hp-bean-slogan").css("margin-bottom",0);
			    $space = $("#hp-bean-container-image img").height() - $("#hp-bean-container-text").height();
				if ($space > 0){
					$("#hp-bean-container-text #top-text").css("margin-top",$space/2.5);
					$("#hp-bean-container-text .hp-bean-slogan").css("margin-top",($space)/6.5);
					$("#hp-bean-container-text .hp-bean-slogan").css("margin-bottom",($space)/6.5);
				}
		});
	}
	if ($("body").hasClass("front")){
	    	$("#hp-bean-container-image .hp-bean-slogan").css("margin",0);
	    	$("#hp-bean-container-text #top-text").css("margin-top",0);
	    	$space = $("#block-bean-hp-block").height() - $("#hp-bean-container-text").height();
    		if ($space > 0){
				$("#hp-bean-container-text #top-text").css("margin-top",$space/2.5);
				$("#hp-bean-container-text .hp-bean-slogan").css("margin-top",($space)/6.5);
				$("#hp-bean-container-text .hp-bean-slogan").css("margin-bottom",($space)/6.5);
			}
		$(window).resize(function(){
	    	$("#hp-bean-container-image .hp-bean-slogan").css("margin",0);
	    	$("#hp-bean-container-text #top-text").css("margin-top",0);
	    	$space = $("#block-bean-hp-block").height() - $("#hp-bean-container-text").height();
    		if ($space > 0){
				$("#hp-bean-container-text #top-text").css("margin-top",$space/2.5);
				$("#hp-bean-container-text .hp-bean-slogan").css("margin-top",($space)/6.5);
				$("#hp-bean-container-text .hp-bean-slogan").css("margin-bottom",($space)/6.5);
			}
		});
	}

	if ($("body").hasClass("page-node-140")){
	    	$("#block-bean-loyodea .bean-title").css("margin",0);
	    	$space = $("#block-bean-loyodea").height() - $("#bean-container-text").height();
    		if ($space > 0){
				$("#block-bean-loyodea .bean-title").css("margin-top",$space/2.5);
				$("#block-bean-loyodea .bean-title").css("margin-bottom",($space)/7);
			}
		$(window).resize(function(){
		    	$("#block-bean-loyodea .bean-title").css("margin",0);
		    	$space = $("#block-bean-loyodea").height() - $("#bean-container-text").height();
	    		if ($space > 0){
					$("#block-bean-loyodea .bean-title").css("margin-top",$space/2.5);
					$("#block-bean-loyodea .bean-title").css("margin-bottom",($space)/7);
				}
		});
	}*/




	  $(".masonry").each(function(){
          $(this).parent().parent().addClass('masonry-view');
      });
	  $(".bottom-three").each(function(){
          $(this).parent().parent().addClass('bottom-three-view');
      });


	if ($("body").hasClass("node-type-product-display")){
		if (!$("div").hasClass("field-slideshow-controls")){
			$(".node-type-product-display .group-left .field-slideshow").css("float","left");
		}
		$(".click-to-see").click(function(){
			$("body").addClass("nutritional-open");
		});

		$(document).click(function(event) { 
              if((!$(event.target).closest('.field-name-field-nutritional-values img').length) && (!$(event.target).closest('.click-to-see').length)) {
				$("body").removeClass("nutritional-open");
              }        
          });

		$(".field-name-field-nutritional-values .close").click(function(){
			$("body").removeClass("nutritional-open");
		});
	}

	/********  scroll class  ***********/

      $scroll_pos = 0;
      $(document).scroll(function() { 
        $scroll_pos = $(this).scrollTop();
        if($scroll_pos > 0) {
            $("body").addClass('scroll');
        }
        else {
            $("body").removeClass('scroll');
        }
      });

	/*******  mega menu  *********/

	$(document).ready(function(){
	    $(".menu-1481").hover(function(){
	        $("#block-quicktabs-information-block").css("display","block");
	        },function(){
	        $("#block-quicktabs-information-block").css("display","none");
	    });
	    $(".wrapper-menu-blocks #block-quicktabs-information-block").hover(function(){
	        $("#block-quicktabs-information-block").css("display","block");
	        },function(){
	        $("#block-quicktabs-information-block").css("display","none");
	    });
	});

	$(document).ready(function(){
	    $(".menu-1482").hover(function(){
	        $("#block-views-product-term-view-block").css("display","block");
	        },function(){
	        $("#block-views-product-term-view-block").css("display","none");
	    });
	    $(".wrapper-menu-blocks #block-views-product-term-view-block").hover(function(){
	        $("#block-views-product-term-view-block").css("display","block");
	        },function(){
	        $("#block-views-product-term-view-block").css("display","none");
	    });
	});

	$(document).ready(function(){
	    $("#block-views-cart-icon-view-block").hover(function(){
	        $(".region-cart").addClass("display-cart");
	        },function(){
	        $(".region-cart").removeClass("display-cart");
	    });
	    $(".region-cart #block-commerce-cart-cart .content").hover(function(){
	        $(".region-cart").addClass("display-cart");
	        },function(){
	        $(".region-cart").removeClass("display-cart");
	    });
	});



  }
};


})(jQuery, Drupal, this, this.document);

document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                var message = Drupal.t('Please fill out this field');
                e.target.setCustomValidity(message);
            }
   			if (e.target.validity.typeMismatch) {
   				var message = Drupal.t('Please fill out a valid email');
				e.target.setCustomValidity(message);
	   		}
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }

})
