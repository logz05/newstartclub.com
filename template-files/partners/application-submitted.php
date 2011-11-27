<?php

function send_emails($from_name, $from_email, $subject, $custom_message)
{
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
  $headers .= 'From: '. $from_name .' <'. $from_email .'>' . "\r\n";

    // message
    $message = '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=610">
    <title>Email Members Template</title>
    </head>
      <body style="background: url(http://newstartclub.com/assets/css/images/background-gradient-texture.png) #A7C7EF repeat-x;" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="#A7C7EF" >
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
                  <span style="font-size:30px;color:#FFFFFF;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif;">Partnership Application</span>
                </td>
              </table>
              <table width="550" cellpadding="0" cellspacing="0">
                <tr>
                  <td bgcolor="#FFFFFF" valign="top" style="font-size:16px;color:#000000;line-height:150%;font-family:\'Helvetica Neue\', Arial, Helvetica, sans-serif; border-bottom-left-radius: 15px; -moz-border-radius-bottomleft: 15px; -webkit-border-bottom-left-radius: 15px; -khtml-border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; -moz-border-radius-bottomright: 15px; -webkit-border-bottom-right-radius: 15px; -khtml-border-bottom-right-radius: 15px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35);-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25); padding:30px;">';
          $message .= $custom_message;
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
    mail("cavellblood@me.com, club@newstart.com", $subject, stripslashes($message), $headers);

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
  $specialty = $_POST["specialty"];
  $bio = $_POST["bio"];
  $picture = $_FILES["partnerPicture"]["name"];
  $affiliation = $_POST["affiliation"];
  
  $message = "
    <p><strong>Name:</strong> $name</p>
    <p><strong>E-mail:</strong> $email</p>
    <p><strong>Credentials:</strong> $credentials</p>
    <p><strong>Address:</strong> $address</p>
    <p><strong>City:</strong> $city</p>
    <p><strong>State:</strong> $state</p>
    <p><strong>Zip:</strong> $zip</p>
    <p><strong>Specialty:</strong> $specialty</p>
    <p><strong>Biography:</strong> $bio</p>
    <p><strong>Picture:</strong> $picture</p>
    <p><strong>Affiliation:</strong> $affiliation</p>
  ";
  send_emails($name, $email, 'Partnership Application', $message);
}

if ($_FILES["partnerPicture"]["name"] != "") {
  if (
      (
        ($_FILES["partnerPicture"]["type"] == "image/jpeg") ||
        ($_FILES["partnerPicture"]["type"] == "image/pjpeg") ||
        ($_FILES["partnerPicture"]["type"] == "image/png") ||
        ($_FILES["partnerPicture"]["type"] == "image/tiff") ||
        ($_FILES["partnerPicture"]["type"] == "image/bmp")
      ) 
      && ($_FILES["partnerPicture"]["size"] < 2000000)
    )
    {
    if ($_FILES["partnerPicture"]["error"] > 0)
      {
      echo "Return Code: " . $_FILES["partnerPicture"]["error"] . "<br />";
      }
    else
      {
      if (file_exists("partners-upload/" . $_FILES["partnerPicture"]["name"]))
        {
        echo "<!-- ". $_FILES["partnerPicture"]["name"] . " already exists. -->";
        }
      else
        {
        move_uploaded_file($_FILES["partnerPicture"]["tmp_name"],
        "partners-upload/" . $_FILES["partnerPicture"]["name"]);
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
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=860;" />
 
  <title>Partnership Application Submitted | {site_name}</title>
<?php

function fileModTime($filename) {

  $file = '/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content' . $filename;
  
  if (file_exists($file)) {
    echo "?v=" . date("YmdHis", filemtime($file));
  }

}

?>

  <link rel="stylesheet" href="/assets/css/standalone.css<?php fileModTime('/assets/css/standalone.css'); ?>" type="text/css" />
</head>
<body>
<div class="container">
  <div class="body">
    <?php 
      if (isset($_POST['name'])) {
        if (($_FILES["partnerPicture"]["name"] != "") && 
            (
              ($_FILES["partnerPicture"]["type"] == "image/jpeg") ||
              ($_FILES["partnerPicture"]["type"] == "image/pjpeg") ||
              ($_FILES["partnerPicture"]["type"] == "image/png") ||
              ($_FILES["partnerPicture"]["type"] == "image/tiff") ||
              ($_FILES["partnerPicture"]["type"] == "image/bmp")
            ) 
            && ($_FILES["partnerPicture"]["size"] < 2000000)
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
                <input type="file" name="partnerPicture" id="partnerPicture" />
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