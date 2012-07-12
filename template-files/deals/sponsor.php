{embed="embeds/_doc-top" 
	class="deals"
	title="Deals sponsored by {segment_3_category_name}"
"}
{embed="embeds/_rss-feed"}
<ul id="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/deals">Deals</a></li>
</ul>
<div class="heading clearfix">
	<h1>{segment_3_category_name}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<ul class="listing">
		{exp:weblog:entries weblog="deals" limit="12" orderby="expiration_date|date" sort="asc|desc" paginate="bottom" dynamic="off" show_future_entries="yes" category="{segment_3_category_id}"}
			<li class="deal independant clearfix">
				<h2><a href="/deals/detail/{categories}{category_url_title}{/categories}">{title}</a>{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}</h2>
				<a href="/deals/detail/{categories}{category_url_title}{/categories}" class="image">
				{categories}
					{exp:ce_img:single src="{category_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
				{/categories}
				</a>
				<div class="details">
					<p>{exp:html_strip}{deal_instructions}{/exp:html_strip} <a class='link-more' href='/deals/detail/{categories}{category_url_title}{/categories}'>more&raquo;</a><p>
					<p class="expires">{if expiration_date}Expires: {expiration_date format="%m/%d/%y"}{/if}</p>
					{if logged_out}
						<a class="show-code" href="/signin" data-reveal-id="signin-modal-coupon"><span data-icon="p">Show coupon code</span></a>
					{if:else}
						<a class="show-code" href="{url_title_path='deals/coupon'}" target="_blank"><span data-icon="p">Show coupon code</span></a>
					{/if}
				</div>
			</li>
			{paginate}
				{if "{total_pages}" > 1}
					<li class="pagination">
						<p>{pagination_links}</p>
					</li>
				{/if}
			{/paginate}
		{/exp:weblog:entries}
		</ul>
	</div>
	{embed="deals/_sidebar"}
</div>
{embed="embeds/_doc-bottom"}