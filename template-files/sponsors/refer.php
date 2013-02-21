{embed="embeds/_doc-top" 
	class="sponsors"
	title="Sponsorship Program | Refer"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:channel:categories show="{member_sponsor_id}" channel="locations" style="linear"}{sponsor_type}{/exp:channel:categories}{/exp:user:stats}"
}
<ul class="trail">
	<li><a href="{path='sponsors'}">Home</a></li>
	<li><a href="{path='sponsors/email-members'}">Member List</a></li>
</ul>
<div class="heading clearfix">
	<h1>Refer to NEWSTART</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		{exp:freeform:form
			form_name="refer"
			required="ff_first_name|ff_last_name"
			return="sponsors/referral-sent"
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
							<button type="submit" class="super green button"><span>Send Referral</span></button>
						</div>
						{exp:user:stats dynamic="off" member_id="{segment_3}"}
							<input class="input hidden" name="ff_first_name" id="" value="{member_first_name}">
							<input class="input hidden" name="ff_last_name" id="" value="{member_last_name}">
							<input class="input hidden" name="ff_email" id="" value="{email}">
							<input class="input hidden" name="ff_phone" id="" value="{member_phone}">
							<input class="input hidden" name="ff_age" id="" value="{member_age}">
							<input class="input hidden" name="ff_health_score" id="" value="{member_score_total}">
							<input class="input hidden" name="ff_address" id="" value="{member_address}">
							<input class="input hidden" name="ff_city" id="" value="{member_city}">
							<input class="input hidden" name="ff_state" id="" value="{member_state}">
							<input class="input hidden" name="ff_zip_code" id="" value="{member_zip}">
						{/exp:user:stats}
						
						{exp:user:stats dynamic="off"}
							<input class="input hidden" name="ff_sponsor_email" id="" value="{email}">
							<input class="input hidden" name="ff_sponsor_full_name" id="" value="{member_first_name} {member_last_name}">
							<input class="input hidden" name="ff_sponsor_phone" id="" value="{member_phone}">
						{/exp:user:stats}
						
						{exp:channel:entries channel="locations" category="{segment_4}" dynamic="off"}
						{if no_results}{redirect="404"}{/if}
							<input class="input hidden" name="ff_location_name" id="" value="{title}">
							<input class="input hidden" name="ff_sponsor_address" id="" value="{location_address}">
							<input class="input hidden" name="ff_sponsor_city" id="" value="{location_city}">
							<input class="input hidden" name="ff_sponsor_state" id="" value="{location_state}">
							<input class="input hidden" name="ff_sponsor_zip_code" id="" value="{location_zip}">
						{/exp:channel:entries}
					</td>
				</tr>
			</table>
		{/exp:freeform:form}
	</div>
	<div class="sidebar right">
		<header class="bar">How It Works</header>
		<p>An email containing the person&rsquo;s contact information will be sent to NEWSTART. Your organization will receive up to <strong>$250</strong> when the person attends a NEWSTART Lifestyle Program.</p>
	</div>
</div>


{embed="embeds/_doc-bottom" script_add="sponsors"}