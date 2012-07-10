{embed="embeds/_doc-top" 
	class="sponsors"
	title="Create a new deal"
	add="datepicker/datepicker"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:weblog:categories show="{sponsor_number}" weblog="locations" style="linear"}{sponsor_type}{/exp:weblog:categories}{/exp:user:stats}"
}
<div class="heading clearfix">
	<h1>Create a new deal</h1>
</div>
<div class="grid23 clearfix">
	<div class="main events left">
	<noscript>
		<div class="alert-box warning">
			<p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
		</div>
	</noscript>
	<h2>Deal Information</h2>
{exp:user:stats dynamic="off"}
{exp:weblog:entry_form weblog="deals" return="/sponsors/edit-deals" category="{sponsor_number}"}
	<table>
		<tr>
			<th scope="row"><label for="title">* Title</label></th>
			<td><input type="text" class="input" name="title" id="title" value="{title}" size="36" maxlength="100" onkeyup="liveUrlTitle();" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_374">* Coupon Code</label></th>
			<td>
				<input type="text" dir="ltr" id="field_id_374" class="input" name="field_id_374" value="" maxlength="128" size="25" onBlur="this.value=couponcode(this.value);" /><br>
				<p class="instructions">Put your coupon code here. Example: <em>SUMMER12</em></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="field_id_375">* Instructions</label></th>
			<td>
				<textarea id="field_id_375" class="input" name="field_id_375" dir="ltr" cols="34" rows="6"></textarea>
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
			<th scope="row"><label for="field_id_378">* Terms</label></th>
			<td>
				<textarea id="field_id_378" class="input" name="field_id_378" dir="ltr" cols="34" rows="5"></textarea>
				<p class="instructions">Example: <em>Limit one coupon per customer.</em></p>
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
</div>
<div class="right sidebar">
	<div class="bar" data-icon="n">Add Deals</div>
		<p>To view or edit a deal, click <a href="/sponsors/edit-deals">here</a>.</p>
		<p><strong>IMPORTANT</strong>: Only deals for health related products and services may be added. For questions, please email <a href="mailto:club@newstart.com">club@newstart.com</a> or call 530-422-7993.</p>
</div>
</div>
{embed="embeds/_doc-bottom" script_add="jquery-ui-1.8.21.custom.min|sponsors"}