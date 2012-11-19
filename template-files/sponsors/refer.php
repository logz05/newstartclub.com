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
		<form method="post" action="">
			<table>
				<tr>
					<th scope="row"><label for="referral_name">Name</label></th>
					<td><input type="text" name="referral_name" class="readonly input" size="32" value="Name here" readonly="readonly" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="custom_message">Comment</label></th>
					<td>
						<textarea class="input" cols="38" rows="10" name="custom_message" id="custom-message"></textarea>
						<p class="instructions"><strong>Note:</strong> Add your comment here: i.e. person will be available in a month</p>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						<div class="button-wrap">
							<button type="submit" class="super green button"><span>Send Referral</span></button>
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div class="sidebar right">
		<header class="bar">Refer</header>
		<p>When you refer someone to newstart...</p>
	</div>
</div>


{embed="embeds/_doc-bottom" script_add="sponsors"}