{embed="includes/_doc-top" 
	channel="{channel}"
	section="{section}"
	title="
		{exp:weblog:entries weblog='{channel}' url_title='{segment_3}'}
			{title}
		{/exp:weblog:entries}
"}
{assign_variable:channel="resources"}
{assign_variable:section="Resources"}
<div id="{channel}" class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
	<div class="heading clearafter">
		{exp:weblog:entries weblog="{channel}" limit="1" url_title="{segment_3}"}<h1>{title}</h1>{/exp:weblog:entries}
	</div>
	<div class="grid23 clearafter">
		<div class="single left">{exp:weblog:entries weblog="resources" limit="1" url_title="{segment_3}"}
			<div class="content {resource_display_style}">
			{if resource_display_style == "recipe"}
				{exp:ce_img:single src="{resource_thumb}" max_width="200" max_height="150" crop="yes" attributes='alt="{title}" title="{title}"'}
				<div class="description">{resource_description}</div>
			{if:elseif resource_display_style == "article"}
				{exp:ce_img:single src="{resource_thumb}" max_width="200" max_height="150" crop="yes" attributes='alt="{title}" title="{title}"'}
				{resource_description}
			{if:elseif resource_display_style == "video"}
				{if logged_out}
					<a href="{path='members/signin'}" data-reveal-id="signin-modal-video">
						<div id="video-overlay" style="height:{if resource_aspect_ratio == "widescreen"}276{if:elseif resource_aspect_ratio == "standard"}368{/if}px;"></div>
					</a>
					<iframe src="http://player.vimeo.com/video/{resource_vimeo_id}" width="490" height="{if resource_aspect_ratio == "widescreen"}276{if:elseif resource_aspect_ratio == "standard"}368{/if}" frameborder="0"></iframe>
				{/if}
				{if logged_in}
					<iframe src="http://player.vimeo.com/video/{resource_vimeo_id}" width="490" height="{if resource_aspect_ratio == "widescreen"}276{if:elseif resource_aspect_ratio == "standard"}368{/if}" frameborder="0"></iframe>
				{/if}
				{resource_description}
			{/if}
				<div class="button-wrap clearafter">
					{if resource_buy_url != ""}
						<a href="http://www.weimarmarket.com/catalog/{resource_buy_url}" class="super green button left"><span>Buy the DVD</span></a>
					{/if}
					{!--{exp:cartthrob:add_to_cart_form entry_id="{entry_id}" return="cart/index" id="add-to-cart" class="hide"}
						<label for="quantity">Qty:</label> <input name="quantity" class="input" type="text" value="1" size="2" />
						<button type="submit" class="super blue button left"><span>Add to cart</span></button>
						<span class="price">${resource_price}</span>
					{/exp:cartthrob:add_to_cart_form}--}
				</div>
				<ul class="tags">
					<li><span>Tags:</span></li>
					{categories show_group="not 22"}<li><a href="{site_url}{channel}/{partners_path}{living_better_path}{recipe_path}{media_path}{language_path}{series_path}{condition_path}/{category_url_title}/">{category_name}</a></li>
					{/categories}
				</ul>
			</div>
			{/exp:weblog:entries}
			{exp:weblog:entries weblog="{channel}" limit="1" url_title="{segment_3}"}
			{if resource_related_entry1}
			<div id="related-entries">
				<h2>Related Entries</h2>
				<ul class="clearafter">{/if}
				{related_entries id="resource_related_entry1"}
					<li class="related-entry resource">
						<a href="{path='{channel}/detail/{url_title}'}" class="image">
							{if resource_display_style == "video"}<span class="play"></span>{/if}
							{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
								<img src="{made}" alt="{title}" width="{width}" height="{height}" />
							{/exp:ce_img:pair}
						</a>
						<h1><a href="{path='{channel}/detail/{url_title}'}">{title}</a></h1>
					</li>
				{/related_entries}{if resource_related_entry2}
				{related_entries id="resource_related_entry2"}
					<li class="related-entry resource">
						<a href="{path='{channel}/detail/{url_title}'}" class="image">
							{if resource_display_style == "video"}<span class="play"></span>{/if}
							{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
								<img src="{made}" alt="{title}" width="{width}" height="{height}" />
							{/exp:ce_img:pair}
						</a>
						<h1><a href="{path='{channel}/detail/{url_title}'}">{title}</a></h1>
					</li>
				{/related_entries}{/if}{if resource_related_entry3}
				{related_entries id="resource_related_entry3"}
					<li class="related-entry resource">
						<a href="{path='{channel}/detail/{url_title}'}" class="image">
							{if resource_display_style == "video"}<span class="play"></span>{/if}
							{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
								<img src="{made}" alt="{title}" width="{width}" height="{height}" />
							{/exp:ce_img:pair}
						</a>
						<h1><a href="{path='{channel}/detail/{url_title}'}">{title}</a></h1>
					</li>
				{/related_entries}{/if}{if resource_related_entry4}
				{related_entries id="resource_related_entry4"}
					<li class="related-entry resource">
						<a href="{path='{channel}/detail/{url_title}'}" class="image">
							{if resource_display_style == "video"}<span class="play"></span>{/if}
							{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
								<img src="{made}" alt="{title}" width="{width}" height="{height}" />
							{/exp:ce_img:pair}
						</a>
						<h1><a href="{path='{channel}/detail/{url_title}'}">{title}</a></h1>
					</li>
				{/related_entries}{/if}
				{if resource_related_entry5}
				</ul>
				<ul class="clearafter">
				{related_entries id="resource_related_entry5"}
					<li class="related-entry resource">
						<a href="{path='{channel}/detail/{url_title}'}" class="image">
							{if resource_display_style == "video"}<span class="play"></span>{/if}
							{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
								<img src="{made}" alt="{title}" width="{width}" height="{height}" />
							{/exp:ce_img:pair}
						</a>
						<h1><a href="{path='{channel}/detail/{url_title}'}">{title}</a></h1>
					</li>
				{/related_entries}{/if}{if resource_related_entry6}
				{related_entries id="resource_related_entry6"}
					<li class="related-entry resource">
						<a href="{path='{channel}/detail/{url_title}'}" class="image">
							{if resource_display_style == "video"}<span class="play"></span>{/if}
							{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
								<img src="{made}" alt="{title}" width="{width}" height="{height}" />
							{/exp:ce_img:pair}
						</a>
						<h1><a href="{path='{channel}/detail/{url_title}'}">{title}</a></h1>
					</li>
				{/related_entries}{/if}{if resource_related_entry7}
				{related_entries id="resource_related_entry7"}
					<li class="related-entry resource">
						<a href="{path='{channel}/detail/{url_title}'}" class="image">
							{if resource_display_style == "video"}<span class="play"></span>{/if}
							{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
								<img src="{made}" alt="{title}" width="{width}" height="{height}" />
							{/exp:ce_img:pair}
						</a>
						<h1><a href="{path='{channel}/detail/{url_title}'}">{title}</a></h1>
					</li>
				{/related_entries}{/if}{if resource_related_entry8}
				{related_entries id="resource_related_entry8"}
					<li class="related-entry resource">
						<a href="{path='{channel}/detail/{url_title}'}" class="image">
							{if resource_display_style == "video"}<span class="play"></span>{/if}
							{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
								<img src="{made}" alt="{title}" width="{width}" height="{height}" />
							{/exp:ce_img:pair}
						</a>
						<h1><a href="{path='{channel}/detail/{url_title}'}">{title}</a></h1>
					</li>
				{/related_entries}{/if}{if resource_related_entry9}
				{related_entries id="resource_related_entry9"}
					<li class="related-entry resource">
						<a href="{path='{channel}/detail/{url_title}'}" class="image">
							{if resource_display_style == "video"}<span class="play"></span>{/if}
							{exp:ce_img:pair src="{resource_thumb}" max_width="100" max_height="75" crop="yes" debug="yes"}
								<img src="{made}" alt="{title}" width="{width}" height="{height}" />
							{/exp:ce_img:pair}
						</a>
						<h1><a href="{path='{channel}/detail/{url_title}'}">{title}</a></h1>
					</li>
				{/related_entries}{/if}{if resource_related_entry1}</ul>
			</div>{/if}
		{/exp:weblog:entries}
		
		{embed="includes/_comments" channel="{channel}"}
		
		</div>
		{exp:weblog:entries weblog="{channel}" limit="1" url_title="{segment_3}"}
			<div class="sidebar right {if resource_ingredients}ingredients{/if}">
				{related_entries id="resource_partner"}
					<div class="bar"><a href="{url_title_path='partners/detail'}">{title}</a></div>
					{partner_bio}
					<p><a href="{url_title_path='{channel}/partner'}">View resources by {title}</a></p>
				{/related_entries}
				{if resource_partner2 != ""}
					{related_entries id="resource_partner2"}
					<div class="bar"><a href="{url_title_path='partners/detail'}">{title}</a></div>
					{partner_bio}
					<p><a href="{url_title_path='{channel}/partner'}">View resources by {title}</a></p>
					{/related_entries}
				{/if}
				{if resource_ingredients}
					<div class="bar ingredients">Ingredients</div>
					{if logged_out}
						<p class="button-wrap">
							<a href="{path='members/signin'}" class="super small secondary button" data-reveal-id="signin-modal-ingredients"><span>View Ingredients</span></a>
						</p>
					{if:else}
						{resource_ingredients}
					{/if}
				{/if}
				{embed="includes/_share" channel="{channel}"}
			</div>
		{/exp:weblog:entries}
	</div>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
</div><!-- /.body -->
{embed="includes/_signin-modal modal-role="ingredients" modal-msg="You must be signed in to view the ingredients."}
{embed="includes/_signin-modal modal-role="video" modal-msg="You must be signed in to view &ldquo;{exp:weblog:entries weblog="resources" limit="1" url_title="{segment_3}"}{title}{/exp:weblog:entries}&rdquo;"}
{embed="includes/_signin-modal modal-role="comments" modal-msg="You must be signed in to leave a comment."}
{embed="includes/_doc_bottom" script_add="comments"}