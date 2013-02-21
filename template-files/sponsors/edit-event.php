{embed="embeds/_doc-top" 
	class="sponsors"
	title='Edit {exp:channel:entries channel="events" entry_id="{segment_3}" limit="1" show_future_entries="yes"}&ldquo;{title}&rdquo;{/exp:channel:entries}'
	add="datepicker/datepicker"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:channel:categories show="{member_sponsor_id}" channel="locations" style="linear"}{sponsor_type}{/exp:channel:categories}{/exp:user:stats}"
}

<ul class="trail">
	<li><a href="{path='sponsors'}">Home</a></li>
	<li><a href="{path='sponsors/edit-events'}">Edit Events</a></li>
</ul>

{exp:safecracker channel="events" entry_id="{segment_3}" preserve_checkboxes="yes" include_jquery="no" return="sponsors/edit-events"}
<div class="heading clearfix">
	<h1>Edit &ldquo;{title}&rdquo;</h1>
</div>
<div class="grid23 clearfix">
	<div class="main events left">
	{sn_no-script}
	<h2>Event Information</h2>
	<table>
		<tr>
			<th scope="row"><label for="title">* Title</label></th>
			<td>
				<input type="text" class="input" name="title" id="title" value="{title}" size="36" maxlength="100" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="entry_datepicker">* From</label></th>
			<td>
				<table>
					<tr>
						<td>
							<input type="text" class="datepicker" id="entry_datepicker" readonly="readonly" value="{exp:low_nice_date date='{entry_date}' format='%m/%d/%Y'}" size="14" title="Date. Expected format is month number, day number, year number." />
							<input type="text" dir="ltr" id="entry_date" readonly="readonly" class="input hidden" name="entry_date" value="{entry_date}" maxlength="128" size="25" />
						</td>
						<td>
							<div class="select-input">{field:event_start_time}</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="expiration_datepicker">* To</label></th>
			<td>
				<table>
					<tr>
						<td>
							<input type="text" class="datepicker" id="expiration_datepicker" readonly="readonly" value="{exp:low_nice_date date='{expiration_date}' format='%m/%d/%Y'}" size="14" title="Date. Expected format is month number, day number, year number." />
							<input type="text" dir="ltr" id="expiration_date" readonly="readonly" class="input hidden" name="expiration_date" value="{expiration_date}" maxlength="128" size="25" />
						</td>
						<td>
							<div class="select-input">{field:event_end_time}</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="event_location_name">* Place</label></th>
			<td>
				<input type="text" dir="ltr" id="event_location_name" class="input" name="event_location_name" value="{event_location_name}" maxlength="256" size="40" />
<!-- 				<p class="instructions">Name of the event location.</p> -->
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="event_address">* Address</label></th>
			<td>
				<textarea dir="ltr" id="event_address" class="input" name="event_address" rows="2">{event_address}</textarea>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="event_city">* City</label></th>
			<td><input type="text" dir="ltr" id="event_city" class="input" name="event_city" value="{event_city}" maxlength="256" size="25" /><br></td>
		</tr>
		<tr>
			<th scope="row"><label for="event_state">* State</label></th>
			<td>
				<select name="event_state" class="input">
					{options:event_state}
						<option value="{option_value}"{selected}>{option_name}</option>
					{/options:event_state}
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="event_zip">*&nbsp;Zip Code</label></th>
			<td><input type="text" dir="ltr" id="event_zip" class="input" name="event_zip" value="{event_zip}" maxlength="9" size="5" /><br></td>
		</tr>
		<tr>
			<th scope="row"><label for="event_image">*&nbsp;Image</label></th>
			<td>
				{field:event_image}
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="event_description">*&nbsp;Details</label></th>
			<td>
				{field:event_description}
				<p class="instructions">Should include event description, contact information, registration instructions, etc.<br><strong>Note:</strong> To preserve formatting click on the Paste from Word button.</p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label>*&nbsp;Categories</label>
			</th>
			<td>
				<br>
				<p class="instructions"><strong>Please select at least one category for your event.</strong></p>
				<ul class="inputs">
				{categories}{if '{category_group_id}' == '41'}<li><label><input class="checkbox" type="checkbox" name="category[]" value="{category_id}" {checked}/> <span>{category_name}</span></label></li>{/if}
				{/categories}
				{exp:user:stats dynamic="off"}<li class="hidden"><label><input class="checkbox" type="checkbox" name="category[]" value="{member_sponsor_id}" checked="checked" /> <span>{member_sponsor_id}</span></label></li>{/exp:user:stats}
				</ul>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<div class="button-wrap">
					<button type="submit" class="super green button"><span>Update</span></button>
				</div>
			</td>
		</tr>
	</table>
{/exp:safecracker}
</div>

<div class="right sidebar">
	<header class="bar" data-icon="e">Edit Event</header>
		<p>To view or edit an event, click <a href="{path='sponsors/edit-events'}">here</a>.</p>
	</div>
</div>
{embed="embeds/_doc-bottom" script_add="jquery-ui-1.8.21.custom.min|jquery.maskedinput-1.3.min|sponsors-masking|sponsors"}