{embed="embeds/_doc-top" 
	class="resources"
	title="{exp:low_title:entry url_title='{segment_3}' channel='resources'}"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='resources'}">Resources</a></li>
</ul>
{exp:channel:entries channel="resources" limit="1" require_entry="yes"}
{if segment_4 !="" || segment_2 == ""}{redirect="404"}{/if}
{if no_results}
<div class="heading clearfix">
	<h1>Our recipes have moved!</h1>
</div>
<div class="post clearfix">
	<p>It appears that this link is outdated. But no worries! <strong>You can find your recipe at this link:<br></strong> <a href="{path='recipes/detail/{segment_3}'}">{site_url}/recipes/detail/{segment_3}</a></p>
</div>
{/if}
<div class="heading clearfix">
	<h1>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
			<div class="post {resource_type} clearfix">
			{if resource_type == "article"}
				<div class="entry-details">
					{exp:ce_img:single src="{resource_image}" max_width="200" attributes='alt="{title}" title="{title}" class="image"'}
					{resource_buy_options}
						{if text == "book" || text == "mag"}
							<div class="button-wrap">
								<a href="http://{exp:eehive_hacksaw}{url}{/exp:eehive_hacksaw}" target="_blank" class="super green button"><span>{if text == "book"}Buy the Book{/if}{if text == "mag"}Buy the Magazine{/if}</span></a>
							</div>
						{/if}
					{/resource_buy_options}
				</div>
				{resource_body}
			{if:elseif resource_type == "video"}
				{if logged_out}
					<a href="{path='signin'}" data-reveal-id="signin-modal-video">
						{resource_video_options}
							<div id="video-overlay" style="height:{if aspect_ratio == "widescreen"}276{if:elseif aspect_ratio == "standard"}368{/if}px;"></div>
						{/resource_video_options}
					</a>
				{/if}
				{exp:ce_img:single src="{resource_thumb}" max_width="490" attributes='alt="{title}" title="{title}" class="video-preview"'}
				
				{resource_video_options}
					<iframe src="http://player.vimeo.com/video/{vimeo_id}" width="490" height="{if aspect_ratio == "widescreen"}276{if:elseif aspect_ratio == "standard"}368{/if}" frameborder="0" class="video-player"></iframe>
				{/resource_video_options}
				
				{resource_body}
				
				{resource_buy_options}
					<div class="button-wrap clearfix">
						<a href="{exp:eehive_hacksaw}{url}{/exp:eehive_hacksaw}" target="_blank" class="super green button left"><span>{if text == "dvd"}Buy the DVD{/if}</span></a>
					</div>
				{/resource_buy_options}
			{/if}
			</div>
		<ul class="tags">
			<li data-icon="r">Tags:</li>
			{categories show_group="not 22"}
				{if category_group == "17"}<li><a href="{site_url}/resources/health-condition/{category_url_title}">{category_name}</a></li>{/if}
				{if category_group == "18"}<li><a href="{site_url}/resources/series/{category_url_title}">{category_name}</a></li>{/if}
				{if category_group == "19"}<li><a href="{site_url}/resources/living-better/{category_url_title}">{category_name}</a></li>{/if}
				{if category_group == "20"}<li><a href="{site_url}/resources/media/{category_url_title}">{category_name}</a></li>{/if}
				{if category_group == "21"}<li><a href="{site_url}/resources/partner/{category_url_title}">{category_name}</a></li>{/if}
				{if category_group == "22"}<li><a href="{site_url}/resources/language/{category_url_title}">{category_name}</a></li>{/if}
			{/categories}
		</ul>
		{exp:playa:children field="resource_related"}
		{if count == 1}
		<div class="related-entries">
			<h2>Related Entries</h2>
			<ul class="entry-grid clearfix">
		{/if}
				<li class="{switch='one|two|three|four'}">
					<a href="{path='{channel_short_name}/detail/{url_title}'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:single src="{resource_image}{recipe_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
					</a>
					<span class="title"><a href="{path='{channel_short_name}/detail/{url_title}'}">{title}</a></span>
				</li>
		{if count == total_results}
			</ul>
		</div>
		{/if}
		{/exp:playa:children}
		
		{embed="embeds/_comments" channel="resources"}
	
	</div>
	<div class="sidebar right">
		{exp:playa:children field="resource_author"}
		{if count == 1}
		<section class="section">
		{/if}
			<header class="bar"><a href="{url_title_path='services/detail'}">{title}</a></header>
			{service_bio}
			<p><a href="{url_title_path='resources/partner'}">View resources by {title}</a></p>
		{if count == total_results}
		</section>
		{/if}
		{/exp:playa:children}
		{embed="embeds/_share" channel="resources" image="{resource_thumb}"}
	</div>
	{/exp:channel:entries}
</div>
{embed="embeds/_doc-bottom" sim="recipe|video|comments"}