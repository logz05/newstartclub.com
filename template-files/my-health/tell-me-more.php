{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Request More Information"
		section="My Health"
	}
	
	{sn_styles}
	{gv_modernizr}
</head>

<body>

	<header class="header">
		{sn_nav-super}
		{sn_masthead}
		{sn_nav-main}
		<b class="shadow-left"></b>
		<b class="shadow-right"></b>
	</header>
	
	<div class="body  my-health">

		<ul class="trail">
			<li><a href="{path='site_index'}">Home</a></li>
			<li><a href="{path='my-health'}">My Health</a></li>
		</ul>
		
		<div class="heading">
			<h1>Request More Information</h1>
		</div>
		
		<div class="grid23  clearfix">
		
			<div class="main  left">
			
				<div class="post">
					<figure class="figure  figure--main  left">
						<img alt="NEWSTART Lifestyle Club" class="image" height="120" src="{site_url}/assets/images/my-health/request_info.jpg" width="240">
					</figure>
					<p>Our NEWSTART<sup>&reg;</sup> physicians and staff have extensive experience treating a variety of health conditions without the use of drugs. If you would like to know how our programs and services can help you, please take a moment to tell us about your condition and one of our friendly NEWSTART<sup>&reg;</sup> staff will contact you shortly.</p>
					<p>Take control of your future, learn today what we can do for you! It’s completely confidential and <span class="caps">FREE</span>.</p>
				</div>
				
					{exp:freeform:form
						form_name="tell_me_more"
						required="ff_first_name|ff_last_name|ff_email|ff_phone"
						admin_bcc_notify="club@newstart.com"
						return="my-health/request-sent"
					}
						
						<table>
							{exp:user:stats}
							<tr>
								<th scope="row"><label for="ff_first_name" class="req">First Name</label></th>
								<td><input type="text" class="input" name="ff_first_name" id="ff_first_name" value="{member_first_name}" size="20" /></td>
							</tr>
							<tr>
								<th scope="row"><label for="ff_last_name" class="req">Last Name</label></th>
								<td><input type="text" class="input" name="ff_last_name" id="ff_last_name" value="{member_last_name}" size="22" /></td>
							</tr>
							<tr>
								<th scope="row"><label for="ff_email" class="req">Email</label></th>
								<td><input type="text" class="input" name="ff_email" id="ff_email" value="{email}" size="28" /></td>
							</tr>
							<tr>
								<th scope="row"><label for="ff_phone" class="req">Phone</label></th>
								<td>
									<input type="text" class="input" id="ff_phone" name="ff_phone" value="{member_phone}" size="15" />
									<input type="hidden" name="ff_age" value="{member_age}" />
									<input type="hidden" name="ff_health_score" value="{member_score_total}" />
									<input type="hidden" name="ff_address" value="{member_address}, {member_city}, {member_state} {member_zip}" />
								</td>
							</tr>
							{/exp:user:stats}
							<tr>
								<th scope="row"><label for="ff_message">Message</label></th>
								<td><textarea class="input" cols="36" rows="6" name="ff_message" onfocus="if(this.value=='Short description of your condition (optional)')this.value='';" onblur="if(this.value=='')this.value='Short description of your condition (optional)';">Short description of your condition (optional)</textarea></td>
							</tr>
							<tr>
								<th scope="row"></th>
								<td>
									<div class="button-wrap">
										<button type="submit" class="super green button"><span>Send Request</span></button>
									</div>
									<p><a href="{path='my-health/results'}">&laquo; Back to my results</a></p>
								</td>
							</tr>
						</table>
					 
					{/exp:freeform:form}
				
			</div>
			
			<div class="sidebar right">
				<header class="bar">Request More Info</header>
				
				<img src="{site_url}/assets/images/my-health/NEWSTART.png" width="190" />
				<p class="center">20601 West Paoli Lane<br />Weimar, CA 95736</p>
				<p class="center">(800) 525-9192<br /><a href="http://www.newstart.com" title="NEWSTART&reg;">www.newstart.com</a></p>
				
				<p>The information you provide will be saved electronically and will not be shared with third parties.</p>
				
				<header class="bar">Questions?</header>
				<p>For general health questions, ask one of our partnering health professionals or browse our FAQ.</p>
				
				<div class="button-wrap">
					<a href="{path='questions'}" class="super secondary button"><span>Browse Questions</span></a>
				</div>
			</div>
			
		</div>
	
	</div>
	
{sn_footer}
{sn_scripts}

{gv_analytics}
</body>
</html>