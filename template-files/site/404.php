<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=860;" />

  <title>404 | {site_name}</title>
  
  <meta name="author" content="{site_name}">

  <link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
  <link rel="stylesheet" href="{stylesheet='site/standalone'}" type="text/css" />
</head>
<body class="small">
  <div class="body">
    <h1>404</h1>
    <p>We could not find the page you requested.</p>
    {if segment_1 == "sponsor_admin"}
      <p>Perhaps you were looking for this page:</p>
      <a href="/sponsors/{if segment_2}{segment_2}{/if}">{site_url}sponsors/{if segment_2}{segment_2}{/if}</a>
    {/if}
    {if segment_1 =="sponsors" && segment_2 == "tour"}
      <p>Perhaps you were looking for this page:</p>
      <a href="/sponsors">{site_url}sponsors</a>
    {/if}
    {if segment_1 =="members"}
      <p>Perhaps you were looking for this page:</p>
      <a href="/{segment_2}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}{if segment_5}/{segment_5}{/if}">{site_url}{segment_2}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}{if segment_5}/{segment_5}{/if}</a>
    {/if}
  </div>
</div>
</body>
</html>