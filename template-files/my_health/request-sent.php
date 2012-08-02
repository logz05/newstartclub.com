{exp:user:stats}
	<?php
	
	if (isset($_POST['name']))
	{
	$memberName = $_POST['name']; 
	$memberAge = "{memberAge}"; 
	$memberAddress = "{address}, {city}, {state} {zipCode}"; 
	$memberPhone = $_POST['phone']; 
	$memberEmail = "{username}"; 
	$memberHS = "{memberScoreTotal}"; 
	$customMessage = $_POST['custom-message'];
	
	$todayis = date("l, F j, Y, g:i a") ;
	
	$subject = "Tell me more...";
	
	$message = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Information Request</title>
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
										<span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">Information Request</span>
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
												<p><strong>Name</strong>: '. $memberName .'</p>
												<p><strong>Age</strong>: '. $memberAge .'</p>
												<p><strong>Address</strong>: '. $memberAddress .'</p>
												<p><strong>Phone</strong>: '. $memberPhone .'</p>
												<p><strong>Email</strong>: '. $memberEmail .'</p>
												<p><strong>My Health Score</strong>: '. $memberHS .'</p>
												<p><strong>Message</strong>: '. $customMessage .'</p>
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
	
	// To send HTML mail, the Content-type header must be set
	$headers	 = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From: {firstName} {lastName} <{username}>' . "\r\n";
	$headers .= 'Bcc: ddennis@weimar.org, tbaril@weimar.org' . "\r\n";
	
	mail("club@newstart.com", $subject, stripslashes($message), $headers);
	}
	
	?>
{/exp:user:stats}
{embed="embeds/_doc-top" 
	class="my_health"
	title="Your request has been sent!"
	add="pp/prettyPhoto|vimeo"}
	<ul class="trail">
		<li><a href="/">Home</a></li>
		<li><a href="/my_health">My Health</a></li>
	</ul>
	<div class="heading clearfix">
		<h1>Congratulations!</h1>
	</div>
	<div class="grid23 clearfix">
		<div class="main left">
			<div class="post">
				<p>You have taken an important first step to improving your health naturally. A NEWSTART&reg; representative will contact you shortly. In the meantime, check out the following videos to find out how NEWSTART&reg; has helped others get well or visit <a href="http://www.newstart.com/" title="www.newstart.com">www.newstart.com</a> to learn more.</p>
				<div class="vimeoBadge">
					<script type="text/javascript" src="http://vimeo.com/weimartv/badgeo/?stream=channel&amp;stream_id=39106&amp;count=12&amp;thumbnail_width=100&amp;show_titles=yes"></script>
				</div>
				<p><a href="/my_health/results">&laquo; Back to my results</a></p>
			</div>
		</div>
		<div class="sidebar right">
			<header class="bar">Contact Us</header>
			<img src="/assets/images/my_health/NEWSTART.png" width="190" />
			<p class="center">20601 West Paoli Lane<br />Weimar, CA 95736</p>
			<p class="center">(800) 525-9192<br /><a href="http://www.newstart.com" title="NEWSTART&reg;">www.newstart.com</a></p>
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
<script type="text/javascript">
	$(document).ready(function(){
		$('.vimeoBadge .clip a').attr('rel', 'prettyPhoto');
		$('.vimeoBadge a img').attr('alt', 'NEWSTART Now');
		$('.vimeoBadge a img').attr('class', 'image');
		$(".clip").each(function(){
					alt = $(this).find("img").attr("alt");
					title = $(this).find(".caption a").text();
					$(this).find("> a").attr("title", title);
			});
		$(".vimeoBadge a[rel^='prettyPhoto']")
		.prettyPhoto({
			theme:'dark_rounded',
			animationSpeed: 'slow'
		});
	});
</script>
{embed="embeds/_doc-bottom" script_add="jquery.prettyPhoto_3.0"}