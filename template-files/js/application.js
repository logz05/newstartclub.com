$(document).ready(function(){
	
	//Search box
		$("#advanced-search").hide();

		//toggle allowed elements list
		$(".advanced-search").click(function(){
			$("#advanced-search").slideToggle(300)
			return false;
		});
	
	//Sign in modal
	$("#sign-in").click(function() {
		$("#email-mini").delay(1500).focus();
	});
	
	//Comments
	$("#allowed-elements").hide();
			
	//toggle allowed elements list
	$(".allowed-elements").click(function(){
		$("#allowed-elements").slideToggle( 300 )
		return false;
	});
	
	//Toggle list
	$(".sidebar h2").click(function(){
		$(this).next("ul").slideToggle(400)
		$(this).children(".arrow").toggle()
		return false;
	});
	
	$("span.leave-cmt").click(function() {
		$("#cmt-textarea").focus();
	});
	$("h2.leave-cmt").click(function() {
		$("#cmt-textarea").focus();
	});
	
	//Open exteral links in new window
	$('a:not([href^="http://newstartclub.com"]):not([href^="#"]):not([href^="/"])').attr("target","_blank");
	
	//print icon
	$('.body.detail').prepend('<a href="#print" class="link-icon print-this" data-icon="l">Print</a>');
	$('.body.detail .print-this').click(function() {
		window.print();
		return false;
	});
	
	//toggle table stats
	$(".graphic").click(function(){
		$(this).next(".table-stats").slideToggle( 300 )
		return false;
	});
	
	//tabs
	$('.tabs a').click(function(){
		switch_tabs($(this));
	});
 
	switch_tabs($('.default'));
	
});

function switch_tabs(obj)
{
	$('.tabs-content > li').hide();
	$('.tabs a').removeClass("active");
	var id = obj.attr("rel");
 
	$('#'+id).show();
	obj.addClass("active");
}