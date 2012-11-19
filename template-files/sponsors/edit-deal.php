{embed="embeds/_doc-top" 
	class="sponsors"
	title='Edit {exp:channel:entries channel="deals" url_title="{segment_3}" limit="1"}&ldquo;{title}&rdquo;{/exp:channel:entries}'
	add="datepicker/datepicker"
	sponsor_type="
		{exp:user:stats dynamic='off'}
			{exp:channel:entries channel="locations" category='{member_sponsor_id}'}
				{location_type}
			{/exp:channel:entries}
		{/exp:user:stats}
		"
}

<ul class="trail">
	<li><a href="/sponsors">Home</a></li>
	<li><a href="/sponsors/edit-deals">Edit Deals</a></li>
</ul>

{exp:channel:entries channel="deals" entry_id="{segment_3}" limit="1" show_future_entries="yes"}
<div class="heading clearfix">
	<h1>Edit &ldquo;{title}&rdquo;</h1>
</div>
{/exp:channel:entries}
<div class="grid23 clearfix">
	<div class="main deals left">
	{sn_no-script}
	<h2>Deal Information</h2>
{exp:safecracker channel="deals" entry_id="{segment_3}" return="sponsors/edit-deals"}
	<table>
		<tr>
			<th scope="row"><label for="title">* Title</label></th>
			<td><input type="text" class="input" name="title" id="title" value="{title}" size="36" maxlength="100" onkeyup="liveUrlTitle();" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="deal_code">* Coupon Code</label></th>
			<td>
				<input type="text" dir="ltr" id="deal_code" class="input" name="deal_code" value="{deal_code}" maxlength="128" size="25" onBlur="this.value=couponcode(this.value);" /><br>
				<p class="instructions">Put your coupon code here. Example: <em>SUMMER25</em></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="deal_instructions">* Instructions</label></th>
			<td>
				{field:deal_instructions}
				<p class="instructions">Should include instructions for how your coupon is to be used.<br><strong>Note:</strong> To preserve formatting click on the Paste from Word button.</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="entry_date">* Beginning Date</label></th>
			<td>
				<input type="text" class="datepicker" id="entry_datepicker" readonly="readonly" value="{exp:low_nice_date date='{entry_date}' format='%m/%d/%Y'}" size="20"/>
				<input type="text" dir="ltr" id="entry_date" class="input hidden" name="entry_date" value="{entry_date}" maxlength="128" size="25" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="expiration_date">* Ending Date</label></th>
			<td>
				<input type="text" class="datepicker" id="expiration_datepicker" readonly="readonly" value="{exp:low_nice_date date='{expiration_date}' format='%m/%d/%Y'}" size="20"/>
				<input type="text" dir="ltr" id="expiration_date" class="input hidden" name="expiration_date" value="{expiration_date}" maxlength="128" size="25" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="deal_terms">* Terms</label></th>
			<td>
				<textarea id="deal_terms" class="input" name="deal_terms" dir="ltr" rows="5"></textarea>
				<p class="instructions">Example: <em>Limit one coupon per customer.</em></p>
				</div>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label>*&nbsp;Categories</label>
			</th>
			<td>
				<br>
				<p class="instructions"><strong>Please select at least one category for your deal.</strong></p>
				<ul class="inputs">
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="448" /> <span>In-store</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="449" /> <span>Online</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="446" /> <span>Product</span></label></li>
					<li><label><input class="checkbox" type="checkbox" name="category[]" value="447" /> <span>Service</span></label></li>
					{exp:user:stats dynamic="off"}<li class="hidden"><label><input class="checkbox" type="checkbox" name="category[]" value="{member_sponsor_id}" checked="checked" /> <span>{member_sponsor_id}</span></label></li>{/exp:user:stats}
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
{/exp:safecracker}
</div>

<div class="right sidebar">
	<header class="bar" data-icon="n">Edit Deal</header>
		<p>To view or edit a deal, click <a href="/sponsors/edit-deals">here</a>.</p>
	</div>
</div>
{embed="embeds/_doc-bottom" script_add="jquery-ui-1.8.21.custom.min|sponsors"}