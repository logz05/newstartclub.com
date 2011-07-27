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
 
  <title>You're currently a member! | {site_name}</title>
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
    <h1>You are already a member!</h1>
    <p>You have already completed the registration process.</p>
    <p class="button-wrap">
      <a href="/" class="super green button"><span>Home</span></a>
      <a href="/settings/" class="super secondary button"><span>Settings</span></a>
    </p>
  </div>
</div>
</body>
</html>