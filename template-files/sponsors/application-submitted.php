<?php

if (isset($_POST['sponsorName']))
{
$sponsorName = $_POST['sponsorName'];
$sponsorAddress = $_POST['sponsorAddress'];
$sponsorCity = $_POST['sponsorCity'];
$sponsorState = $_POST['sponsorState'];
$sponsorZipCode = $_POST['sponsorZipCode'];
$sponsorCountry = $_POST['sponsorCountry'];
$sponsorPhone = $_POST['sponsorPhone'];
$sponsorEmail = $_POST['sponsorEmail'];
$sponsorFax = $_POST['sponsorFax'];
$sponsorWebsite = $_POST['sponsorWebsite'];
$sponsorRegAff = $_POST['sponsorRegAff'];
$sponsorDescription = stripslashes($_POST['sponsorDescription']);
$sponsorNeedHelp = $_POST['sponsorNeedHelp'];

$contactName = $_POST['contactName'];
$contactAddress = $_POST['contactAddress'];
$contactCity = $_POST['contactCity'];
$contactState = $_POST['contactState'];
$contactZipCode = $_POST['contactZipCode'];
$contactPhone = $_POST['contactPhone'];
$contactEmail = $_POST['contactEmail'];
$applicantName = $_POST['applicantName'];
$applicantUsername = $_POST['applicantUsername'];

$subject = "Sponsor Application";

// To send HTML mail, the Content-type header must be set
	$headers	= 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From: '. $applicantName .' <'. $applicantUsername .'>' . "\r\n";

		// message
		$message = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>NEWSTART Lifestyle Club Sponsor Application</title>
<meta name="viewport" content="width=740">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<style type="text/css">
a {text-decoration: none;}
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
										<span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">Sponsor Application</span>
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
											<td style="font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">
												
												<div style="font-size:22px; font-weight:bold; padding-bottom: 10px; margin-top: 0; margin-bottom: 10px; border-bottom: 1px solid #ddd; color:#010101;">Sponsor Information</div>
												<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Name:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $sponsorName .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1.3; font-size:16px;">Address:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1.3; font-size:16px; color:#010101;">'. $sponsorAddress .'<br>'. $sponsorCity .', '. $sponsorState .' '. $sponsorZipCode .'<br>'. $sponsorCountry .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Phone:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $sponsorPhone .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Email:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $sponsorEmail .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Fax:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $sponsorFax .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Website:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $sponsorWebsite .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Religious Affiliation:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $sponsorRegAff .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Description:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $sponsorDescription .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Need Help:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $sponsorNeedHelp .'</td>
													</tr>
												</table>
												<div style="font-size:20px; font-weight:bold; padding-bottom: 10px; margin-top: 20px; margin-bottom: 10px; border-bottom: 1px solid #ddd; color:#010101;">Contact Information</div>
												<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Name:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $contactName .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1.3; font-size:16px;">Address:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1.3; font-size:16px; color:#010101;">'. $contactAddress .'<br>'. $contactCity .', '. $contactState .' '. $contactZipCode .'<br>'. $contactCountry .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Phone:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $contactPhone .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Email:</strong></td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $contactEmail .'</td>
													</tr>
												</table>
												<div style="font-size:18px; font-weight:bold; padding-bottom: 10px; margin-top: 26px; margin-bottom: 10px; border-bottom: 1px solid #ddd; color:#010101;">Assign to User</div>
												<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Name:</td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $applicantName .'</td>
													</tr>
													<tr>
														<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Username:</td>
														<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $applicantUsername .'</td>
													</tr>
												</table>
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
			
		</td>
	</tr>
</table>
</body>
</html>';
	
		// Mail it
		mail("cblood@weimar.org, club@newstart.com", $subject, stripslashes($message), $headers);
}

?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=860;" />

	<title>Sponsorship Application Sent | {site_name}</title>
	
	<meta name="author" content="{site_name}">
	
	<link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
	<link rel="stylesheet" href="{stylesheet='site/standalone'}" type="text/css" />
</head>
<body class="small">
	<div class="body">
		<?php if (isset($_POST['sponsorName'])) { ?>
			<h1>Application Sent</h1> 
			<p>A {site_name} representative will contact you shortly.</p>
			<p class="button-wrap">
				<a href="/" class="super green button"><span>Home</span></a>
			</p>
		<?php } else { ?>
			<h1>Your application is empty!</h1> 
			<p>It appears that you've reached this page without submitting the Sponsor Application.</p>
			<p class="button-wrap">
				<a href="/sponsors/apply" class="super green button"><span>Apply</span></a>
			</p>
		<?php } ?>
	</div>
</body>
</html>