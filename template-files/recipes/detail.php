{embed="embeds/_doc-top" 
	class="recipes"
	microdata="recipe"
	meta='
		{exp:channel:entries channel="recipes" url_title="{segment_3}"}
			<meta property="og:title" content="{title}"/>
			<meta property="og:site_name" content="{site_name}"/>
			<meta property="og:url" content="{url_title_path='recipes/detail'}"/>
			<meta property="og:type" content="food"/>
			<meta property="og:image" content="{recipe_image}"/>
			<meta property="og:description" content="{exp:eehive_hacksaw chars="300" append="&hellip;"}{recipe_instructions}{/exp:eehive_hacksaw}"/>
			<meta name="description" content="{exp:eehive_hacksaw chars="300" append="&hellip;"}{recipe_instructions}{/exp:eehive_hacksaw}"/>
			<meta name="keywords" content="{categories show_group="not 22" backspace="1"}{category_name},{/categories}">
		{/exp:channel:entries}
	'
	title="{exp:low_title:entry url_title='{segment_3}' channel='recipes'}"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='recipes'}">Recipes</a></li>
</ul>
{exp:channel:entries channel="recipes" limit="1" require_entry="yes"}
{if no_results}
	{redirect="404"}
{/if}

{if segment_4}
	{redirect="404"}
{/if}
<div class="heading clearfix">
	<h1 itemprop="name">{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
	<h2 class="post__permalink">{path='recipe/{entry_id}'}</h2>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post recipe clearfix">

			{if recipe_video}
			
				{if logged_out}
					<a href="{path='signin'}" data-reveal-id="signin-modal-video">
						{recipe_video_options}
							<div class="video-overlay" style="height:{if aspect_ratio == "widescreen"}276{if:elseif aspect_ratio == "standard"}368{/if}px;"></div>
						{/recipe_video_options}
					</a>
				{/if}
			
				{recipe_video_options}
					<iframe src="http://player.vimeo.com/video/{vimeo_id}" width="490" height="{if aspect_ratio == "widescreen"}276{if:elseif aspect_ratio == "standard"}368{/if}" frameborder="0" class="video-player"></iframe>
				{/recipe_video_options}
				
				{exp:ce_img:single src="{recipe_image}" max_width="474" max_height="274" crop="yes" attributes='alt="{title}" title="{title}" class="video-preview" itemprop="image"'}
				
			{if:else}
			
				<figure class="figure  figure--main">
					{exp:ce_img:single src="{recipe_image}" max_width="474" max_height="274" crop="yes" attributes='alt="{title}" title="{title}" itemprop="image"'}
				</figure>
				
			{/if}
			
			{if recipe_description}
				<div class="recipe-lead-in">
					{recipe_description}
				</div>
			{/if}
			
			{if entry_id=="1191"}
			
				<h2>Meal Plan</h2>
				{if logged_out}
					<p class="button-wrap">
						<a href="{path='signin'}" class="super small secondary button" data-reveal-id="signin-modal-meal-plan"><span>Show Meal Plan</span></a>
					</p>
				{if:else}
					{recipe_ingredients}
				{/if}
			
			{if:else}
			
				<h2>Ingredients</h2>
				{if logged_out}
					<p class="button-wrap">
						<a href="{path='signin'}" class="super small secondary button" data-reveal-id="signin-modal-recipe"><span>View Ingredients</span></a>
					</p>
				{if:else}
					{recipe_ingredients}
				{/if}
				
			{/if}
			
			{if entry_id == "1191"}<h2>Shopping List</h2>{if:else}<h2>Instructions</h2>{/if}
			<span itemprop="recipeInstructions">
				{recipe_instructions}
			</span>
			
		</div>
		<ul class="tags">
			<li data-icon="r">Tags:</li>
			{categories show_group="not 22"}
				{if category_group == "39"}<li><a href="{site_url}/recipes/type/{category_url_title}">{category_name}</a></li>{/if}
				{if category_group == "42"}<li><a href="{site_url}/recipes/sensitivity/{category_url_title}">{category_name}</a></li>{/if}
				{if category_group == "43"}<li><a href="{site_url}/recipes/ethnicity/{category_url_title}">{category_name}</a></li>{/if}
			{/categories}
			{categories show_group="21"}
				<li><a href="{site_url}/recipes/partner/{category_url_title}/">{category_name}</a></li>
			{/categories}
		</ul>
		
		{exp:playa:children field="recipe_related"}
			{if count == 1}
			<div class="related-entries">
				<h2>Related Recipes</h2>
				<ul class="entry-grid four-wide clearfix">
			{/if}
					<li class="{switch='one|two|three|four'}">
						<figure class="figure  figure__grid">
							<a href="{path='{channel_short_name}/detail/{url_title}'}">
								{if resource_type == "video"}<span class="play"><i></i></span>{/if}
								{exp:ce_img:single src="{resource_image}{recipe_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
							</a>
							<figcaption>
								<a href="{path='{channel_short_name}/detail/{url_title}'}">{title}</a>
							</figcaption>
						</figure>
					</li>
			{if count == total_results}
				</ul>
			</div>
			{/if}
		{/exp:playa:children}
		
{/exp:channel:entries}
	
	{embed="embeds/_comments" channel="recipes"}
	
	</div>
	{exp:channel:entries channel="recipes" limit="1" url_title="{segment_3}"}
		<div class="sidebar right">
			{exp:playa:children field="recipe_author"}
			{if count == 1}
			<section class="section">
			{/if}
				<header class="bar"><a href="{url_title_path='services/detail'}">{title}{if service_credentials}, {service_credentials}{/if}</a></header>
				<figure class="figure  figure--small  left">
					<a href="{url_title_path='services/detail'}">{exp:ce_img:single src="{service_image}" max_width="64" max_height="64" crop="yes" attributes='alt="{title}" title="{title}"'}</a>
				</figure>
				{service_bio}
				<p><a href="{url_title_path='recipes/partner'}">View Recipes by {title}</a></p>
			{if count == total_results}
			</section>
			{/if}
			{/exp:playa:children}
		
			{embed="embeds/_share" channel="recipes" image="{resource_thumb}"}
		</div>
	{/exp:channel:entries}
</div>
{embed="embeds/_doc-bottom" sim="recipe|meal-plan|video|comments"}