$(document).ready(function(){
	
	/*--------------------------------*/
	/* Member List */
	
	//hide all details initially
	$(".details").hide();
	
	//toggle message_body
	$("li h2").click(function() {
		$(this).siblings("li .details").slideToggle('fast');
	});
	
	//click to show details
	$(".exp").click(function() {
		$("li .details").slideDown('fast');
		$(".exp-col").toggle();
	});
	
	//click to hide details
	$(".col").click(function() {
		$("li .details").slideUp('fast');
		$(".exp-col").toggle();
	});
	
	/*--------------------------------*/
	/* Add Events */
	
	$("#formatting-tips").hide();
			
	//toggle allowed elements list
	$(".formatting-tips").click(function(){
		$("#formatting-tips").slideToggle( 'fast' )
		return false;
	});
	
	/*--------------------------------*/
	/* Event List */
	
	$(".details").hide();
			
	//toggle message_body
	$(".title").click(function() {
		$(this).siblings(".details").slideToggle('fast');
	});
	
	/*--------------------------------*/
	/* Resource List */
	
	$(".module h2").append('<span class="exp">&#43;</span><span class="col">&times;</span>');
	
	$(".module > ul").hide();
	$(".module .col").hide();
	
	//toggle message_body
	$(".module h2").click(function() {
		$(this).next("ul").slideToggle();
		$(this).children(".col").toggle();
	});
	
	/*--------------------------------*/
	/* Document .ready() tests */
	
	$(".sidebar .mysection").delay(2000).fadeIn("slow");
	
});

//Remove spaces from coupon code and make uppercase
function couponcode(string) {
	return string.split(' ').join('').replace(/[\.,-\/#!$\@%\^&\*;:{}=\-_`~()]/g, "").toUpperCase();
}