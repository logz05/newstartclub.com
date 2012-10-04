<?php 

require_once('dbconnect.php');

$db = new DBconnect();

$videoQuery = 'SELECT exp_category_posts.entry_id FROM exp_category_posts JOIN exp_channel_titles ON exp_category_posts.entry_id = exp_channel_titles.entry_id WHERE cat_id = 146 AND status = "open" ORDER BY RAND() LIMIT 4';
$articleQuery = 'SELECT exp_category_posts.entry_id FROM exp_category_posts JOIN exp_channel_titles ON exp_category_posts.entry_id = exp_channel_titles.entry_id WHERE cat_id = 145 AND status = "open" ORDER BY RAND() LIMIT 4';
$recipeQuery = 'SELECT entry_id FROM exp_channel_titles WHERE channel_id = 6 AND status = "open" ORDER BY RAND() LIMIT 4';

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
	{exp:channel:entries channel="resources|recipes" entry_id="<?php echo $videoIDs.$articleIDs.$recipeIDs; ?>" disable="member_data|categories"}
		<div class="content" data-caption="#{entry_id}">
			<a href="{path='{channel_short_name}/detail/{url_title}'}">
				{exp:ce_img:single src="{resource_image}{recipe_image}" max_width="490" max_height="274" crop="yes" attributes='alt="{title}" title="{title}"'}
			</a>
		</div>
	{/exp:channel:entries}
	</div>
	
	<!-- Captions for Orbit -->
	{exp:channel:entries channel="resources|recipes" entry_id="<?php echo $videoIDs.$articleIDs.$recipeIDs; ?>" disable="member_data|categories"}
		<span class="orbit-caption" id="{entry_id}">
			<a href="{path='{channel_short_name}/detail/{url_title}'}">
				<h2 class="title">{title}</h2>
				<h3 class="subtitle">
					{exp:eehive_hacksaw chars="135" append="&hellip;"}
						{resource_body}{recipe_instructions}
					{/exp:eehive_hacksaw}
				</h3>
			</a>
		</span>
	{/exp:channel:entries}
</div>

<h2 class="section-heading">Videos <span>( <a href="{path='resources/media/video'}">view all</a> )</span></h2>
<ul class="clearfix">
	{exp:channel:entries channel="resources" entry_id="<?php echo $videoIDs; ?>" dynamic="no" disable="member_data|categories" limit="4"}
		<li class="resource">
			<a href="{url_title_path='resources/detail'}" class="image">
				{if resource_type == "video"}<span class="play"><i></i></span>{/if}
				{exp:ce_img:single src="{resource_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
			</a>
			<span class="title"><a href="{url_title_path='resources/detail'}">{exp:eehive_hacksaw chars="22" append="&hellip;"}{title}{/exp:eehive_hacksaw}</a></span>
		</li>
	{/exp:channel:entries}
</ul>

<h2 class="section-heading">Articles <span>( <a href="{path='resources/media/article'}">view all</a> )</span></h2>
<ul class="clearfix">
{exp:channel:entries channel="resources" entry_id="<?php echo $articleIDs; ?>" dynamic="no" disable="member_data|categories" limit="4"}
	<li class="resource">
		<a href="{url_title_path='resources/detail'}" class="image">
			{exp:ce_img:single src="{resource_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
		</a>
		<span class="title"><a href="{url_title_path='resources/detail'}">{exp:eehive_hacksaw chars="22" append="&hellip;"}{title}{/exp:eehive_hacksaw}</a></span>
	</li>
{/exp:channel:entries}
</ul>

<h2 class="section-heading">Recipes <span>( <a href="{path='recipes'}">view all</a> )</span></h2>
<ul class="clearfix">
{exp:channel:entries channel="recipes" entry_id="<?php echo $recipeIDs; ?>" dynamic="no" disable="member_data|categories" limit="4"}
	<li class="resource">
		<a href="{url_title_path='recipes/detail'}" class="image">
			{exp:ce_img:single src="{recipe_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
		</a>
		<span class="title"><a href="{url_title_path='recipes/detail'}">{exp:eehive_hacksaw chars="22" append="&hellip;"}{title}{/exp:eehive_hacksaw}</a></span>
	</li>
{/exp:channel:entries}
</ul>
