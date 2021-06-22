(function ($) {
 "use strict";
 
	 $(".touchspin1").TouchSpin({
		buttondown_class: 'btn btn-default',
		buttonup_class: 'btn btn-default'
	});

	$(".touchspin2").TouchSpin({
		min: 0,
		max: 100,
		step: 0.01,
		decimals: 2,
		boostat: 5,
		maxboostedstep: 10000000,
		// postfix: '%',
		buttondown_class:'btn btn-default',
		buttonup_class: 'btn btn-default'
	});

	$(".touchspin4").TouchSpin({
		min: 0,
		max: 100,
		step: 1,
		boostat: 5,
		maxboostedstep: 10000000,
		// postfix: '%',
		buttondown_class:'btn btn-default',
		buttonup_class: 'btn btn-default'
	});

	$(".touchspin3").TouchSpin({
		verticalbuttons: true,
		buttondown_class: 'btn btn-white',
		buttonup_class: 'btn btn-white'
	});
 
})(jQuery); 