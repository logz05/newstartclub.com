<?php
  
if (isset($_POST["name"])) {
  $name = $_POST["name"];
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
}

if (isset($_FILES["partnerPicture"])) {
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
        echo $_FILES["partnerPicture"]["name"] . " already exists. ";
        }
      else
        {
        move_uploaded_file($_FILES["partnerPicture"]["tmp_name"],
        "partners-upload/" . $_FILES["partnerPicture"]["name"]);
        echo "Stored in: " . "upload/" . $_FILES["partnerPicture"]["name"];
        }
      }
    }
  else
    {
    echo "Invalid file";
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
    <?php if (isset($_POST['name'])) { ?>
      <h1>Application Sent</h1>
      <p>Thank you for submitting a partnership application!</p>
      <p>A {site_name} representative will contact you after your application has been reviewed.</p>
      <p class="button-wrap">
        <a href="/" class="super green button"><span>Home</span></a>
      </p>
    <?php } else { ?>
      <h1>Your application is empty!</h1> 
      <p>It appears that you've reached this page without submitting the Sponsor Application.</p>
      <p class="button-wrap">
        <a href="/partners/apply" class="super green button"><span>Apply</span></a>
      </p>
    <?php } ?>
  </div>
</div>
</body>
</html>