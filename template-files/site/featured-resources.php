<?php 

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once('dbconnect.php');

$db = new DBconnect();

$videoQuery = 'SELECT entry_id FROM exp_category_posts WHERE cat_id = 146 ORDER BY RAND() LIMIT 4';
$articleQuery = 'SELECT entry_id FROM exp_category_posts WHERE cat_id = 145 ORDER BY RAND() LIMIT 4';
$recipeQuery = 'SELECT entry_id FROM exp_weblog_titles WHERE weblog_id = 76 ORDER BY RAND() LIMIT 4';

$videoResults = $db->fetch($videoQuery);
$articleResults = $db->fetch($articleQuery);
$recipeResults = $db->fetch($recipeQuery);

$videoIDs = '';

for ($i = 0; $i <= 4; $i++ ) {
	$videoIDs .= $videoResults[$i][0];
	
	if ($i != 4) {
		$videoIDs .= '|';
	}
	
}

$articleIDs = '';

for ($i = 0; $i <= 4; $i++ ) {
	
	$articleIDs .= $articleResults[$i][0];
	
	if ($i != 4) {
		$articleIDs .= '|';
	}
	
}

$recipeIDs = '';

for ($i = 0; $i <= 4; $i++ ) {
	
	$recipeIDs .= $recipeResults[$i][0];
	
	if ($i != 4) {
		$recipeIDs .= '|';
	}
	
}
?>
<div id="resource-slider">
	<div id="slides">
	<!-- this is a test -->
	{exp:weblog:entries weblog="resources|recipes" entry_id="<?php echo $videoIDs.$articleIDs.$recipeIDs; ?>" disable="member_data|categories"}
		<div class="content" data-caption="#{entry_id}">
			<a href='/{weblog_short_name}/detail/{url_title}'>{exp:ce_img:single src="{resource_thumb}" max_width="490" crop="yes" attributes='alt="{title}" title="{title}"'}</a>
		</div>
	{/exp:weblog:entries}
	</div>
	
	<!-- Captions for Orbit -->
	{exp:weblog:entries weblog="resources|recipes" entry_id="<?php echo $videoIDs.$articleIDs.$recipeIDs; ?>" disable="member_data|categories"}
		<span class="orbit-caption" id="{entry_id}">
			<a href='/{weblog_short_name}/detail/{url_title}'>
				<h2 class="title">{title}</h2>
				<h3 class="subtitle">
					{exp:trunchtml chars="130" inline="&hellip; <a class='link-more' href='/{weblog_short_name}/detail/{url_title}'>more&raquo;</a>"}
						{exp:html_strip}{resource_description}{/exp:html_strip}
					{/exp:trunchtml}
				</h3>
			</a>
		</span>
	{/exp:weblog:entries}
</div>

<h2 class="section-heading">Videos <span>( <a href="/resources/media/video">view all</a> )</span></h2>
<ul class="clearfix">
	{exp:weblog:entries weblog="resources" entry_id="<?php echo $videoIDs; ?>" dynamic="off" disable="member_data|categories" limit="4"}
		<li class="resource">
			<a href="{url_title_path='resources/detail'}" class="image">
				{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
				{exp:ce_img:single src="{resource_thumb}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
			</a>
			<span class="title"><a href="{url_title_path='resources/detail'}">{exp:char_limit total="22"}{title}{/exp:char_limit}</a></span>
		</li>
	{/exp:weblog:entries}
</ul>

<h2 class="section-heading">Articles <span>( <a href="/resources/media/article">view all</a> )</span></h2>
<ul class="clearfix">
{exp:weblog:entries weblog="resources" entry_id="<?php echo $articleIDs; ?>" dynamic="off" disable="member_data|categories" limit="4"}
	<li class="resource">
		<a href="{url_title_path='resources/detail'}" class="image">
			{exp:ce_img:single src="{resource_thumb}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
		</a>
		<span class="title"><a href="{url_title_path='resources/detail'}">{exp:char_limit total="22"}{title}{/exp:char_limit}</a></span>
	</li>
{/exp:weblog:entries}
</ul>

<h2 class="section-heading">Recipes <span>( <a href="/recipes">view all</a> )</span></h2>
<ul class="clearfix">
{exp:weblog:entries weblog="recipes" entry_id="<?php echo $recipeIDs; ?>" dynamic="off" disable="member_data|categories" limit="4"}
	<li class="resource">
		<a href="{url_title_path='recipes/detail'}" class="image">
			{exp:ce_img:single src="{resource_thumb}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
		</a>
		<span class="title"><a href="{url_title_path='recipes/detail'}">{exp:char_limit total="22"}{title}{/exp:char_limit}</a></span>
	</li>
{/exp:weblog:entries}
</ul>
