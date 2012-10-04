{embed="embeds/_doc-top" 
	class="my-health"
	title="Request More Information"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='my-health'}">My Health</a></li>
</ul>
<div class="heading clearfix">
	<h1>Request More Information</h1>
</div>

<div class="grid23 clearfix">
	<div class="main left">
		<div class="post">
			<p><img alt="NEWSTART Lifestyle Club" class="image" height="120" src="/assets/images/my_health/request_info.jpg" width="240">Our NEWSTART® physicians and staff have extensive experience treating a variety of health conditions without the use of drugs. If you would like to know how we can help you, please take a moment to tell us about your condition and our friendly NEWSTART® staff will contact you shortly.</p>
			<p>Take control of your future, learn today what we can do for you! It’s completely confidential and <span class="caps">FREE</span>.</p>
			<form method="post" action="/my-health/request-sent/" class="clearafter request-info">
				<table>
					{exp:user:stats}
					<tr>
						<th scope="row"><label for="name">Name</label></th>
						<td><input type="text" class="input" name="name" id="name" value="{member_first_name} {member_last_name}" size="28" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="email">Email</label></th>
						<td><input type="text" class="input" name="email" id="email" value="{email}" size="28" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="phone">Phone</label></th>
						<td><input type="text" class="input" id="phone" name="phone" value="{phone}" size="15" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="zipCode">Zip Code</label></th>
						<td>
							<input type="text" class="input" id="zipCode" name="zipCode" value="{zipCode}" size="7" />
							<input type="hidden" name="member_age" value="{member_age}" />
						</td>
					</tr>
					{/exp:user:stats}
					<tr>
						<th scope="row"><label for="custom-message">Message</label></th>
						<td><textarea class="input" cols="36" rows="6" name="custom-message" onfocus="if(this.value=='Short description of your condition (optional)')this.value='';" onblur="if(this.value=='')this.value='Short description of your condition (optional)';">Short description of your condition (optional)</textarea></td>
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
			</form>
		</div>
	</div>
	<div class="sidebar right">
		<header class="bar">Request More Info</header>
		<p>We offer multiple NEWSTART&reg; Lifestyle Program locations throughout the United States. You may receive information from the programs listed <a data-reveal-id="locations">here</a>. The information you provide will be saved electronically and will not be shared with third parties.</p>
		<div class="button-wrap">
			<a href="{path='questions'}" class="super secondary button"><span>Browse Questions</span></a>
		</div>
	</div>
</div>
{embed="embeds/_doc-bottom"}