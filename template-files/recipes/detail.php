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
		{/exp:channel:entries}
	'
	title="{exp:low_title:entry url_title='{segment_3}' channel='recipes'}"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='recipes'}">Recipes</a></li>
</ul>
{exp:channel:entries channel="recipes" limit="1" require_entry="yes"}
{if no_results || segment_4 !=""}{redirect="404"}{/if}
<div class="heading clearfix">
	<h1 itemprop="name">{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post recipe clearfix">
			{exp:ce_img:single src="{recipe_image}" max_width="200" attributes='alt="{title}" title="{title}" class="image" itemprop="image"'}
			<div class="narrow" itemprop="recipeInstructions">{recipe_instructions}</div>
		</div>
		<ul class="tags">
			<li data-icon="r">Tags:</li>
			{categories show_group="not 22"}
				{if category_group == "39"}<li><a href="{site_url}/recipes/type/{category_url_title}/" itemprop="recipeCategory">{category_name}</a></li>{/if}
				{if category_group == "42"}<li><a href="{site_url}/recipes/sensitivity/{category_url_title}/">{category_name}</a></li>{/if}
				{if category_group == "43"}<li><a href="{site_url}/recipes/ethnic/{category_url_title}/" itemprop="recipeCuisine">{category_name}</a></li>{/if}
			{/categories}
		</ul>
		
		{exp:playa:children field="recipe_related"}
			{if count == 1}
			<div class="related-entries">
				<h2>Related Entries</h2>
				<ul class="entry-grid four-wide clearfix">
			{/if}
					<li class="{switch='one|two|three|four'}">
						<a href="{path='{channel_short_name}/detail/{url_title}'}" class="image">
							{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
							{exp:ce_img:single src="{resource_image}{recipe_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
						</a>
						<div class="title">
							<a class="head" href="{path='{channel_short_name}/detail/{url_title}'}">{title}</a>
						</div>
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
			<section class="section ingredients">
				<header class="bar">Ingredients</header>
				{if logged_out}
					<p class="button-wrap">
						<a href="{path='signin'}" class="super small secondary button" data-reveal-id="signin-modal-recipe"><span>View Ingredients</span></a>
					</p>
				{if:else}
					{recipe_ingredients}
				{/if}
			</section>
			
			{embed="embeds/_share" channel="recipes" image="{resource_thumb}"}
		</div>
	{/exp:channel:entries}
</div>
{embed="embeds/_doc-bottom" sim="recipe|comments"}