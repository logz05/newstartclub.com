{embed="embeds/_doc-top" 
	class="{class}"
	title="Create an Account"
}
{preload_replace:class="members"}
<div class="heading clearfix">
	<h1>Create an Account</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
	{if group_id==1}
		<p>You&rsquo;re currently signed in as a Super Admin. To see this form you must log out.</p>
	{/if}
	{sn_no-script}
	<?php if (isset($_POST['member_age'])) { ?>
		<div class="alert-box warning">
			<p>Please fill out the fields below to save your health score results.</p>
		</div>
	<?php } ?>
{exp:user:register group_id="9" return="update-profile" required="member_first_name|member_last_name|username|password|password_confirm|zipCode" form:class="clearfix" form:id="register"}
<script type="text/javascript">

function getZIP (form) {
		var client = new XMLHttpRequest();
		client.open("GET", "http://zip.elevenbasetwo.com?zip=" + form.zipCode.value, true);
		client.onreadystatechange = function() {
			if(client.readyState == 4) {
				//document.write(client.responseText);
				var location_data = JSON.parse(client.responseText);

				//form.city.value = location_data.city.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
				
				};
		};

		client.send();
}
</script>
	<table>
		<tr>
			<th scope="row" width="140"><label for="member_first_name" class="req"><span class="req">* </span>First Name</label></th>
			<td>
				<input type="text" class="input" name="member_first_name" id="member_first_name" value="" size="25" autocomplete="off" onblur="registration(this.form)" />
				<input type="text" class="hidden" value="" name="jsFirstName" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="member_last_name" class="req"><span class="req">* </span>Last Name</label></th>
			<td>
				<input type="text" class="input" name="member_last_name" id="member_last_name" value="" size="25" autocomplete="off" onblur="registration(this.form)" />
				<input type="text" class="hidden" value="" name="jsLastName" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="address">Address</label></th>
			<td><input type="text" class="input" id="address" name="address" value="" size="32" autocomplete="off" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="city">City</label></th>
			<td><input type="text" class="input" id="city" name="city" value="" size="20" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="state">State</label></th>
			<td>
				<select name="state" class="input"> 
				{select_state} 
				<option value="{value}" {selected}>{value}</option> 
				{/select_state} 
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="zipCode" class="req"><span class="req">* </span>Zip Code</label></th>
			<td>
				<input type="text" pattern="[0-9]*" class="input" id="zipCode" name="zipCode" value="" size="7" autocomplete="off" onblur="getZIP(this.form)" />
				<p class="instructions">Outside the U.S.? Use <strong>00000</strong></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="phone">Phone</label></th>
			<td><input type="tel" class="input" id="phone" name="phone" value="" size="15" autocomplete="off" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="username" class="req"><span class="req">* </span>Email</label></th>
			<td>
				<input type="email" class="input" id="email" name="username" value="" size="32" autocomplete="off" autocapitalize="off" onblur="registration(this.form)" />
				<input type="text" class="hidden" name="jsEmail" />
				<p class="instructions">Please provide a valid email address to receive your FREE gift.</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="password" class="req"><span class="req">* </span>Password</label></th>
			<td><input type="password" class="input" id="password" name="password" size="20" autocomplete="off" onblur="registration(this.form)" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="password_confirm" class="req"><span class="req">* </span>Password, Again</label></th>
			<td>
				<input type="password" class="input" id="password_confirm" name="password_confirm" size="20" autocomplete="off" />
				<input type="hidden" class="hidden" id="welcome_email_sent" name="welcome_email_sent" value="0" />
				<input type="text" class="hidden" name="jsPassword" />
				{if segment_2}<input type="hidden" class="input" id="promo_code" name="promo_code" size="5" value="{segment_2}" autocomplete="off" />{/if}
			</td>
		</tr>
		{if segment_2 == ""}
		<tr>
			<th scope="row"><label for="promo_code">Promo Code</label></th>
			<td>
				<input type="text" class="input" id="promo_code" name="promo_code" size="5" autocomplete="off" />
				<p class="instructions">If you received a promo code enter it here.</p>
			</td>
		</tr>
		{/if}
		<tr>
			<th scope="row">
			</th>
			<td>
				<h2>How did you hear about us?</h2>
				<select name="referrer" class="input">
					{select_referrer} 
					<option value="{value}" {selected}>{value}</option> 
					{/select_referrer}
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row">
			</th>
			<td>
				<p id="terms-conditions">
					<input class="checkbox" type="checkbox" name="terms_and_conditions">
					<span>I agree to the <a href="{path='about/terms-of-use'}">terms</a> and <a href="{path='about/privacy-policy'}">conditions</a> which include receiving a quarterly eNewsletter.</span>
				</p>
			</td>
		</tr>
		<tr>
			<th scope="row">&nbsp;</th>
			<td>
				<div class="button-wrap">
					<button type="submit" class="super green button"><span>Submit</span></button>
					<button type="reset" class="super secondary button"><span>Reset</span></button>
				</div>
			</td>
		</tr>
	</table>
	{select_member_groups} 
	<input type="checkbox" value="{group_id}" checked="checked" />{group_title}
	{/select_member_groups}
	<?php if (isset($_POST['member_age'])) { ?>
		<div class="hidden">
			<input class="hidden" type="hidden" name="member_age" value="<?php echo $_POST['member_age']; ?>" />
			<input class="hidden" type="hidden" name="member_weight" value="<?php echo $_POST['member_weight']; ?>" />
			<input class="hidden" type="hidden" name="memberHeightFeet" value="<?php echo $_POST['memberHeightFeet']; ?>" />
			<input class="hidden" type="hidden" name="member_height_in" value="<?php echo $_POST['member_height_in']; ?>" />
			<input class="hidden" type="hidden" name="member_waist_in" value="<?php echo $_POST['member_waist_in']; ?>" />
			<input class="hidden" type="hidden" name="member_score_sleep" value="<?php echo $_POST['member_score_sleep']; ?>" />
			<input class="hidden" type="hidden" name="member_score_exercise" value="<?php echo $_POST['member_score_exercise']; ?>" />
			<input class="hidden" type="hidden" name="member_score_alcohol" value="<?php echo $_POST['member_score_alcohol']; ?>" />
			<input class="hidden" type="hidden" name="member_score_smoking" value="<?php echo $_POST['member_score_smoking']; ?>" />
			<input class="hidden" type="hidden" name="member_score_diet" value="<?php echo $_POST['member_score_diet']; ?>" />
			<input class="hidden" type="hidden" name="member_score_nutrition" value="<?php echo $_POST['member_score_nutrition']; ?>" />
			<input class="hidden" type="hidden" name="member_score_emotional" value="<?php echo $_POST['member_score_emotional']; ?>" />
			<input class="hidden" type="hidden" name="member_score_total" value="<?php echo $_POST['member_score_total']; ?>" />
			<input class="hidden" type="hidden" name="memberScoreHistory" value='<?php echo stripslashes($_POST['memberScoreHistory']); ?>' />
		</div>
	<?php } ?>
{/exp:user:register}
	</div>
	<div class="sidebar right">
		<header class="bar">My Information</header>
		<p class="fine-print">By providing your information, you will be enrolled as a {site_name} member. With this, you will receive email communications with healthy videos, articles, recipes and tips for improving your life, plus details on members-only events and discounts. <strong>Membership is FREE.</strong> Your information will never be shared with a third party, and you can opt out at any time.</p>
	</div>

</div><!--/.grid23-->
{embed="embeds/_doc-bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|member-register"}