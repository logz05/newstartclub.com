<link rel="stylesheet" href="/assets/css/nsc.css" type="text/css" />
{if "{embed:add}" != ""}<?php $splitcontents = explode('|', '{embed:add}');
foreach($splitcontents as $file) {
 echo "\t".'<link rel="stylesheet" href="/assets/css/'.$file.'.css" type="text/css" />'."\n";
} ?>
{/if}
	
	<!--[if lte IE 7 ]>
		<link rel="stylesheet" type="text/css" href="/assets/css/ie7.css" media="screen, projection" />
	<![endif]-->
	
	<!--[if IE 8 ]>
		<link rel="stylesheet" type="text/css" href="/assets/css/ie8.css" media="screen, projection" />
	<![endif]-->