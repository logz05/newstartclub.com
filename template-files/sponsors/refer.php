{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Refer"
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

		<header class="heading">
			<h1 class="post__title">Refer to NEWSTART</h1>
		</header>
		
		<div class="grid23  clearfix">
		
			<div class="main  left">
			
				{sn_no-script}
				
				<div class="loading-form" id="loading-form">
					<span class="loading" id="js-load-form"></span>
				</div>

				{exp:freeform:form
					form_name="refer"
					required="ff_first_name|ff_last_name"
					return="sponsors/referral-sent"
					form:class="js-load  clearfix"
					form:id="refer-form"
				}
				
					<table>
					
						<tr>
							<th scope="row"><label for="referral_name">Name</label></th>
							<td><span class="readonly">{exp:user:stats dynamic="off" member_id="{segment_3}"}{member_first_name} {member_last_name}{/exp:user:stats}</span></td>
						</tr>
						
						<tr>
							<th scope="row"><label for="ff_message">Message</label></th>
							<td>
								<textarea class="input" cols="38" rows="10" name="ff_message" id="ff_message" onfocus="if(this.value=='(optional)')this.value='';" onblur="if(this.value=='')this.value='(optional)';">(optional)</textarea>
								<p class="instructions"><strong>Note:</strong> Add your comment here: i.e. <em>person will be available in a month</em></p>
							</td>
						</tr>
						
						<tr>
							<th></th>
							<td>
								<p class="instructions agreement">By submitting this form you signify that you have permission from the person above to send this referral.</p>
								
								<div class="button-wrap">
									<button type="submit" class="super  green  button" onclick="sendemails();" id="send-email"><span>Send Referral</span></button>
									<span id="js-loader__sending-email" class="js-loader  js-loader__sending-email"><i class="loading" id="js-send-email"></i></span>
								</div>
								{exp:user:stats dynamic="off" member_id="{segment_3}"}
									<input type="hidden" name="ff_first_name" value="{member_first_name}">
									<input type="hidden" name="ff_last_name" value="{member_last_name}">
									<input type="hidden" name="ff_email" value="{email}">
									<input type="hidden" name="ff_phone" value="{member_phone}">
									<input type="hidden" name="ff_age" value="{member_age}">
									<input type="hidden" name="ff_health_score" value="{member_score_total}">
									<input type="hidden" name="ff_address" value="{member_address}">
									<input type="hidden" name="ff_city" value="{member_city}">
									<input type="hidden" name="ff_state" value="{member_state}">
									<input type="hidden" name="ff_zip_code" value="{member_zip}">
									<input type="hidden" name="ff_country" value="{member_country}">
								{/exp:user:stats}
								
								{exp:user:stats dynamic="off"}
									<input type="hidden" name="ff_sponsor_email" value="{email}">
									<input type="hidden" name="ff_sponsor_full_name" value="{member_first_name} {member_last_name}">
									<input type="hidden" name="ff_sponsor_phone" value="{member_phone}">
								{/exp:user:stats}
								
								{exp:channel:entries channel="locations" category="{segment_4}" dynamic="off"}
								{if no_results}{redirect="404"}{/if}
									<input type="hidden" name="ff_location_name" value="{title}">
									<input type="hidden" name="ff_sponsor_address" value="{location_address}">
									<input type="hidden" name="ff_sponsor_city" value="{location_city}">
									<input type="hidden" name="ff_sponsor_state" value="{location_state}">
									<input type="hidden" name="ff_sponsor_zip_code" value="{location_zip}">
									<input type="hidden" name="ff_sponsor_country" value="{location_country:label}">
								{/exp:channel:entries}
							</td>
						</tr>
						
					</table>
				{/exp:freeform:form}
				
			</div>
		
			<div class="sidebar  right">
				
				<section class="section">
					<header class="bar">How It Works</header>
					<p>An email containing the person&rsquo;s contact information will be sent to NEWSTART. Your organization will receive up to <strong>$500</strong> when the person attends a NEWSTART&reg; Lifestyle Program.</p>
					<p>Visit <a href="http://www.newstart.com/referrals">www.newstart.com/referrals</a> for more details.</p>
				</section>
			</div>
		
		</div>
		
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
<script type="text/javascript" charset="utf-8">
jQuery(document).ready(function($){

	$("#js-loader__sending-email").hide();

	$("#refer-form").slideDown('slow').css({opacity:0}).animate({"opacity": 1}, "slow");
	$("#loading-form").fadeOut(500);

});

function sendemails(){
	$("#js-loader__sending-email").fadeIn(300);
	$("#refer-form").submit();
	$("#send-email").addClass("disabled").prop('disabled', true);
}

</script>

{gv_analytics}
</body>
</html>