{embed="embeds/_doc-top" 
	class="sponsors"
	title="Sponsorship Program | Create a new event"
	add="datePicker"}
<div class="heading clearfix">
	<h1>Create a new event</h1>
</div>
<div class="grid23 clearfix">
	<div class="main events left">
	<h2>Event Information</h2>
{exp:user:stats dynamic="off"}
{exp:weblog:entry_form weblog="events" return="/sponsors/edit-event" category="{sponsor_number}"}
	<table>
		<tr>
			<th scope="row"><label for="title">* Title</label></th>
			<td><input type="text" class="input" name="title" id="title" value="{title}" size="36" maxlength="100" onkeyup="liveUrlTitle();" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_25">* Start Date</label></th>
			<td>
				<input type="text" dir="ltr" id="field_id_25" class="input" name="field_id_25" value="" maxlength="128" size="25" /><br>
				<p class="instructions">Format date as YYYY-MM-DD</p>
				<input type="text" class="hidden" id="entry_date" name="entry_date" value="" maxlength="23" size="25" />
				<input type="text" class="hidden" name="expiration_date" id="expiration_date" value="" maxlength="23" size="25" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_33">Start Time</label></th>
			<td>
				<input type="text" dir="ltr" id="field_id_33" class="input" name="field_id_33" value="" maxlength="128" size="25" /><br>
				<p class="instructions">Format time as 24 hour time.<br>
					12:00am = 00:00, 11:59pm = 23:59<br>
					<em>If all day event leave this field blank.</em></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_26">* End Date</label></th>
			<td>
				<input type="text" dir="ltr" id="field_id_26" class="input" name="field_id_26" value="" maxlength="128" size="25" /><br>
				<p class="instructions">Format date as YYYY-MM-DD</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_34">End Time</label></th>
			<td>
				<input type="text" dir="ltr" id="field_id_34" class="input" name="field_id_34" value="" maxlength="128" size="25" /><br>
				<p class="instructions">Format time as 24 hour time.<br>
					12:00am = 00:00, 11:59pm = 23:59<br>
					<em>If all day event leave this field blank.</em></p>
			</td>
		</tr>
		{exp:weblog:entries weblog="locations" limit="1" category="{sponsor_number}"}
		<tr>
			<th scope="row"><label for="field_id_341">Name</label></th>
			<td>
				<input type="text" dir="ltr" id="field_id_341" class="input" name="field_id_341" value="{title}" maxlength="256" size="40" />
				<p class="instructions">Name of the event location.</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_337">* Address</label></th>
			<td><input type="text" dir="ltr" id="field_id_337" class="input" name="field_id_337" value="{location_address}" maxlength="256" size="30" /><br></td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_338">* City</label></th>
			<td><input type="text" dir="ltr" id="field_id_338" class="input" name="field_id_338" value="{location_city}" maxlength="256" size="25" /><br></td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_339">* State</label></th>
			<td>
				<select name="field_id_339" class="input"> 
					<option value="--"{if location_state=="--"} selected="selected"{/if}>Select State</option>
					<option value="AL"{if location_state=="AL"} selected="selected"{/if}>Alabama</option>
					<option value="AK"{if location_state=="AK"} selected="selected"{/if}>Alaska</option>
					<option value="AZ"{if location_state=="AZ"} selected="selected"{/if}>Arizona</option>
					<option value="AR"{if location_state=="AR"} selected="selected"{/if}>Arkansas</option>
					<option value="CA"{if location_state=="CA"} selected="selected"{/if}>California</option>
					<option value="CO"{if location_state=="CO"} selected="selected"{/if}>Colorado</option>
					<option value="CT"{if location_state=="CT"} selected="selected"{/if}>Connecticut</option>
					<option value="DE"{if location_state=="DE"} selected="selected"{/if}>Delaware</option>
					<option value="DC"{if location_state=="DC"} selected="selected"{/if}>District of Columbia</option>
					<option value="FL"{if location_state=="FL"} selected="selected"{/if}>Florida</option>
					<option value="GA"{if location_state=="GA"} selected="selected"{/if}>Georgia</option>
					<option value="HI"{if location_state=="HI"} selected="selected"{/if}>Hawaii</option>
					<option value="ID"{if location_state=="ID"} selected="selected"{/if}>Idaho</option>
					<option value="IL"{if location_state=="IL"} selected="selected"{/if}>Illinois</option>
					<option value="IN"{if location_state=="IN"} selected="selected"{/if}>Indiana</option>
					<option value="IA"{if location_state=="IA"} selected="selected"{/if}>Iowa</option>
					<option value="KS"{if location_state=="KS"} selected="selected"{/if}>Kansas</option>
					<option value="KY"{if location_state=="KY"} selected="selected"{/if}>Kentucky</option>
					<option value="LA"{if location_state=="LA"} selected="selected"{/if}>Louisiana</option>
					<option value="ME"{if location_state=="ME"} selected="selected"{/if}>Maine</option>
					<option value="MD"{if location_state=="MD"} selected="selected"{/if}>Maryland</option>
					<option value="MA"{if location_state=="MA"} selected="selected"{/if}>Massachusetts</option>
					<option value="MI"{if location_state=="MI"} selected="selected"{/if}>Michigan</option>
					<option value="MN"{if location_state=="MN"} selected="selected"{/if}>Minnesota</option>
					<option value="MS"{if location_state=="MS"} selected="selected"{/if}>Mississippi</option>
					<option value="MO"{if location_state=="MO"} selected="selected"{/if}>Missouri</option>
					<option value="MT"{if location_state=="MT"} selected="selected"{/if}>Montana</option>
					<option value="NE"{if location_state=="NE"} selected="selected"{/if}>Nebraska</option>
					<option value="NV"{if location_state=="NV"} selected="selected"{/if}>Nevada</option>
					<option value="NH"{if location_state=="NH"} selected="selected"{/if}>New Hampshire</option>
					<option value="NJ"{if location_state=="NJ"} selected="selected"{/if}>New Jersey</option>
					<option value="NM"{if location_state=="NM"} selected="selected"{/if}>New Mexico</option>
					<option value="NY"{if location_state=="NY"} selected="selected"{/if}>New York</option>
					<option value="NC"{if location_state=="NC"} selected="selected"{/if}>North Carolina</option>
					<option value="ND"{if location_state=="ND"} selected="selected"{/if}>North Dakota</option>
					<option value="OH"{if location_state=="OH"} selected="selected"{/if}>Ohio</option>
					<option value="OK"{if location_state=="OK"} selected="selected"{/if}>Oklahoma</option>
					<option value="OR"{if location_state=="OR"} selected="selected"{/if}>Oregon</option>
					<option value="PA"{if location_state=="PA"} selected="selected"{/if}>Pennsylvania</option>
					<option value="PR"{if location_state=="PR"} selected="selected"{/if}>Puerto Rico</option>
					<option value="RI"{if location_state=="RI"} selected="selected"{/if}>Rhode Island</option>
					<option value="SC"{if location_state=="SC"} selected="selected"{/if}>South Carolina</option>
					<option value="SD"{if location_state=="SD"} selected="selected"{/if}>South Dakota</option>
					<option value="TN"{if location_state=="TN"} selected="selected"{/if}>Tennessee</option>
					<option value="TX"{if location_state=="TX"} selected="selected"{/if}>Texas</option>
					<option value="UT"{if location_state=="UT"} selected="selected"{/if}>Utah</option>
					<option value="VT"{if location_state=="VT"} selected="selected"{/if}>Vermont</option>
					<option value="VA"{if location_state=="VA"} selected="selected"{/if}>Virginia</option>
					<option value="VI"{if location_state=="VI"} selected="selected"{/if}>Virgin Islands</option>
					<option value="WA"{if location_state=="WA"} selected="selected"{/if}>Washington</option>
					<option value="WV"{if location_state=="WV"} selected="selected"{/if}>West Virginia</option>
					<option value="WI"{if location_state=="WI"} selected="selected"{/if}>Wisconsin</option>
					<option value="WY"{if location_state=="WY"} selected="selected"{/if}>Wyoming</option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_340">*&nbsp;Zip Code</label></th>
			<td><input type="text" dir="ltr" id="field_id_340" class="input" name="field_id_340" value="{location_zip}" maxlength="9" size="5" /><br></td>
		</tr>
		{/exp:weblog:entries}
		<tr>
			<th scope="row"><label for="field_id_35">*&nbsp;Description</label></th>
			<td>
				<textarea id="field_id_35" class="input" name="field_id_35" dir="ltr" cols="34" rows="12"></textarea>
				<p class="instructions">Should include event description, contact information, registration instructions, etc.<br><strong>Note:</strong> To preserve formatting click on the Paste from Word button.</p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="field_id_35">*&nbsp;Categories</label>
			</th>
			<td>
				<br>
				<p class="instructions"><strong>Please select at least one category for your event.</strong></p>
				<ul class="inputs">
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="374" /> <span>Finding Peace</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="371" /> <span>Fitness</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="376" /> <span>Health Expo</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="369" /> <span>Heart Disease Prevention</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="372" /> <span>Improving Mental Performance</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="367" /> <span>Natural Remedies</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="375" /> <span>Overcoming Depression</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="373" /> <span>Reducing Stress</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="365" /> <span>Reversing Diabetes</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="439" /> <span>Reversing Disease Seminar</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="370" /> <span>Stop Smoking</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="366" /> <span>Vegetarian Cooking</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="368" /> <span>Weight Management</span></label></li>
				</ul>
			</td>
		</tr>
		<tr class="hidden">
			<td>
				<input name="start-date" id="start-date" class="date-pick" />
				<input name="end-date" id="end-date" class="date-pick" />
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<div class="button-wrap">
					<button type="submit" class="super green button"><span>Save</span></button>
					<button type="reset" class="super secondary button"><span>Reset</span></button>
				</div>
			</td>
		</tr>
	</table>
{/exp:weblog:entry_form}
{/exp:user:stats}
</div><!-- /.left -->
<div class="right sidebar">
	<div class="bar">Add Events</div>
		<p>To view or edit an event, click <a href="/sponsors/edit-event">here</a>.</p>
		<p><strong>IMPORTANT:</strong> Please create a separate entry for each day of an event that does not fall on consecutive days.</p>
		<p>Only approved {site_name} events may be added. If your event type does not fit one of the categories below, please email <a href="mailto:club@newstart.com">club@newstart.com</a> or call 530-422-7993 before adding your event. Please note that club events should generally be offered free or at low cost.</p>
</div>
</div><!-- /.grid23 -->
{embed="embeds/_doc-bottom" script_add="jquery.date.min|jquery.datePicker.min|jquery.maskedinput-1.3.min|sponsors-masking|sponsors"}