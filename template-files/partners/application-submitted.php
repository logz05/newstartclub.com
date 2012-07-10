<?php

function send_emails($from_name, $from_email, $subject, $custom_message)
{
	// To send HTML mail, the Content-type header must be set
	$headers	= 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From: '. $from_name .' <'. $from_email .'>' . "\r\n";

		// message
		$message = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>NEWSTART Lifestyle Club Partner Application</title>
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
										<span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">Partner Application</span>
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
											<td style="font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">';
												$message .= $custom_message;
												$message .= '
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
		mail("club@newstart.com", $subject, stripslashes($message), $headers);

}

function show_empty()
{
	print '
		<h1>Your application is empty!</h1> 
		<p>It appears that you&rsquo;ve reached this page without submitting the Partner Application.</p>
		<p class="button-wrap">
			<a href="/partners/apply" class="super green button"><span>Apply</span></a>
		</p>
	';
}

function show_done()
{

	print '
		<h1>Application Sent!</h1>
		<p>Thank you for submitting a partnership application!</p>
		<p>A {site_name} representative will contact you after your application has been reviewed.</p>
		<p class="button-wrap">
			<a href="/" class="super green button"><span>Home</span></a>
		</p>
	';
}

if (isset($_POST["name"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$credentials = $_POST["credentials"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];
	$phone = $_POST["phone"];
	$specialty = $_POST["specialty"];
	$bio = $_POST["bio"];
	$picture = $_FILES["picture"]["name"];
	$affiliation = $_POST["affiliation"];
	
	$message = '
		<div style="font-size:22px; font-weight:bold; padding-bottom: 10px; margin-top: 0; margin-bottom: 10px; border-bottom: 1px solid #ddd; color:#010101;">Partner Information</div>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr>
				<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Name:</strong></td>
				<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $name .'</td>
			</tr>
			<tr>
				<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Email:</strong></td>
				<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $email .'</td>
			</tr>
			<tr>
				<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Credentials:</strong></td>
				<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $credentials .'</td>
			</tr>
			<tr>
				<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1.3; font-size:16px;">Address:</strong></td>
				<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1.3; font-size:16px; color:#010101;">'. $address .'<br>'. $city .', '. $state .' '. $zip .'</td>
			</tr>
			<tr>
				<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Phone:</strong></td>
				<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $phone .'</td>
			</tr>
			<tr>
				<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Specialty:</strong></td>
				<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $specialty .'</td>
			</tr>
			<tr>
				<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Biography:</strong></td>
				<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $bio .'</td>
			</tr>
			<tr>
				<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Picture:</strong></td>
				<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $picture .'</td>
			</tr>
			<tr>
				<td align="right" width="150" valign="top" style="padding:0 15px 10px 0; color:#777; font-weight: 500; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px;">Affiliation:</strong></td>
				<td valign="top" style="padding: 0 0 10px 0; font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; font-weight: normal; line-height: 1; font-size:16px; color:#010101;">'. $affiliation .'</td>
			</tr>
		</table>
	';
	send_emails($name, $email, 'Partnership Application', $message);
}

if ($_FILES["picture"]["name"] != "") {
	if (
			(
				($_FILES["picture"]["type"] == "image/jpeg") ||
				($_FILES["picture"]["type"] == "image/pjpeg") ||
				($_FILES["picture"]["type"] == "image/png") ||
				($_FILES["picture"]["type"] == "image/tiff") ||
				($_FILES["picture"]["type"] == "image/bmp")
			) 
			&& ($_FILES["picture"]["size"] < 2000000)
		)
		{
		if ($_FILES["picture"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["picture"]["error"] . "<br />";
			}
		else
			{
			if (file_exists("assets/images/partners-upload/" . $_FILES["picture"]["name"]))
				{
				echo "<!-- ". $_FILES["picture"]["name"] . " already exists. -->";
				}
			else
				{
				move_uploaded_file($_FILES["picture"]["tmp_name"],
				"assets/images/partners-upload/" . $_FILES["picture"]["name"]);
				}
			}
		}
	else
		{
		echo "<!-- Invalid file -->";
		}
}

?>

<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>		 <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>		 <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>		 <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=860;" />
 
	<title>Partnership Application Submitted | {site_name}</title>
<?php

function fileModTime($filename) {

	$file = '/home/newstartclub/www/www-newstartclub-com/content' . $filename;
	
	if (file_exists($file)) {
		echo "?v=" . date("YmdHis", filemtime($file));
	}

}

?>
	<link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
	<link rel="stylesheet" href="{stylesheet='site/standalone'}" type="text/css" />
</head>
<body class="small">
	<div class="body">
		<?php 
			if (isset($_POST['name'])) {
				if (($_FILES["picture"]["name"] != "") && 
						(
							($_FILES["picture"]["type"] == "image/jpeg") ||
							($_FILES["picture"]["type"] == "image/pjpeg") ||
							($_FILES["picture"]["type"] == "image/png") ||
							($_FILES["picture"]["type"] == "image/tiff") ||
							($_FILES["picture"]["type"] == "image/bmp")
						) 
						&& ($_FILES["picture"]["size"] < 2000000)
					)
					{
						show_done();
					}
				else
					{
						print '
							<h1>Invalid File</h1>
							<p>The file you uploaded for your picture could not be recognized or was over 2MB. Please upload one of the following file types: .jpg, .bmp, .tiff, .png.</p>
							<form action="" method="post" enctype="multipart/form-data">
								<input type="hidden" name="name" class="input" id="name" size="25" value="'. $name .'" />
								<input type="file" name="picture" id="picture" />
								<div class="button-wrap">
									<button type="submit" class="super green button"><span>Submit</span></button>
								</div>
							</form>
						';
					}
				}
			else
				{
					show_empty();
				}
		?>
	</div>
</div>
</body>
</html>