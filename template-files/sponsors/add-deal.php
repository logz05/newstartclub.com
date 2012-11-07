{embed="embeds/_doc-top" 
	class="sponsors"
	title="Create a new deal"
	add="datepicker/datepicker"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:channel:categories show="{member_admin_id}" channel="locations" style="linear"}{sponsor_type}{/exp:channel:categories}{/exp:user:stats}"
}
<div class="heading clearfix">
	<h1>Create a new deal</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
	{sn_no-script}
	<h2>Deal Information</h2>

{exp:safecracker channel="deals" return="sponsors/edit-deals"}
	<table>
		<tr>
			<th scope="row"><label for="title">* Title</label></th>
			<td><input type="text" class="input" name="title" id="title" value="{title}" size="36" maxlength="100" onkeyup="liveUrlTitle();" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="deal_code">* Coupon Code</label></th>
			<td>
				<input type="text" dir="ltr" id="deal_code" class="input" name="deal_code" value="" maxlength="128" size="25" onBlur="this.value=couponcode(this.value);" /><br>
				<p class="instructions">Put your coupon code here. Example: <em>SUMMER25</em></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="deal_instructions">* Instructions</label></th>
			<td>
				<textarea id="deal_instructions" class="input" name="deal_instructions" dir="ltr" cols="34" rows="6"></textarea>
				<p class="instructions">Should include instructions for how your coupon is to be used.<br><strong>Note:</strong> To preserve formatting click on the Paste from Word button.</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="entry_date">* Beginning Date</label></th>
			<td>
				<input type="text" class="datepicker" id="entry_datepicker" readonly="readonly" value="{current_time format='%m/%d/%Y'}" size="20"/>
				<input type="text" dir="ltr" id="entry_date" class="input hidden" name="entry_date" value="{current_time format='%Y-%m-%d %g:%i %A'}" maxlength="128" size="25" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="expiration_date">* Ending Date</label></th>
			<td>
				<input type="text" class="datepicker" id="expiration_datepicker" readonly="readonly" value="" size="20"/>
				<input type="text" dir="ltr" id="expiration_date" class="input hidden" name="expiration_date" value="" maxlength="128" size="25" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="deal_terms">* Terms</label></th>
			<td>
				<textarea id="deal_terms" class="input" name="deal_terms" dir="ltr" cols="34" rows="5"></textarea>
				<p class="instructions">Example: <em>Limit one coupon per customer.</em></p>
				{exp:user:stats dynamic="off"}
				<div class="hidden">
				{exp:query sql="
					SELECT entry_id FROM exp_category_posts WHERE cat_id = {member_admin_id} LIMIT 1
				"}
					<input type="hidden" name="deal_location[selections][]" value="{entry_id}">
				{/exp:query}
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
					<li class="hidden"><label><input class="checkbox" type="checkbox" name="category[]" value="{member_admin_id}" checked="checked" /> <span>{member_admin_id}</span></label></li>
				{/exp:user:stats}
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
	<section class="section">
		<header class="bar" data-icon="n">Add Deals</header>
		<p>To view or edit a deal, click <a href="{path='sponsors/edit-deals'}">here</a>.</p>
		<p><strong>IMPORTANT</strong>: Only deals for health related products and services may be added. For questions, please email <a href="mailto:club@newstart.com">club@newstart.com</a> or call 530-422-7993.</p>
	</section>
	{if logged_in_member_id == 1}
	<section class="section mysection" style="display:none;">
		<header class="bar">Fade In</header>
		<p>This was loaded 2 seconds after the page was ready. Might use a fade in for forms to show that it's loading.</p>
	</section>
	<section class="section">
		<header class="bar">Test</header>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</section>
	{/if}
</div>
</div>
{embed="embeds/_doc-bottom" script_add="jquery-ui-1.8.21.custom.min|sponsors"}