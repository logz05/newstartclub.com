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
$sponsorHealthEvents = $_POST['sponsorHealthEvents'];
$sponsorNeedHelp = $_POST['sponsorNeedHelp'];

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
Sponsor Health Events: $sponsorHealthEvents \n
Sponsor Need Help: $sponsorNeedHelp \n\n

Contact Name: $contactName \n
Contact Address: $contactAddress, $contactCity, $contactState, $contactZipCode, $contactCountry \n
Contact Phone: $contactPhone \n
Contact Email: $contactEmail \n
Contact Desired Password: $contactPassword \n
";

$from = "From: $contactEmail\r\n";

mail("club@newstart.com, cblood@weimar.org, ddennis@weimar.org, ppigman@weimar.org", $subject, $message, $from);
}

?>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=860;" />

  <!-- Facebook Meta Tags -->
  <meta property="fb:page_id" content="122876001070562" />
  <title>Application Sent | {site_name}</title>
  
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
    </div><!--/.body-->
  </div><!--/.container-->
</body>
</html>