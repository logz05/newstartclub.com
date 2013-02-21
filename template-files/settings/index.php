{gv_doc-top}

<head>
	{sn_default-metatags}
	
	{embed="embeds/_page-title" 
		title="Settings"
		section=""
	}
	
	{sn_styles}
	{gv_modernizr}
</head>

<body>

	<header class="header">
		{sn_nav-super}
		{sn_masthead}
		{sn_nav-main}
		<b class="shadow-left"></b>
		<b class="shadow-right"></b>
	</header>

	<div class="body  members">
		
		<header class="heading">
			<h1 class="post__title" data-icon="j">Member Settings</h1>
		</header>
		
		<div class="grid23  clearfix">
		
			<div class="main  left">

				<?php
				
				if( isset( $_SESSION['settingsUpdated'] ) && $_SESSION['settingsUpdated'] == true ) {
					echo '<div class="alert-box success">
								<p><i class="i"></i>Your settings have been saved!</p></div>';
				}
				//reset this now that we've given our message.
				$_SESSION['settingsUpdated'] = false;
				
				?>
		
				{sn_no-script}
	
				{exp:user:edit form:class="clearfix" form:name="settings" form:id="settings" return="settings" error_page="members/error" password_required="y" dynamic="no"}
					<h2 class="first">Subjects you are interested in:</h2>
					<div class="grid12-23 clearfix">
						<div class="left">
							<ul>
							{categories group_id="14" orderby="category_order"}{category_selected} checked="checked"{/category_selected}
							{category_body}<li><label><input type="checkbox" class="input checkbox" name="category[]" value="{category_id}"{selected} /><span>{category_description}</span></label></li>
							{/category_body}{/categories}
							</ul>
						</div>
						<div class="right">
							<h3>Emotional and social health:</h3>
							<ul>
							{categories group_id="15" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
							{category_body}<li><label><input type="checkbox" class="input checkbox" name="category[]" value="{category_id}"{selected} /><span>{category_description}</span></label></li>
							{/category_body}{/categories}
							</ul>
						</div>
					</div>
					<h3>I would like information on:</h3>
					<ul>
					{categories group_id="16" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
					{category_body}<li><label><input type="checkbox" class="input checkbox" name="category[]" value="{category_id}"{selected} /><span>{category_description}</span></label></li>
					{/category_body}{/categories}
					</ul>
			
					<h2>Profile Information</h2>
					<table>
						<tr>
							<th scope="row" width="178"><label for="member_first_name">First Name</label></th>
							<td><input type="text" class="input" name="member_first_name" id="member_first_name" value="{member_first_name}" size="20" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="member_last_name">Last Name</label></th>
							<td><input type="text" class="input" name="member_last_name" id="member_last_name" value="{member_last_name}" size="20" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="member_address">Address</label></th>
							<td><input type="text" class="input" id="member_address" name="member_address" value="{member_address}" size="32" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="member_city">City</label></th>
							<td><input type="text" class="input" id="member_city" name="member_city" value="{member_city}" size="24" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="member_state">State</label></th>
							<td><input type="text" class="input" id="member_state" name="member_state" value="{member_state}" size="10" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="member_zip">Zip Code</label></th>
							<td><input type="text" class="input" id="member_zip" name="member_zip" value="{member_zip}" size="7" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="member_country">Country</label></th>
							<td>
								<input type="text" class="input" id="member_country" name="member_country" value="{member_country}" size="30" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="member_phone">Phone</label></th>
							<td><input type="text" class="input" id="member_phone" name="member_phone" value="{member_phone}" size="15" /></td>
						</tr>
					</table>
					
					<h2>Account</h2>
					<table>
						<tr>
							<th scope="row"><label for="username">Email</label></th>
							<td>
								<input class="input" type="text" name="username" id="username" value="{username}" size="25" />
								<input class="hidden" type="hidden" name="email" id="email" value="{username}" />
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="password">New Password</label></th>
							<td><input type="password" class="input" id="password" name="password" size="20" autocomplete="off" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="password_confirm">Confirm New Password</label></th>
							<td><input type="password" class="input" id="password_confirm" name="password_confirm" size="20" autocomplete="off" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="current_password" class="req">Current Password</label></th>
							<td>
								<input type="password" class="input" id="current_password" name="current_password" size="20" autocomplete="off" />
								<input type="hidden" name="member_terms_conditions" value="on" />
							</td>
						</tr>
						<tr>
							<th></th>
							<td>
								<input type="hidden" name="update" value="updated" />
								<div class="button-wrap">
									<button type="submit" class="super green button"><span>Update</span></button>
									<a id="delete-account" class="right" href="{path='delete-account'}"><span>&times;</span> Delete Account&hellip;</a>
								</div>
							</td>
						</tr>
					</table>
					
					{/exp:user:edit}
					
				</div><!--/.left-->
				
				
				<div class="sidebar  right">

					<header class="bar">Member Settings</header>
					<p>Please enter your current password to save changes.</p>
					
				</div>
				
			</div>
				
		</div>
		
		
{sn_footer}
{sn_scripts}

<script src="{site_url}/assets/js/jquery.validate.min.js"></script>
<script src="{site_url}/assets/js/member-settings.js"></script>

<script src="{site_url}/assets/js/jquery-ui-autocomplete.js"></script>
<script src="{site_url}/assets/js/jquery.select-to-autocomplete.min.js"></script>

<script type="text/javascript" charset="utf-8">

jQuery(document).ready(function($){

	$('#country_selector').selectToAutocomplete();

});
</script>

{gv_analytics}
</body>
</html>