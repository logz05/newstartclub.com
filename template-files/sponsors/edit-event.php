{embed="embeds/_doc-top" 
	class="sponsors"
	title='Edit {exp:weblog:entries weblog="events" entry_id="{segment_3}" limit="1" show_future_entries="yes"}&ldquo;{title}&rdquo;{/exp:weblog:entries}'
	add="datepicker/datepicker"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}{sponsor_type}{/exp:weblog:categories}{/exp:user:stats}"
}

<ul id="trail">
	<li><a href="/sponsors">Home</a></li>
	<li><a href="/sponsors/edit-events">Edit Events</a></li>
</ul>

{exp:weblog:entries weblog="events" entry_id="{segment_3}" limit="1" show_future_entries="yes"}
<div class="heading clearfix">
	<h1>Edit &ldquo;{title}&rdquo;</h1>
</div>
<div class="grid23 clearfix">
	<div class="main events left">
	<noscript>
		<div class="alert-box warning">
			<p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
		</div>
	</noscript>
	<h2>Event Information</h2>
{exp:weblog:entry_form weblog="events" return="/sponsors/edit-events"}
	<table>
		<tr>
			<th scope="row"><label for="title">* Title</label></th>
			<td>
				<input type="text" class="input" name="title" id="title" value="{title}" size="36" maxlength="100" onkeyup="liveUrlTitle();" />
				<input type="hidden" name="entry_id" value="{entry_id}" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_25">* Start Date</label></th>
			<td>
				<input type="text" class="datepicker" id="entry_datepicker" readonly="readonly" value="{entry_date format='%m/%d/%Y'}" size="20"/>
				<input type="text" dir="ltr" id="entry_date" class="input hidden" name="entry_date" value="{entry_date format='%Y-%m-%d %g:%i %A'}" maxlength="128" size="25" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_26">* End Date</label></th>
			<td>
				<input type="text" class="datepicker" id="expiration_datepicker" readonly="readonly" value="{expiration_date format='%m/%d/%Y'}" size="20"/>
				<input type="text" dir="ltr" id="expiration_date" class="input hidden" name="expiration_date" value="{expiration_date format='%Y-%m-%d %g:%i %A'}" maxlength="128" size="25" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_33">Start Time</label></th>
			<td>
				<input type="text" dir="ltr" id="field_id_33" class="input" name="field_id_33" value="{event_start_time}" maxlength="128" size="25" /><br>
				<p class="instructions">Format time as 24 hour time.<br>
					12:00am = 00:00, 11:59pm = 23:59<br>
					<em>If all day event leave this field blank.</em></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_34">End Time</label></th>
			<td>
				<input type="text" dir="ltr" id="field_id_34" class="input" name="field_id_34" value="{event_end_time}" maxlength="128" size="25" /><br>
				<p class="instructions">Format time as 24 hour time.<br>
					12:00am = 00:00, 11:59pm = 23:59<br>
					<em>If all day event leave this field blank.</em></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_341">Name</label></th>
			<td>
				<input type="text" dir="ltr" id="field_id_341" class="input" name="field_id_341" value="{event_location_name}" maxlength="256" size="40" />
				<p class="instructions">Name of the event location.</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_337">* Address</label></th>
			<td><input type="text" dir="ltr" id="field_id_337" class="input" name="field_id_337" value="{event_address}" maxlength="256" size="30" /><br></td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_338">* City</label></th>
			<td><input type="text" dir="ltr" id="field_id_338" class="input" name="field_id_338" value="{event_city}" maxlength="256" size="25" /><br></td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_339">* State</label></th>
			<td>
				<select name="field_id_339" class="input"> 
					<option value="--"{if event_state=="--"} selected="selected"{/if}>Select State</option>
					<option value="AL"{if event_state=="AL"} selected="selected"{/if}>Alabama</option>
					<option value="AK"{if event_state=="AK"} selected="selected"{/if}>Alaska</option>
					<option value="AZ"{if event_state=="AZ"} selected="selected"{/if}>Arizona</option>
					<option value="AR"{if event_state=="AR"} selected="selected"{/if}>Arkansas</option>
					<option value="CA"{if event_state=="CA"} selected="selected"{/if}>California</option>
					<option value="CO"{if event_state=="CO"} selected="selected"{/if}>Colorado</option>
					<option value="CT"{if event_state=="CT"} selected="selected"{/if}>Connecticut</option>
					<option value="DE"{if event_state=="DE"} selected="selected"{/if}>Delaware</option>
					<option value="DC"{if event_state=="DC"} selected="selected"{/if}>District of Columbia</option>
					<option value="FL"{if event_state=="FL"} selected="selected"{/if}>Florida</option>
					<option value="GA"{if event_state=="GA"} selected="selected"{/if}>Georgia</option>
					<option value="HI"{if event_state=="HI"} selected="selected"{/if}>Hawaii</option>
					<option value="ID"{if event_state=="ID"} selected="selected"{/if}>Idaho</option>
					<option value="IL"{if event_state=="IL"} selected="selected"{/if}>Illinois</option>
					<option value="IN"{if event_state=="IN"} selected="selected"{/if}>Indiana</option>
					<option value="IA"{if event_state=="IA"} selected="selected"{/if}>Iowa</option>
					<option value="KS"{if event_state=="KS"} selected="selected"{/if}>Kansas</option>
					<option value="KY"{if event_state=="KY"} selected="selected"{/if}>Kentucky</option>
					<option value="LA"{if event_state=="LA"} selected="selected"{/if}>Louisiana</option>
					<option value="ME"{if event_state=="ME"} selected="selected"{/if}>Maine</option>
					<option value="MD"{if event_state=="MD"} selected="selected"{/if}>Maryland</option>
					<option value="MA"{if event_state=="MA"} selected="selected"{/if}>Massachusetts</option>
					<option value="MI"{if event_state=="MI"} selected="selected"{/if}>Michigan</option>
					<option value="MN"{if event_state=="MN"} selected="selected"{/if}>Minnesota</option>
					<option value="MS"{if event_state=="MS"} selected="selected"{/if}>Mississippi</option>
					<option value="MO"{if event_state=="MO"} selected="selected"{/if}>Missouri</option>
					<option value="MT"{if event_state=="MT"} selected="selected"{/if}>Montana</option>
					<option value="NE"{if event_state=="NE"} selected="selected"{/if}>Nebraska</option>
					<option value="NV"{if event_state=="NV"} selected="selected"{/if}>Nevada</option>
					<option value="NH"{if event_state=="NH"} selected="selected"{/if}>New Hampshire</option>
					<option value="NJ"{if event_state=="NJ"} selected="selected"{/if}>New Jersey</option>
					<option value="NM"{if event_state=="NM"} selected="selected"{/if}>New Mexico</option>
					<option value="NY"{if event_state=="NY"} selected="selected"{/if}>New York</option>
					<option value="NC"{if event_state=="NC"} selected="selected"{/if}>North Carolina</option>
					<option value="ND"{if event_state=="ND"} selected="selected"{/if}>North Dakota</option>
					<option value="OH"{if event_state=="OH"} selected="selected"{/if}>Ohio</option>
					<option value="OK"{if event_state=="OK"} selected="selected"{/if}>Oklahoma</option>
					<option value="OR"{if event_state=="OR"} selected="selected"{/if}>Oregon</option>
					<option value="PA"{if event_state=="PA"} selected="selected"{/if}>Pennsylvania</option>
					<option value="PR"{if event_state=="PR"} selected="selected"{/if}>Puerto Rico</option>
					<option value="RI"{if event_state=="RI"} selected="selected"{/if}>Rhode Island</option>
					<option value="SC"{if event_state=="SC"} selected="selected"{/if}>South Carolina</option>
					<option value="SD"{if event_state=="SD"} selected="selected"{/if}>South Dakota</option>
					<option value="TN"{if event_state=="TN"} selected="selected"{/if}>Tennessee</option>
					<option value="TX"{if event_state=="TX"} selected="selected"{/if}>Texas</option>
					<option value="UT"{if event_state=="UT"} selected="selected"{/if}>Utah</option>
					<option value="VT"{if event_state=="VT"} selected="selected"{/if}>Vermont</option>
					<option value="VA"{if event_state=="VA"} selected="selected"{/if}>Virginia</option>
					<option value="VI"{if event_state=="VI"} selected="selected"{/if}>Virgin Islands</option>
					<option value="WA"{if event_state=="WA"} selected="selected"{/if}>Washington</option>
					<option value="WV"{if event_state=="WV"} selected="selected"{/if}>West Virginia</option>
					<option value="WI"{if event_state=="WI"} selected="selected"{/if}>Wisconsin</option>
					<option value="WY"{if event_state=="WY"} selected="selected"{/if}>Wyoming</option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_340">*&nbsp;Zip Code</label></th>
			<td><input type="text" dir="ltr" id="field_id_340" class="input" name="field_id_340" value="{event_zip}" maxlength="9" size="5" /><br></td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_35">*&nbsp;Description</label></th>
			<td>
				<textarea id="field_id_35" class="input" name="field_id_35" dir="ltr" cols="34" rows="12">{event_description}</textarea>
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
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="374" {categories show="374"} {if category_id=="374"}checked="checked" {/if}{/categories}/> <span>Finding Peace</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="371" {categories show="371"} {if category_id=="371"}checked="checked" {/if}{/categories}/> <span>Fitness</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="376" {categories show="376"} {if category_id=="376"}checked="checked" {/if}{/categories}/> <span>Health Expo</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="369" {categories show="369"} {if category_id=="369"}checked="checked" {/if}{/categories}/> <span>Heart Disease Prevention</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="372" {categories show="372"} {if category_id=="372"}checked="checked" {/if}{/categories}/> <span>Improving Mental Performance</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="367" {categories show="367"} {if category_id=="367"}checked="checked" {/if}{/categories}/> <span>Natural Remedies</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="375" {categories show="375"} {if category_id=="375"}checked="checked" {/if}{/categories}/> <span>Overcoming Depression</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="373" {categories show="373"} {if category_id=="373"}checked="checked" {/if}{/categories}/> <span>Reducing Stress</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="365" {categories show="365"} {if category_id=="365"}checked="checked" {/if}{/categories}/> <span>Reversing Diabetes</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="439" {categories show="439"} {if category_id=="439"}checked="checked" {/if}{/categories}/> <span>Reversing Disease Seminar</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="370" {categories show="370"} {if category_id=="370"}checked="checked" {/if}{/categories}/> <span>Stop Smoking</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="366" {categories show="366"} {if category_id=="366"}checked="checked" {/if}{/categories}/> <span>Vegetarian Cooking</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="368" {categories show="368"} {if category_id=="368"}checked="checked" {/if}{/categories}/> <span>Weight Management</span></label></li>
					{categories show_group="24"}<li class="hidden"><label><input class="checkbox" type="checkbox" name="category[]" value="{category_id}" checked="checked" /> <span>{category_name}</span></label></li>{/categories}
				</ul>
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
{/exp:weblog:entries}
</div>

<div class="right sidebar">
	<div class="bar" data-icon="e">Edit Event</div>
		<p>To view or edit a event, click <a href="/sponsors/edit-events">here</a>.</p>
	</div>
</div>
{embed="embeds/_doc-bottom" script_add="jquery-ui-1.8.21.custom.min|jquery.maskedinput-1.3.min|sponsors-masking|sponsors"}