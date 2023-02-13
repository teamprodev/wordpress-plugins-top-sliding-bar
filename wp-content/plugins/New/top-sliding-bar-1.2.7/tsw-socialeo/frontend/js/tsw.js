(function($){

	$(document).ready(function(){

		var tsw_container = $( ".tsw_container");
		$( ".tsw_toggle_button" ).toggle(function() {
			tsw_container.slideDown();
			tsw_container.addClass('tsw_opened').removeClass('tsw_closed');
			$( ".tsw_toggle_button_inner").addClass('tsw_spin_left').removeClass('tsw_spin_right');
		}, function() {
			tsw_container.slideUp();
			tsw_container.addClass('tsw_closed').removeClass('tsw_opened');
			$( ".tsw_toggle_button_inner").addClass('tsw_spin_right').removeClass('tsw_spin_left');
		});

		// cloase if click out of tsw area
		$(document).click(function(e) {
			if (!$(e.target).parents().hasClass('tsw_container')) {
				if ( tsw_container.hasClass('tsw_opened') ) {
					tsw_container.slideUp();
					tsw_container.addClass('tsw_closed').removeClass('tsw_opened');
					$( ".tsw_toggle_button_inner").addClass('tsw_spin_right').removeClass('tsw_spin_left');
				}
			}
		});

		$( ".flashing_animation" ).click(function() {
			$( ".flashing_animation").removeClass('flashing_animation');
		});
		
		$('.tsw_open').click(function(){
			$('html, body').animate({scrollTop : 0},700);
			return false;
		});

	});

})(jQuery);