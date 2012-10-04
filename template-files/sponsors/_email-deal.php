<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once('utilities.php');
require_once('dbconnect.php');
	
//Event Members
$db = new DBconnect();
$queryDeal = '
SELECT 
		exp_member_data.member_id,
		exp_members.username,
		exp_member_data.m_field_id_3 AS first_name,
		exp_member_data.m_field_id_4 AS last_name
		
	FROM exp_members
		INNER JOIN member_relations
		ON exp_members.member_id = member_relations.member_id
		
		INNER JOIN exp_member_data
		ON exp_members.member_id = exp_member_data.member_id
		
	WHERE member_relations.related_id = {segment_4}
	AND member_relations.cat_id = {embed:sponsor_number}
	ORDER BY member_id DESC
			';

$queryResultsDeal = $db->fetch($queryDeal);
$queryCountDeal = count($queryResultsDeal);

if (isset($_POST['custom_message']))
{
	send_emails($queryResultsDeal, $_POST['email_subject'], $_POST['custom_message']);
}

function send_emails($mailing_list, $subject, $custom_message)
{
	// To send HTML mail, the Content-type header must be set
	$headers	= 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From: {exp:channel:categories show="{embed:sponsor_number}" weblog="locations" style="linear"}{category_name}{/exp:channel:categories} <club@newstart.com>' . "\r\n";
	$headers .= 'Reply-To: {exp:user:stats dynamic="off"}{member_first_name} {member_last_name}{/exp:user:stats} <{exp:user:stats dynamic="off"}{username}{/exp:user:stats}>' . "\r\n";
	
	$clubEmail = array(0, 'club@newstart.com', 'NEWSTART Lifestyle', 'Club');
	
	//Add club@newstart.com so that we can see all e-mails sent out.
	array_push($mailing_list, $clubEmail);
	
for ($i = 0; $i < count($mailing_list); $i++)
	{
		// message
		$message = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>NEWSTART Lifestyle Club Announcement</title>
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
										<span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">Announcement</span>
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
											<td style="font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1.5; font-size:16px; color:#010101;">';
											$message .= 'Dear '. $mailing_list[$i][2] .',<br />';
											$message .= $custom_message;
											$message .= '
											<p style="color:#010101;">{exp:user:stats dynamic="off"}{member_first_name} {member_last_name}{/exp:user:stats}<br />{exp:channel:categories show="{embed:sponsor_number}" weblog="locations" style="linear"}{category_name}{/exp:channel:categories}<br />
											<a href="http://newstartclub.com/location/{embed:sponsor_number}" style="color:#87A621;">newstartclub.com/location/{embed:sponsor_number}</a></p>
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
						You are receiving this e-mail because you are a member of the <a href="http://newstartclub.com" style="font-size:10px;color:#204C74; text-decoration:underline;">NEWSTART Lifestyle Club</a>.<br />
						You can update your status <a href="http://newstartclub.com/settings" style="font-size:10px;color:#204C74; text-decoration:underline;">here</a>.
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>
</body>
</html>';
	
		// Mail it
		//$headers .= 'To: $member' . "\n";
		mail($mailing_list[$i][1], stripslashes($subject), stripslashes($message), $headers);
	}

}

function show_form($listTotal)
{
	print '<div class="heading clearfix">
						<h1>{exp:channel:entries channel="deals" entry_id="{segment_4}" limit="1" show_future_entries="yes" dynamic="no" status="open|closed"}{title}{/exp:channel:entries} (&nbsp;'. $listTotal .'&nbsp;)</h1>
				</div>
				<div class="grid23 clearfix">
					<div class="left">
						<form method="post" action="">
							<table>
								<tr>
									<th scope="row"><label for="email_subject">Subject</label></th>
									<td><input type="text" name="email_subject" class="input" size="32" /></td>
								</tr>
								<tr>
									<th scope="row"><label for="custom_message">Message</label></th>
									<td>
										<textarea class="input" cols="38" rows="10" name="custom_message" id="custom-message"></textarea>
										<p class="instructions"><strong>Note:</strong> To preserve formatting click on the Paste from Word button.</p>
									</td>
								</tr>
								<tr>
									<th></th>
									<td>
										<p class="button-wrap">
											<button type="submit" class="super green button"><span>Send Email</span></button>
										</p>
									</td>
								</tr>
							</table>
						</form>
					</div>
					<div class="sidebar right">
						<header class="bar">Email Signature</header>
						<p>The following digital signature will be added to your message:</p>
						<p><strong>{exp:user:stats dynamic="off"}{member_first_name} {member_last_name}{/exp:user:stats}</strong><br />
						{exp:channel:categories show="{embed:sponsor_number}" weblog="locations" style="linear"}{category_name}{/exp:channel:categories}<br />
						<a href="http://newstartclub.com/location/{embed:sponsor_number}">newstartclub.com/location/{embed:sponsor_number}</a></p>
					</div>
				</div>';
}

function show_done($listRecipients)
{

	print '<div class="heading clearfix">
					<h1>Email sent</h1>
				</div>
				<div class="grid23 clearfix">
					<div class="left">
						<div class="post">
						<p>Your email was sent to the following members:</p>
						<ul id="sent-members-list">';
						
						for ($i = 0; $i < count($listRecipients); $i++)
						{
							print '<li><strong>'. $listRecipients[$i][2] .' '. $listRecipients[$i][3] .'</strong> ('. $listRecipients[$i][1] .')</li>';
						}
						
			print '</ul>
						<p class="button-wrap">
							<a href="{path=\'sponsors/email-members\'}" class="super red button"><span>Back to Member List</span></a>
						</p>
					</div>
				</div>
					<div class="sidebar right">
					</div>
				</div>';
}

if (isset($_POST['custom_message'])) { show_done($queryResultsDeal); } else { show_form($queryCountDeal); }

?>
