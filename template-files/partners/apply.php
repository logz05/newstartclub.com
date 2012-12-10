{embed="embeds/_doc-top" 
	class="services"
	title="Partnership Application"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='{segment_1}'}">Partners</a></li>
</ul>
<div class="heading clearfix">
	<h1>
		Partnership Application
	</h1>
</div>
<div class="grid23 clearfix">
	<div class="left">
		{exp:freeform:form
			form_name="partner_application"
			required="ff_first_name|ff_last_name"
			return="partners/application-submitted"
		}
			<table>
				{exp:user:stats dynamic="off"}
				<tr>
					<th scope="row"><label for="ff_first_name">First Name</label></th>
					<td><input type="text" class="input" name="ff_first_name" id="ff_first_name" value="{member_first_name}" size="20" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="ff_last_name">Last Name</label></th>
					<td><input type="text" class="input" name="ff_last_name" id="ff_last_name" value="{member_last_name}" size="22" /></td>
				</tr>
				<tr>
					<th scope="row">
						<label for="partner_credentials">Credentials</label>
					</th>
					<td>
						<input type="text" name="partner_credentials" class="input" id="partner_credentials" size="8" value="" />
						<p class="instructions">i.e. MD, RN, MPH, etc.</p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="partner_specialty">Specialty</label>
					</th>
					<td>
						<input type="text" name="partner_specialty" class="input" id="partner_specialty" value="" size="23" value="" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ff_message">Biography</label>
					</th>
					<td>
						<textarea class="input" id="ff_message" name="ff_message" rows="5" cols="28" autocomplete="off"></textarea>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="partner_image_upload">Picture</label>
						<div></div>
					</th>
					<td>
						{freeform:field:partner_image_upload} 
						<p class="instructions">Accepted file types: .jpg, .png, .gif</p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ff_address">Business Address</label>
					</th>
					<td>
						<input type="text" name="ff_address" class="input" id="ff_address" size="32" value="" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ff_city">City</label>
					</th>
					<td>
						<input type="text" name="ff_city" class="input" id="ff_city" value="" size="20" value="" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ff_state">State</label>
					</th>
					<td>
						<select name="ff_state" class="input"> 
							<option value="--">--</option>
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="PR">Puerto Rico</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="VI">Virgin Islands</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ff_zip_code">Zip Code</label>
					</th>
					<td>
						<input type="text" name="ff_zip_code" class="input" id="ff_zip_code" value="" size="7" value="" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ff_phone">Business Phone</label>
					</th>
					<td>
						<input type="text" name="ff_phone" class="input" id="ff_phone" value="" size="15" value="" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ff_affiliation">Local Church Affiliation</label>
					</th>
					<td>
						<input type="text" name="ff_affiliation" class="input" id="ff_affiliation" size="20" value="" />
					</td>
				</tr>
				<tr>
					<th scope="row">
					</th>
					<td>
						<div class="button-wrap">
							<button type="submit" class="super green button"><span>Submit</span></button>
							<input type="text" class="input hidden" name="ff_sender_email" id="ff_sender_email" value="{email}" size="28" />
						</div>
					</td>
				</tr>
				{/exp:user:stats}
			</table>
		{/exp:freeform:form}
	</div>
	<div class="sidebar right">
		<header class="bar">Partnership Application</header>
		<p>{site_name} partners must be individuals that abide by and promote the principles of the <a href="http://newstart.com">NEWSTART&reg;</a> acronym and should be in harmony with the teachings of the Seventh-day Adventist Church. We reserve the right to deny or revoke partnership.</p>
	</div>
</div>
{embed="embeds/_doc-bottom"}