{embed="includes/_doc-top" 
	channel="{channel}"
	sponsor_admin="yes"
	header="no"
	title="{title}"
	add="pp/prettyPhoto"}
{assign_variable:channel="sponsor_admin"}
{assign_variable:title="Sponsor Admin
{if segment_2 == 'events' && segment_3 == 'add'} | Create a new event{/if}
{if segment_2 == 'events' && segment_3 == 'edit'} | Edit Events{/if}
{if segment_2 == 'invite-members'} | Invite Members{/if}
{if segment_2 == 'email-members' || segment_3 == 'email'} | Email Members{/if}
{if segment_2 == 'resources'} | Resources{/if}
"}
<div class="body">
{if logged_out || (member_group != 1 && member_group != 13)}
	<h1><span>become a </span><strong>Sponsor</strong></h1>
			<p class="intro">Become a club sponsor and harness the power of <a href="{path='resources/detail/what-is-newstart'}">NEWSTART&reg;</a> in your health outreach!</p>
			<div class="grid12 clearafter">
				<div class="left">
					<h1>Benefits</h1>
					<ul>
						<li>Health seminar service and support</li>
						<li>Health survey and event promotional tools</li>
						<li>Online contact management system</li>
						<li>Discounts on NEWSTART&reg; books and DVDs</li>
					</ul>
					<p class="button-wrap">
						<a href="{path='{channel}/tour'}" class="super small secondary button"><span>Learn more &raquo;</span></a>
					</p>
				</div><!--/.left-->
				<div class="right">
				<p class="button-wrap">
					<a href="{path='{channel}/register'}" class="super green giant button"><span>Get Started &raquo;</span></a>
				</p>
					<h2>Already a Sponsor? <a href="{path='{channel}/signin'}" class="signin-link">Sign In</a></h2>
					<div class="clear" id="signin">
						{exp:member:login_form return="{site_url}{segment_1}/"}
						<table>
							<tr>
								<th scope="row"><label for="username">Email</label></th>
								<td><input type="text" class="input" id="email" name="username" value="" size="22" autocorrect="off" autocapitalize="off" /></td>
							</tr>
							<tr>
								<th scope="row"><label for="password">Password</label></th>
								<td><input type="password" class="input" id="password" name="password" size="22" /></td>
							</tr>
							{if auto_login}<tr>
								<th>&nbsp;</th>
								<td><input class='checkbox' type='checkbox' name='auto_login' value='1' />Keep me logged in</td>
							</tr>{/if}
							<tr>
								<th>&nbsp;</th>
								<td>
									<p class="button-wrap">
										<button type="submit" class="super green button"><span>Sign In</span></button>
									</p>
									<a href="{path='members/forgot-password'}">Forgot your password?</a>
								</td>
							</tr>
						</table>		
						{/exp:member:login_form}
					</div><!--/#signin-->
				</div><!--/.right-->
			</div>
		{/if}
{if logged_in && (group_id == '1' || group_id == '13')}
	{assign_variable:sponsor_zipcode="{exp:user:stats dynamic='off'}{exp:weblog:entries weblog='sponsors' category='{sponsor_number}' limit='1'}{sponsor_zip}{/exp:weblog:entries}{/exp:user:stats}"}

	{if segment_2 == ''}
		{embed="{channel}/_landing-page" channel="{channel}"}
	{/if}
	
	{if segment_2 == "events" && segment_3 == "add"}
		{exp:user:stats dynamic="off"}
			{embed="{channel}/_add-event" channel="{channel}" return="/{channel}/{segment_2}/edit/" categories="{sponsor_number}" sponsor_zip="{sponsor_zipcode}"}
		{/exp:user:stats}
	{/if}
	
	{if segment_2 == "events" && segment_3 == "edit"}
		{exp:user:stats dynamic="off"}
			{embed="{channel}/_edit-event" channel="{channel}" sponsor_number="{sponsor_number}" categories="{sponsor_number}"}
		{/exp:user:stats}
	{/if}
	
	{if segment_2 == "invite-members"}
		{exp:user:stats dynamic="off"}
			{embed="{channel}/_invite-members" sponsor_number="{sponsor_number}" channel="{channel}"}
		{/exp:user:stats}
	{/if}
	
	{if segment_2 == "email-members"}
			{if segment_3 != ""}
				<ul id="trail">
					<li><a href="{site_url}">Home</a></li>
					<li><a href="{path='{channel}/email-members'}">Member List</a></li>
				</ul>
			{/if}
		{exp:user:stats dynamic="off"}
			{embed="{channel}/_email-members" sponsor_number="{sponsor_number}" channel="{channel}" sponsor_zipcode="{sponsor_zipcode}"}
		{/exp:user:stats}
	{/if}
	
	{if segment_2 == "email"}
		{!--<h2>This page is under construction. Sorry for the inconvenience.</h2>
		{if member_id == 1}--}
		{exp:user:stats dynamic="off"}
			{embed="{channel}/_email" sponsor_number="{sponsor_number}" sponsor_zipcode="{sponsor_zipcode}" channel="{channel}"}
		{/exp:user:stats}
		{!--{/if}--}
	{/if}
	
	{if segment_2 == "resources"}
		{exp:user:stats dynamic="off"}
			{embed="{channel}/_resources" sponsor_number="{sponsor_number}" channel="{channel}"}
		{/exp:user:stats}
	{/if}
	
{/if}
</div><!-- /.body -->
{embed="includes/_doc_bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|jquery.prettyPhoto_3.0|sponsor-admin"}