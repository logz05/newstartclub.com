<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once 'member_relations.php';
require_once 'dbconnect.php';

$db = new DBconnect();

function send_emails($fname, $lname, $email, $password)
{
	// To send HTML mail, the Content-type header must be set
	$headers	= 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From: NEWSTART Lifestyle Club <club@newstart.com>' . "\r\n";

	// message
	$message = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Welcome to the Club!</title>
<meta name="viewport" content="width=740">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<style type="text/css">
a {text-decoration: none;color:#87A621;}
a:hover {text-decoration: underline;}
	
</style>
<!--[if gte mso 9]>
<style type="text/css">
table,td,div,p {font-family:\'Helvetica Neue\', Arial, Helvetica, Lucida Sans, Lucida Sans Unicode, Lucida Grande sans-serif !important;}
</style>
<![endif]-->
<!--[if lte mso 7]>
<style type="text/css">
table,td,div,p {font-family:\'Helvetica Neue\', Arial, Helvetica, Lucida Sans, Lucida Sans Unicode, Lucida Grande sans-serif !important;}
</style>
<![endif]-->
</head>
<body bgcolor="#509ADE" style="margin:0; padding:0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td style="padding:20px 20px 40px 20px; background-color:#509ADE" bgcolor="#509ADE">
			
			<!-- BEGIN MAIN CONTENT -->
			<table width="550" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0 auto;">
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
							<tr>
								<td width="550" valign="top" colspan="3">
									<img src="http://newstartclub.com/assets/images/email/newsletter/email-header.jpg" alt="NEWSTART Lifestyle Club" width="550" border="0" style="display:block;margin:0">
								</td>
							</tr>
							<tr>
								<td width="2" valign="top" style="background-image: url(http://newstartclub.com/assets/images/email/newsletter/email-left-shadow.jpg);"></td>
								<td width="550" valign="middle" height="60" align="right" bgcolor="#000000" style="background-image: url(http://newstartclub.com/assets/images/email/newsletter/nav-texture.png); background-color:#000000">
									<div style="font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size:30px; color:#ffffff; padding: 12px 30px;">
										<span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">Welcome to the</span> <span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;font-weight:bold;">Club</span>
									</div>
								</td>
								<td width="2" valign="top" style="background-image: url(http://newstartclub.com/assets/images/email/newsletter/email-right-shadow.jpg);"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="550" style="background-color:#ffffff" bgcolor="#ffffff">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0">
							<tr>
								<td width="2" valign="top" style="background-image: url(http://newstartclub.com/assets/images/email/newsletter/email-left-shadow.jpg);"></td>
								<td width="30" bgcolor="#ffffff" valign="top"></td>
								<td width="486" style="font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1.2; font-size:16px; color:#010101;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0">
										<tr>
											<td height="30"></td>
										</tr>
										<tr>
											<td style="font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1.5; font-size:16px; color:#010101;">
											<p>Dear ';
						$message .= $fname;
						$message .= ',</p>
									<p>As a registered member, you now have access to:</p>
									 <ul>
										<li>Live streaming videos</li>
										<li>Local seminars & events</li>
										<li>Expert health advice</li>
										<li>Wellness tips & tools</li>
										<li>FREE membership</li>
									 </ul>
									 <p>To get started, log in to <a href="http://newstartclub.com/signin" style="color:#87A621;">http://newstartclub.com/signin</a> using the following:</p>
									 <p><strong>Username:</strong> <a href="mailto:'. $email .'" style="color:#87A621;">'. $email .'</a><br /><strong>Password:</strong> '. $password .'</p>
									 <p>If you ever wish to change your password, visit <a href="http://newstartclub.com/settings" style="color:#87A621;">http://newstartclub.com/settings</a>.</p>
									<span>Enjoy,<br />
									The NEWSTART Lifestyle Club Team<br />
									<a href="http://newstartclub.com/" style="color:#87A621;">newstartclub.com</a></span><br /><br />
									<span>P.S. As our way of saying thanks for joining, please click <a href="http://newstartclub.com/downloads/sponsor-resources/common-files/NEWSTART-Planner.pdf" style="color:#87A621;">here</a> to download your free NEWSTART&reg; Daily Planner.</span>
											</td>
										</tr>
										<tr>
											<td height="10"></td>
										</tr>
									</table>
								</td>
								<td width="30" bgcolor="#ffffff" valign="top"></td>
								<td width="2" valign="top" style="background-image: url(http://newstartclub.com/assets/images/email/newsletter/email-right-shadow.jpg);"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="550" valign="top" colspan="3">
						<img src="http://newstartclub.com/assets/images/email/newsletter/email-footer.jpg" alt="footer" width="550" border="0" style="display:block;margin:0">
					</td>
				</tr>
			</table>
			
			<!--BEGIN FOOTER-->
			<table width="550" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0 auto">
				<tr>
					<td style="padding:15px 20px 0 20px; font-family: \'Lucida Grande\', \'Lucida Sans Unicode\', Verdana, sans-serif !important; font-size:10px; line-height: 1.34em; color:#204C74" align="center">
						A FREE community service of <a href="http://newstart.com" style="font-size:10px;color:#204C74; text-decoration:underline;">NEWSTART&reg;</a>. &copy;'. date("Y") .'. All Rights Reserved.
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>
</body>
</html>';

	// Mail it
	mail($email, 'Welcome to the Club!', stripslashes($message), $headers);
}
?>
{exp:user:stats dynamic="off"}
	{if member_welcome_email !="1"}
		<?php
		
			send_emails('{member_first_name}', '{member_last_name}', '{username}', $_SESSION['jsPassword']);
			
			//Update member profile to show that email has been sent.
			$query = "UPDATE exp_member_data SET m_field_id_24 = 1 WHERE member_id = {member_id}";
			
			$db->query($query);
			
			$db = null; // force the class destructor to run
		
		?>
	{/if}
{/exp:user:stats}

{embed="embeds/_doc-top" 
	class="members"
	title="Update Profile"
}
	<div class="heading">
		<h1>Update Profile</h1>
	</div>
	<div class="grid23 clearfix">
		<div class="main left">
	
			<h2 class="first">To better serve your health needs, please take a moment to indicate the areas you&rsquo;re interested in.</h2>
			
		{exp:user:edit return="/my-health" form:class="clearfix" form:id="update-profile"}
			<h2>Check the subjects you are interested in</h2>
			<div class="grid12-23 clearfix">
				<div class="left">
					<ul>
						{categories group_id="14" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
						{category_body}<li><label><input type="checkbox" name="category[]" class="input checkbox" value="{category_id}" {selected} /><span>{category_description}</span></label></li>
						{/category_body}{/categories}
					</ul>
				</div>
				<div class="right">
					<h3>Emotional and social health:</h3>
					<ul>
						{categories group_id="15" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
						{category_body}<li><label><input type="checkbox" name="category[]" class="input checkbox" alue="{category_id}" {selected} /><span>{category_description}</span></label></li>
						{/category_body}{/categories}
					</ul>
				</div>
			</div>

			<h3>I would like information on:</h3>
			<ul>
				{categories group_id="16" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
				{category_body}<li><label><input type="checkbox" name="category[]" class="input checkbox" value="{category_id}" {selected} /><span>{category_description}</span></label></li>
				{/category_body}{/categories}
			</ul>

			<input type="hidden" class="hidden" name="member_first_name" id="member_first_name" value="{member_first_name}" size="25" autocomplete="off" />
			<input type="hidden" class="hidden" name="member_last_name" id="member_last_name" value="{member_last_name}" size="25" autocomplete="off" />
			<input type="hidden" pattern="[0-9]*" class="hidden" id="member_zip" name="member_zip" value="{member_zip}" size="7" autocomplete="off" />
			
			<p><button type="submit" class="super green button"><span>Save</span></button></p>
			{/exp:user:edit}
		</div>
		<div class="sidebar right">
			<header class="bar">Update Profile</header>
			<p>To view or change your completed profile at anytime as well as update your password, click on &ldquo;Settings&rdquo; at the top of the page.</p>
			<div class="update-profile"></div>
		</div>
	</div>
{embed="embeds/_doc-bottom"}