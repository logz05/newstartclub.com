{embed="embeds/_doc-top" 
	class="resources"
	title="
		{exp:weblog:entries weblog='resources' url_title='{segment_3}'}
			{title}
		{/exp:weblog:entries}
"}
<ul id="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/resources">Resources</a></li>
</ul>
{exp:weblog:entries weblog="resources" limit="1" require_entry="yes"}
{if segment_4 !="" || segment_2 == ""}{redirect="404"}{/if}
{if no_results}
<div class="heading clearfix">
	<h1>Our recipes have moved!</h1>
</div>
<div class="post clearfix">
	<p>It appears that this link is outdated. But no worries! <strong>You can find your recipe at this link:<br></strong> <a href="{path='recipes/detail/{segment_3}'}">{site_url}recipes/detail/{segment_3}</a></p>
</div>
{/if}
<div class="heading clearfix">
	<h1>{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post {resource_display_style} clearfix">
		{if resource_display_style == "article"}
			<div id="entry-details">
				{exp:ce_img:single src="{resource_thumb}" max_width="200" attributes='alt="{title}" title="{title}" class="image"'}
				{if resource_buy_url}
					<div class="button-wrap">
						<a href="{exp:html_strip}{resource_buy_url}{/exp:html_strip}" target="_blank" class="super green button"><span>{if resource_buy_button == "book"}Buy the Book{/if}{if resource_buy_button == "mag"}Buy the Magazine{/if}</span></a>
					</div>
				{/if}
			</div>
			{resource_description}
		{if:elseif resource_display_style == "video"}
			{if logged_out}
				<a href="{path='signin'}" data-reveal-id="signin-modal-video">
					<div id="video-overlay" style="height:{if resource_aspect_ratio == "widescreen"}276{if:elseif resource_aspect_ratio == "standard"}368{/if}px;"></div>
				</a>
			{/if}
			{exp:ce_img:single src="{resource_thumb}" max_width="490" attributes='alt="{title}" title="{title}" class="video-preview"'}
			<iframe src="http://player.vimeo.com/video/{resource_vimeo_id}" width="490" height="{if resource_aspect_ratio == "widescreen"}276{if:elseif resource_aspect_ratio == "standard"}368{/if}" frameborder="0" class="video-player"></iframe>
			{resource_description}
			{if resource_buy_url}
				<div class="button-wrap clearfix">
					<a href="{exp:html_strip}{resource_buy_url}{/exp:html_strip}" target="_blank" class="super green button left"><span>{if resource_buy_button == "dvd"}Buy the DVD{/if}</span></a>
				</div>
			{/if}
		{/if}
		</div>
		<ul class="tags">
			<li data-icon="r">Tags:</li>
			{categories show_group="not 22"}
				{if category_group == "17"}<li><a href="{site_url}resources/health-condition/{category_url_title}/">{category_name}</a></li>{/if}
				{if category_group == "18"}<li><a href="{site_url}resources/series/{category_url_title}/">{category_name}</a></li>{/if}
				{if category_group == "19"}<li><a href="{site_url}resources/living-better/{category_url_title}/">{category_name}</a></li>{/if}
				{if category_group == "20"}<li><a href="{site_url}resources/media/{category_url_title}/">{category_name}</a></li>{/if}
				{if category_group == "21"}<li><a href="{site_url}resources/partner/{category_url_title}/">{category_name}</a></li>{/if}
				{if category_group == "22"}<li><a href="{site_url}resources/language/{category_url_title}/">{category_name}</a></li>{/if}
			{/categories}
		</ul>
		{/exp:weblog:entries}
		{exp:weblog:entries weblog="resources" limit="1" url_title="{segment_3}"}
		{if resource_related_entry1}
		<div id="related-entries">
			<h2>Related Entries</h2>
			<ul class="clearfix">{/if}
			{related_entries id="resource_related_entry1"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{if resource_related_entry2}
			{related_entries id="resource_related_entry2"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}{if resource_related_entry3}
			{related_entries id="resource_related_entry3"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}{if resource_related_entry4}
			{related_entries id="resource_related_entry4"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}
			{if resource_related_entry1}</ul>{/if}
			{if resource_related_entry5}
			<ul class="clearfix">
			{related_entries id="resource_related_entry5"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}{if resource_related_entry6}
			{related_entries id="resource_related_entry6"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}{if resource_related_entry7}
			{related_entries id="resource_related_entry7"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}{if resource_related_entry8}
			{related_entries id="resource_related_entry8"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}
			{if resource_related_entry5}</ul>{/if}
			{if resource_related_entry9}
			<ul class="clearfix">
			{related_entries id="resource_related_entry9"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}{if resource_related_entry10}
			{related_entries id="resource_related_entry10"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}{if resource_related_entry11}
			{related_entries id="resource_related_entry11"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}{if resource_related_entry12}
			{related_entries id="resource_related_entry12"}
				<li>
					<a href="{url_title_path='resources/detail'}" class="image">
						{if resource_display_style == "video"}<span class="play"><i></i></span>{/if}
						{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
							<img src="{made}" alt="{title}" width="{width}" height="{height}" />
						{/exp:ce_img:pair}
					</a>
					<span class="title"><a href="{url_title_path='resources/detail'}">{title}</a></span>
				</li>
			{/related_entries}{/if}
			{if resource_related_entry5}</ul>{/if}
		{if resource_related_entry1}</div>{/if}
		
		{embed="embeds/_comments" channel="resources"}
		
	{/exp:weblog:entries}
	
	</div>
	{exp:weblog:entries weblog="resources" limit="1" url_title="{segment_3}"}
		<div class="sidebar right {if resource_ingredients}ingredients{/if}">
			{if resource_partner != ""}
				{related_entries id="resource_partner"}
					<div class="bar"><a href="{url_title_path='partners/detail'}">{title}</a></div>
					{partner_bio}
					<p><a href="{url_title_path='resources/partner'}">View resources by {title}</a></p>
				{/related_entries}
			{/if}
			{if resource_partner2 != ""}
				{related_entries id="resource_partner2"}
				<div class="bar"><a href="{url_title_path='partners/detail'}">{title}</a></div>
				{partner_bio}
				<p><a href="{url_title_path='resources/partner'}">View resources by {title}</a></p>
				{/related_entries}
			{/if}
			{if resource_ingredients}
				<div class="bar ingredients">Ingredients</div>
				{if logged_out}
					<p class="button-wrap">
						<a href="{path='signin'}" class="super small secondary button" data-reveal-id="signin-modal-recipe"><span>View Ingredients</span></a>
					</p>
				{if:else}
					{resource_ingredients}
				{/if}
			{/if}
			{embed="embeds/_share" channel="resources" image="{resource_thumb}"}
		</div>
	{/exp:weblog:entries}
</div>
{embed="embeds/_doc-bottom" sim="recipe|video|comments"}