//All site js will be load here


//----------------------------------------
//------------ Scroll Spy ----------------	   
//---------------------------------------- 
jQuery(document).ready(function($) {
   'use strict'; 	
	$("#main_menu ul li a[href^='#']").on('click', function(e) {

	   // prevent default anchor click behavior
	   e.preventDefault();

	   // store hash
	   var hash = this.hash;
		var topset = $('#header').height();
	   // animate
	   $('html, body').animate({
		   scrollTop: $(this.hash).offset().top - topset
		 }, 1500);

	});
	
	//jQuery to collapse the navbar on scroll
	$(window).scroll(function() {
		var sticky_gp = $('#slider').height();
		if ($(window).scrollTop() > sticky_gp) {
			$('.header').addClass('top_fixed_head');
		} else {
			$('.header').removeClass('top_fixed_head');
		}
	});
});


//----------------------------------------
//------------ Carousel Slider -----------	   
//---------------------------------------- 
jQuery(document).ready(function($) {
   'use strict';  
	$('.carousel').carousel();
});

//----------------------------------------
//------------- Count Factors ------------	   
//---------------------------------------- 
jQuery(function($) {
	'use static';
	if($('.fact-number').length){
		$(".fact-number").appear(function(){
			$('.fact-number').each(function(){
			dataperc = $(this).attr('data-perc'),
				$(this).find('.factor').delay(6000).countTo({
					from: 10,
					to: dataperc,
					speed: 3000,
					refreshInterval: 50,	
				});  
			});
		});
	}
});
 
(function($) {
	'use strict';
	$.fn.countTo = function(options) {
		// merge the default plugin settings with the custom options
		options = $.extend({}, $.fn.countTo.defaults, options || {});
	
		// how many times to update the value, and how much to increment the value on each update
		var loops = Math.ceil(options.speed / options.refreshInterval),
			increment = (options.to - options.from) / loops;
	
		return $(this).each(function() {
			var _this = this,
				loopCount = 0,
				value = options.from,
				interval = setInterval(updateTimer, options.refreshInterval);
	
			function updateTimer() {
				value += increment;
				loopCount++;
				$(_this).html(value.toFixed(options.decimals));
	
				if (typeof(options.onUpdate) == 'function') {
					options.onUpdate.call(_this, value);
				}
	
				if (loopCount >= loops) {
					clearInterval(interval);
					value = options.to;
	
					if (typeof(options.onComplete) == 'function') {
						options.onComplete.call(_this, value);
					}
				}
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,  // the number the element should start at
		to: 100,  // the number the element should end at
		speed: 1000,  // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,  // the number of decimal places to show
		onUpdate: null,  // callback method for every time the element is updated,
		onComplete: null,  // callback method for when the element finishes updating
	};
	
})(jQuery); 


//------------------------------------------
//------------	Load More  -----------------
//------------------------------------------
jQuery(document).ready(function($) {	
	'use strict';		
	var loadtext = $('.load-more');
	$(".load-posts").click(function() {
		if($(this).hasClass('disable')) return false;
		
			$(this).html('<i class="fa fa-spin fa-spinner"></i> Loading');
			
			var $hidden = loadtext.filter(':hidden:first').delay(600);  
   
		   	if (!$hidden.next('.load-more').length) {
			   $hidden.fadeIn(500);
				$(this).addClass('disable');
				$(this).fadeTo("slow", 0.23)/*.delay(600)*/
				.queue(function(n) {
				 $(this).html('All Posts Loaded');
				 n();
				}).fadeTo("slow", 1);
			
		   	} else {
				$hidden.fadeIn(500);
				$(this).fadeTo("slow", 0.23)/*.delay(600)*/
				.queue(function(g) {
				 $(this).html('Load More Post <i class="flaticon-arrow209">');
				 g();
				}).fadeTo("slow", 1);			
		   	}
	});
	
	// Back to Top
	'use strict';	
	
	var offset = 220;
	var duration = 1000;

	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset){
			jQuery(".back_top").fadeIn('slow');
		} else {
			jQuery(".back_top").fadeOut('slow');
		}
	});

	jQuery('.back_top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, 800);
		return false;
	});
	
	
	// Contact Form
	'use strict';
		$('#contactform').bootstrapValidator({
			message: '',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {            
				contact_name: {
					validators: {
						notEmpty: {
							message: ''
						}
					}
				},
				contact_email: {
					validators: {
						notEmpty: {
							message: ''
						},
						emailAddress: {
							message: ''
						}
					}
				},			
				contact_message: {
					validators: {
						notEmpty: {
							message: ''
						}                    
					}
				}
			},
			submitHandler: function(validator, form, submitButton) {				
				$('.contact-form').addClass('ajax-loader');				
				var data = $('#contactform').serialize();				
				$.ajax({
						type: "POST",
						url: "contact.php",					
						data: $('#contactform').serialize(),
						success: function(msg){
							$('.contact-form').removeClass('ajax-loader');
							$('.form-message').html(msg);
							$('.form-message').show();
							submitButton.removeAttr("disabled");
							resetForm($('#contactform'));
						},
						error: function(msg){
							$('.contact-form').removeClass('ajax-loader');
							$('.form-message').html(msg);
							$('.form-message').show();
							submitButton.removeAttr("disabled");
							resetForm($('#contactform'));
						}
				 });				 
				return false;
			},
    });	

	function resetForm($form) {
		$form.find('input:text, input:password, input, input:file, select, textarea').val('');
		$form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
	}	
});

