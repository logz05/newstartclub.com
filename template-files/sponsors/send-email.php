{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="{if segment_3}Email {segment_3_category_name}{if:else}Email Member List{/if}"
		section="Sponsors"
	}
	
	{sn_styles}
	{gv_modernizr}
</head>

{!-- 
	These `preload_replace` variables are literal.
	They are all in one line to remove extra whitespace 
	otherwise it can be a headache to debug. 
--}

{preload_replace:pr_sponsor_type="{exp:user:stats dynamic='off'}{exp:channel:entries channel='locations' category='{member_sponsor_id}'}{location_type}{/exp:channel:entries}{/exp:user:stats}"}

{preload_replace:pr_sponsor_city="{exp:user:stats dynamic='off'}{exp:channel:entries channel='locations' category='{member_sponsor_id}'}{location_city}{/exp:channel:entries}{/exp:user:stats}"}
{preload_replace:pr_sponsor_state="{exp:user:stats dynamic='off'}{exp:channel:entries channel='locations' category='{member_sponsor_id}'}{location_state}{/exp:channel:entries}{/exp:user:stats}"}

{preload_replace:pr_sponsor_zip="{exp:user:stats dynamic='off'}{exp:channel:entries channel='locations' category='{member_sponsor_id}'}{location_zip}{/exp:channel:entries}{/exp:user:stats}"}
{preload_replace:pr_sponsor_id="{exp:user:stats dynamic='off'}{member_sponsor_id}{/exp:user:stats}"}

{!-- //preload_replace --}

<body>

	<header class="header">
		{sn_nav-super}
		{sn_masthead}
		
		{if "{pr_sponsor_type}" == "profit"}
	
			{sn_nav-sponsors-profit}
			
		{if:else}
		
			{sn_nav-sponsors}
			
		{/if}
		<b class="shadow-left"></b>
		<b class="shadow-right"></b>
	</header>

	<div class="body  sponsors">
	
		<ul class="trail">
			<li><a href="{path='site_index'}">Home</a></li>
			<li><a href="{path='sponsors'}">Sponsors</a></li>
			<li><a href="{path='sponsors/email-members'}">Member List</a></li>
		</ul>

		{if (segment_3 == 'interest' || segment_3 == 'more-info') && segment_4}
		
		
			{!-- Category Member Listing --}
			{embed="sponsors/_email-interest" sponsor_id="{pr_sponsor_id}" sponsor_city="{pr_sponsor_city}" sponsor_state="{pr_sponsor_state}"}
			
		
		{if:elseif segment_3 == 'event' && segment_4}
		
		
			{!-- Event Member Listing --}
			{embed="sponsors/_email-event" sponsor_id="{pr_sponsor_id}"}
			
			
		{if:elseif segment_3 == 'deal' && segment_4}
		
			
			{!-- Deal Member Listing --}
			{embed="sponsors/_email-deal" sponsor_id="{pr_sponsor_id}"}
			
		
		{if:else}
		
			
			{!-- All Member Listing --}
			{embed="sponsors/_email-all" sponsor_id="{pr_sponsor_id}" sponsor_city="{pr_sponsor_city}" sponsor_state="{pr_sponsor_state}"}
			
		
		{/if}
		
	</div><!-- /body -->
	
{sn_footer}
{sn_scripts}

<script src="{site_url}/assets/js/sponsors.js"></script>

<script src="{site_url}/assets/js/spin.min.js"></script>
<script type="text/javascript">
//Spin.js loading indicator

	var opts = {
		lines: 12,
		length: 4,
		width: 2,
		radius: 6,
		color: '#9f9e9b',
		speed: 1.3,
		trail: 70,
		shadow: false
	};
	var target = document.getElementById('js-load-form');
	var spinner = new Spinner(opts).spin(target);
	
	var sendEmail = {
		lines: 12, // The number of lines to draw
		length: 3, // The length of each line
		width: 2, // The line thickness
		radius: 5, // The radius of the inner circle
		corners: 1, // Corner roundness (0..1)
		rotate: 0, // The rotation offset
		color: '#000', // #rgb or #rrggbb
		speed: 1, // Rounds per second
		trail: 57, // Afterglow percentage
		shadow: false
	};
	var target = document.getElementById('js-loader__sending-email');
	var spinner = new Spinner(sendEmail).spin(target);
	
// End Spin.js parameters
</script>

<script src="{site_url}/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" charset="utf-8">
jQuery(document).ready(function($){

	$("#js-loader__sending-email").hide();

	$("#send_email_form").slideDown('slow').css({opacity:0}).animate({"opacity": 1}, "slow");
	$("#loading-form").fadeOut(500);
	
	
	// validate contact form on keyup and submit
	/*$("#send_email_form").validate({
		//set the rules for the field names
		rules: {
			email_subject: {
				required: true,
				minlength: 2
			},
			custom_message: {
				required: true,
				minlength: 3
			},
		},
		//set messages to appear inline
		messages: {
			email_subject: {
				required: "Please provide a <strong>Subject</strong>",
				minlength: "<strong>Subject</strong> must be 2 or more characters",
			},
			custom_message: {
				required: "Please provide a <strong>Message</strong>",
				minlength: "Only 2 characters?! Try to be more descriptive in your <strong>Message</strong>.",
			},
		},
		errorElement: "div",
	});*/

});

function sendemails(){
	$("#js-loader__sending-email").fadeIn(300);
	$("#send_email_form").submit();
	$("#send-email").addClass("disabled").prop('disabled', true);
}

</script>

<script src="{site_url}/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'custom-message',
		{
			customConfig : '{site_url}/ckeditor-custom/config_custom.js',
			toolbar: 'SponsorToolbar'
		});
</script>


{gv_analytics}
</body>
</html>