<?php
// Do not show notice errors
error_reporting (0);

if(!empty($_FILES)) // Has the image been uploaded?
{
/* 
1 = Check if the file uploaded is actually an image no matter what extension it has
2 = The uploaded files must have a specific image extension
*/

$validation_type = 1;

if($validation_type == 1)
{
	$mime = array('image/gif' => 'gif',
									'image/jpeg' => 'jpeg',
									'image/png' => 'png',
									'application/x-shockwave-flash' => 'swf',
									'image/psd' => 'psd',
									'image/bmp' => 'bmp',
									'image/tiff' => 'tiff',
									'image/tiff' => 'tiff',
									'image/jp2' => 'jp2',
									'image/iff' => 'iff',
									'image/vnd.wap.wbmp' => 'bmp',
									'image/xbm' => 'xbm',
									'image/vnd.microsoft.icon' => 'ico');
}
else if($validation_type == 2) // Second choice? Set the extensions
{
	$image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp');
}

$upload_image_to_folder = '/home/weimaredu/newstartclub/sponsor_admin/uploads/sponsor_logos/';

$file = $_FILES['sponsorLogo'];

$file_name = $file['name'];

$error = ''; // Empty

// Get File Extension (if any)

$ext = strtolower(substr(strrchr($file_name, "."), 1));

// Check for a correct extension. The image file hasn't an extension? Add one

		if($validation_type == 1)
		{
		$file_info = getimagesize($_FILES['sponsorLogo']['tmp_name']);

			if(empty($file_info)) // No Image?
			{
			$error .= "the file you uploaded does not appear to be an image.";
			}
			else // An Image?
			{
			$file_mime = $file_info['mime'];

					if($ext == 'jpc' || $ext == 'jpx' || $ext == 'jb2')
					{
					$extension = $ext;
					}
					else
					{
					$extension = ($mime[$file_mime] == 'jpeg') ? 'jpg' : $mime[$file_mime];
					}

					if(!$extension)
					{
					$extension = '';
					$file_name = str_replace('.', '', $file_name); 
					}
			}
		}
		else if($validation_type == 2)
		{
			if(!in_array($ext, $image_extensions_allowed))
			{
			$exts = implode(', ',$image_extensions_allowed);
			$error .= "must have one of the following extensions: ".$exts;
			}

			$extension = $ext;
		}

		if($error == "") // No errors were found?
		{
		$new_file_name = strtolower($file_name);
		$new_file_name = str_replace(' ', '-', $new_file_name);
		$new_file_name = substr($new_file_name, 0, -strlen($ext));
		$new_file_name .= $extension;
		
		// File Name
		$move_file = move_uploaded_file($file['tmp_name'], $upload_image_to_folder.$new_file_name);

		if($move_file)
			{
			$done = 'The image has been uploaded.';
			}
		}
		else
		{
		@unlink($file['tmp_name']);
		}

		$file_uploaded = true;
} else { $file_uploaded = false; }

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
$sponsorDescription = $_POST['sponsorDescription'];

$contactName = $_POST['contactName'];
$contactAddress = $_POST['contactAddress'];
$contactCity = $_POST['contactCity'];
$contactState = $_POST['contactState'];
$contactZipCode = $_POST['contactZipCode'];
$contactCountry = $_POST['contactCountry'];
$contactPhone = $_POST['contactPhone'];
$contactEmail = $_POST['contactEmail'];
$contactPassword = $_POST['contactPassword'];

$todayis = date("l, F j, Y, g:i a");

$subject = "Sponsor Application";

$message = " $todayis [EST] \n
Sponsor Name: $sponsorName \n
Sponsor Logo Filename: $file_name \n
Sponsor Address: $sponsorAddress, $sponsorCity, $sponsorState, $sponsorZipCode, $sponsorCountry \n
Sponsor Phone: $sponsorPhone \n
Sponsor Email: $sponsorEmail \n
Sponsor Fax: $sponsorFax \n
Sponsor Website: $sponsorWebsite \n
Sponsor Religious Affiliation: $sponsorRegAff \n
Sponsor Description: $sponsorDescription \n\n

Contact Name: $contactName \n
Contact Address: $contactAddress, $contactCity, $contactState, $contactZipCode, $contactCountry \n
Contact Phone: $contactPhone \n
Contact Email: $contactEmail \n
Contact Desired Password: $contactPassword \n
";

$from = "From: $contactEmail\r\n";

mail("club@newstart.com, cblood@weimar.org", $subject, $message, $from);
}

if (isset($_POST['sponsorName2']))
{
$file = $_FILES['sponsorLogo'];
$file_name = $file['name'];

$sponsorName2 = $_POST['sponsorName2'];
$contactName2 = $_POST['contactName2'];
$contactEmail2 = $_POST['contactEmail2'];
$todayis = date("l, F j, Y, g:i a");

$subject = "Sponsor Application Image Uploaded";
$from = "From: $contactEmail2\r\n";
$message = " $todayis [EST] \n
Sponsor Logo Filename: $file_name \n
Sponsor Name: $sponsorName2 \n
Contact Name: $contactName2 \n
";
mail("club@newstart.com, cblood@weimar.org", $subject, $message, $from);
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

	<!-- Facebook Meta Tags -->
	<meta property="fb:page_id" content="122876001070562" />
	<title>Sponsor Application | {site_name}</title>
	
	<meta name="author" content="{site_name}">


	<link rel="stylesheet" href="/assets/css/nsc.css" type="text/css" />

	<script src="/assets/js/libs/modernizr-1.6.min.js"></script>
	<!--Google Analytics-->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-12179773-3']);
		_gaq.push(['_trackPageview']);
	
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>
<body id="{channel}" class="standalone">
	<div class="container">

{assign_variable:channel="sponsors"}
{assign_variable:section="Become a Sponsor"}
<div class="body">
	<?php
	if($file_uploaded)
	{
		if($done)
		{ ?>
		<!-- Image Uploaded -->
	<?php	} else { ?>
		<!-- No Image Uploaded -->
	<?php } ?>
		<h1>Application Sent</h1> 
		<p>A {site_name} representative will contact you shortly.</p>
		<p class="button-wrap">
			<a href="{site_url}" class="super green button"><span>Home</span></a>
		</p>
	<?php
	} ?>
	<?php	if (!isset($_POST['sponsorName'])) { ?>
		<h1>Your application is empty!</h1> 
		<p>It appears that you've reached this page without submitting the Sponsor Registration Application.</p>
		<p class="button-wrap">
			<a href="{path='sponsor_admin/register'}" class="super green button"><span>Register</span></a>
		</p>
	<?php } ?>
	
</div><!--/.body-->
</div><!--/.container-->
{doc_bottom}