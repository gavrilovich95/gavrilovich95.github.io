$(function () {
	$( "#shipment-link" ).click(function(e) {
		e.preventDefault();
	  $( ".overlay" ).fadeIn();
	  $( ".form__shipment-wrapper" ).fadeIn();
	});
	$( "#question-link" ).click(function(e) {
		e.preventDefault();
		$( ".overlay" ).fadeIn();
		$( ".form__question-wrapper" ).fadeIn();
	});
	$( ".order-link" ).click(function(e) {
		e.preventDefault();
		$( ".overlay" ).fadeIn();
		$( ".form__order-wrapper" ).fadeIn();
	});

	
	$( ".overlay, .form__close, .form__cancel" ).click(function(e) {
		e.preventDefault();
		$( ".overlay" ).fadeOut();
		$( ".form__shipment-wrapper" ).fadeOut();
		$( ".form__question-wrapper" ).fadeOut();
		$( ".form__order-wrapper" ).fadeOut();
	});


	$('.form__toggler').click(function(e){
		$(this).next('.form__toggler_action-block').toggle();
	});


	$('.header__btn, .slider__btn').click(function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $("#shop").offset().top
		}, 700);
	});
});
