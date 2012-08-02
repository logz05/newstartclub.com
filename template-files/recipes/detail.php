{embed="embeds/_doc-top" 
	class="recipes"
	microdata="recipe"
	meta='
		{exp:weblog:entries weblog="recipes" url_title="{segment_3}"}
			<meta property="og:title" content="{title}"/>
			<meta property="og:site_name" content="{site_name}"/>
			<meta property="og:url" content="{title_permalink='recipes/detail'}"/>
			<meta property="og:type" content="food"/>
			<meta property="og:image" content="{site_url}{resource_thumb}"/>
			<meta property="og:description" content="{exp:trunchtml chars="300"}{exp:html_strip}{resource_description}{/exp:html_strip}{/exp:trunchtml}"/>
			<meta name="description" content="{exp:trunchtml chars="300"}{exp:html_strip}{resource_description}{/exp:html_strip}{/exp:trunchtml}"/>
		{/exp:weblog:entries}
	'
	title="
		{exp:weblog:entries weblog='recipes' url_title='{segment_3}'}
			{title}
		{/exp:weblog:entries}
"}
<ul class="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/recipes">Recipes</a></li>
</ul>
{exp:weblog:entries weblog="recipes" limit="1" require_entry="yes"}
{if no_results || segment_4 !=""}{redirect="404"}{/if}
<div class="heading clearfix">
	<h1 itemprop="name">{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post {resource_display_style} clearfix">
			{exp:ce_img:single src="{resource_thumb}" max_width="200" attributes='alt="{title}" title="{title}" class="image" itemprop="image"'}
			<div class="description" itemprop="recipeInstructions">{resource_description}</div>
		</div>
		<ul class="tags">
			<li data-icon="r">Tags:</li>
			{categories show_group="not 22"}
				{if category_group == "22"}<li><a href="{site_url}resources/language/{category_url_title}/">{category_name}</a></li>{/if}
				{if category_group == "39"}<li><a href="{site_url}recipes/type/{category_url_title}/" itemprop="recipeCategory">{category_name}</a></li>{/if}
				{if category_group == "42"}<li><a href="{site_url}recipes/sensitivity/{category_url_title}/">{category_name}</a></li>{/if}
				{if category_group == "43"}<li><a href="{site_url}recipes/ethnic/{category_url_title}/" itemprop="recipeCuisine">{category_name}</a></li>{/if}
			{/categories}
		</ul>
		{/exp:weblog:entries}
	
	{embed="embeds/_comments" channel="recipes"}
	
	</div>
	{exp:weblog:entries weblog="recipes" limit="1" url_title="{segment_3}"}
		<div class="sidebar right">
			<section class="section ingredients">
				<header class="bar">Ingredients</header>
				{if logged_out}
					<p class="button-wrap">
						<a href="{path='signin'}" class="super small secondary button" data-reveal-id="signin-modal-recipe"><span>View Ingredients</span></a>
					</p>
				{if:else}
					{if recipe_ingredients}
						{recipe_ingredients}
					{if:else}
						{resource_ingredients}
					{/if}
				{/if}
			</section>
			
			{embed="embeds/_share" channel="recipes" image="{resource_thumb}"}
		</div>
	{/exp:weblog:entries}
</div>
{embed="embeds/_doc-bottom" sim="recipe|comments"}