$(document).ready(function(){
	// Change click status of hamburger menu
	$('#nav-icon').click(function(){

		// Decide whether to openm menu or not
		if($(this).hasClass('open')){
			menuScroll(-100);
		} else{
			menuScroll(0);
		}

		// Toggle open
		$(this).toggleClass('open');
	});
});

// Function to scroll down menu on hamburger click
// ACCEPTS value to change top location
// RETURNS no values
function menuScroll(position){
	// Load menu object
	var menu = $('.menu_overlay');

	// Set position in VH
	position = position + 'vh';

	// Animate the menu
	TweenMax.to(menu, 0.5, {
		ease: Power3.easeIn,
		top: position
	});
}
