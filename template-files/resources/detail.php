{embed="embeds/_doc-top" 
	class="resources"
	title="{exp:low_title:entry url_title='{segment_3}' channel='resources'}"
	microdata="article"
	meta='
		{exp:channel:entries channel="resources" url_title="{segment_3}"}
			<meta property="og:title" content="{title}"/>
			<meta property="og:url" content="{url_title_path='resources/detail'}"/>
			<meta property="og:type" content="article"/>
			<meta property="og:image" content="{resource_image}"/>
			<meta property="og:description" content="{exp:eehive_hacksaw chars="300" append="&hellip;"}{resource_body}{/exp:eehive_hacksaw}"/>
			<meta name="description" content="{exp:eehive_hacksaw chars="300" append="&hellip;"}{resource_body}{/exp:eehive_hacksaw}"/>
			<meta name="keywords" content="{categories show_group="not 22" backspace="1"}{category_name},{/categories}">
		{/exp:channel:entries}
	'
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='resources'}">Resources</a></li>
</ul>
{exp:channel:entries channel="resources" limit="1" require_entry="yes"}
{if no_results}
	{redirect="404"}
{/if}
{if segment_4}
	{redirect="404"}
{/if}
<div class="heading  clearfix">
	<h1>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
</div>
<div class="grid23  clearfix">
	<div class="main  left">
			<div class="post  {resource_type}  clearfix">
			{if resource_type == "video"}
				{if logged_out}
					<a href="{path='signin'}" data-reveal-id="signin-modal-video">
						{resource_video_options}
							<div class="video-overlay" style="height:{if aspect_ratio == "widescreen"}276{if:elseif aspect_ratio == "standard"}368{/if}px;"></div>
						{/resource_video_options}
					</a>
				{/if}
				{exp:ce_img:single src="{resource_thumb}" max_width="490" attributes='alt="{title}" title="{title}" class="video-preview"'}
				
				{resource_video_options}
					<iframe src="http://player.vimeo.com/video/{vimeo_id}" width="490" height="{if aspect_ratio == "widescreen"}276{if:elseif aspect_ratio == "standard"}368{/if}" frameborder="0" class="video-player"></iframe>
				{/resource_video_options}
				
				{resource_body}
				
				{resource_buy_options}
					<div class="button-wrap  clearfix">
						<a href="{exp:eehive_hacksaw}{url}{/exp:eehive_hacksaw}" target="_blank" class="super  green  button  left"><span>{if text == "dvd"}Buy the DVD{/if}</span></a>
					</div>
				{/resource_buy_options}
			{if:else}
				<figure class="figure  figure--main  left">
					{exp:ce_img:single src="{resource_image}" max_width="200" attributes='alt="{title}" title="{title}" class="{resource_type}"'}
					{resource_buy_options}
						<figcaption>
							<div class="button-wrap">
								<a href="{exp:eehive_hacksaw}{url}{/exp:eehive_hacksaw}" target="_blank" class="super  green  button"><span>{if text == "book"}Buy the Book{/if}{if text == "mag"}Buy the Magazine{/if}{if text == "dvd"}Buy the DVD{/if}</span></a>
							</div>
						</figcaption>
					{/resource_buy_options}
				</figure>
				{if resource_type == "product"}
					<div class="narrow">{resource_body}</div>
				{if:else}
					{resource_body}
				{/if}
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
			{/categories}
		</ul>
		{exp:playa:children field="resource_related"}
		{if count == 1}
		<div class="related-entries">
			<h2>Related Resources</h2>
			<ul class="entry-grid  four-wide  clearfix">
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
		
		{embed="embeds/_comments" channel="resources"}
	
	</div>
	<div class="sidebar  right">
		{exp:playa:children field="resource_author"}
		{if count == 1}
		<section class="section">
		{/if}
			<header class="bar"><a href="{url_title_path='services/detail'}">{title}{if service_credentials}, {service_credentials}{/if}</a></header>
			<figure class="figure  figure--small  left">
				<a href="{url_title_path='services/detail'}">{exp:ce_img:single src="{service_image}" max_width="64" max_height="64" crop="yes" attributes='alt="{title}" title="{title}"'}</a>
			</figure>
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