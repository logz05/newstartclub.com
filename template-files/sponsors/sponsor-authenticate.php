<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=860;" />

  <title>Please Sign In | {site_name}</title>
  
  <meta name="author" content="{site_name}">

  <link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
  <link rel="stylesheet" href="{stylesheet='site/standalone'}" type="text/css" />
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
<body>
  <div class="body">
    <div class="modal grid12 clearfix">
      <div class="left">
        <h2>Sign In</h2>
        <h3>You must be signed in with a sponsor account to see this page.</h3>
        {exp:member:login_form error_page="members/error" return="/{segment_1}/{segment_2}/{segment_3}/{segment_4}/{segment_5}/{segment_6}/{segment_7}"}
        <table>
          <tr>
            <th scope="row"><label for="email">Email</label></th>
            <td><input type="email" class="input" id="email" name="username" value="" size="23" autocapitalize="off" /></td>
          </tr>
          <tr>
            <th scope="row"><label for="password">Password</label></th>
            <td><input type="password" class="input" id="password" name="password" size="23" /></td>
          </tr>
          {if auto_login}<tr>
            <th></th>
            <td>
              <p><input class="checkbox" type="checkbox" name="auto_login" value="1" /><span>Keep me logged in</span></p>
            </td>
          </tr>{/if}
          <tr>
            <th scope="row">&nbsp;</th>
            <td>
              <div class="button-wrap">
                <button type="submit" class="super green button"><span>Sign In</span></button>
                <a class="forgot-pass" href="/forgot-password">Forgot your password?</a>
              </div>
            </td>
          </tr>
        </table>
        {/exp:member:login_form}
      </div>
      <div class="right">
        <h2>Not a Sponsor?</h2>
        <h3>Here&rsquo;s some of the benefits:</h3>
        <ul>
          <li>Health seminar service and support</li>
          <li>Health survey and event promotional tools</li>
          <li>Online contact management system</li>
          <li>Discounts on NEWSTART&reg; books and DVDs</li>
        </ul>
        <p class="button-wrap">
          <a href="/sponsors/apply" class="super red button"><span>Apply</span></a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>