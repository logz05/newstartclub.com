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
$sponsorHealthEvents = stripslashes($_POST['sponsorHealthEvents']);
$sponsorNeedHelp = $_POST['sponsorNeedHelp'];

$contactName = $_POST['contactName'];
$contactAddress = $_POST['contactAddress'];
$contactCity = $_POST['contactCity'];
$contactState = $_POST['contactState'];
$contactZipCode = $_POST['contactZipCode'];
$contactPhone = $_POST['contactPhone'];
$contactEmail = $_POST['contactEmail'];

$subject = "Sponsor Application";

// To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
  $headers .= 'From: '. $contactName .' <'. $contactEmail .'>' . "\r\n";

    // message
    $message = '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=610">
    <title>Email Members Template</title>
    </head>
      <body style="background: url(http://newstartclub.com/assets/css/images/background-gradient-texture.png) #A7C7EF repeat-x;" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="#A7C7EF">
        <table width="100%" cellpadding="30" cellspacing="0" class="backgroundTable">
          <tr>
            <td valign="top" align="center">
              <table width="550" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="border-top:0px solid #333333;">
                  <center><a href="http://newstartclub.com/"><IMG SRC="http://newstartclub.com/assets/images/email/invites/header-email.jpg" BORDER="0" title="NEWSTART&reg; Lifestyle Club"  alt="NEWSTART&reg; Lifestyle Club" align="center" style="border-top-left-radius: 15px; -moz-border-radius-topleft: 15px; -webkit-border-top-left-radius: 15px; -khtml-border-top-left-radius: 15px; border-top-right-radius: 15px; -moz-border-radius-topright: 15px; -webkit-border-top-right-radius: 15px; -khtml-border-top-right-radius: 15px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35);-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);" /></a></center>
                </td>
                </tr>
              </table>
              <table width="550" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <td style="background: url(http://newstartclub.com/assets/images/email/newsletter/nav-texture.png) center center #000000; color:#FFFFFF; height: 60px; text-align:right; padding-right: 30px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35);-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);">
                  <span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">Sponsorship Application</span>
                </td>
              </table>
              <table width="550" cellpadding="0" cellspacing="0">
                <tr>
                  <td bgcolor="#FFFFFF" valign="top" style="font-size:16px;color:#000000;line-height:150%;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; border-bottom-left-radius: 15px; -moz-border-radius-bottomleft: 15px; -webkit-border-bottom-left-radius: 15px; -khtml-border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; -moz-border-radius-bottomright: 15px; -webkit-border-bottom-right-radius: 15px; -khtml-border-bottom-right-radius: 15px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35);-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25); padding:30px;">';
                  $message .= "<p>Sponsor Name: $sponsorName</p>
                  <p>Sponsor Address: $sponsorAddress, $sponsorCity, $sponsorState, $sponsorZipCode, $sponsorCountry</p>
                  <p>Sponsor Phone: $sponsorPhone </p>
                  <p>Sponsor Email: $sponsorEmail</p>
                  <p>Sponsor Fax: $sponsorFax</p>
                  <p>Sponsor Website: $sponsorWebsite</p>
                  <p>Sponsor Religious Affiliation: $sponsorRegAff</p>
                  <p>Sponsor Health Events: $sponsorHealthEvents</p>
                  <p>Sponsor Need Help: $sponsorNeedHelp</p>
                  <hr>
                  <p>Contact Name: $contactName</p>
                  <p>Contact Address: $contactAddress, $contactCity, $contactState, $contactZipCode</p>
                  <p>Contact Phone: $contactPhone</p>
                  <p>Contact Email: $contactEmail</p>";
                  
                  $message .= '
                  </td>
                </tr>
              </table>
              <table width="550" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="background-color:transparent; text-align:center; padding-top:10px;" valign="top">
                    <span style="font-size:10px;color:#FFFFFF;font-family:verdana;"></span>
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