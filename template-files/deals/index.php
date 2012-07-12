{embed="embeds/_doc-top" 
	class="deals"
	title="Deals"
"}
{if segment_3}
	{redirect="404"}
{/if}
{embed="embeds/_rss-feed" link="http://feeds.feedburner.com/newstartclub-deals"}
<div class="heading clearfix">
	<h1 data-icon="n">Deals</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<ul class="listing">
		{exp:weblog:entries weblog="deals" limit="12" orderby="expiration_date" sort="asc" paginate="bottom" dynamic="off" show_future_entries="yes"}
			<li class="deal independant clearfix">
				<h2><a href="/deals/detail/{categories}{category_url_title}{/categories}">{title}</a>{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}</h2>
				<a href="/deals/detail/{categories}{category_url_title}{/categories}" class="image">
				{categories}
					{exp:ce_img:single src="{category_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
				{/categories}
				</a>
				<div class="details">
					<p>
						{exp:trunchtml chars="125" inline="&hellip;"}
							{exp:html_strip}{deal_instructions}{/exp:html_strip}
						{/exp:trunchtml}
						<a class='link-more' href='/deals/detail/{categories}{category_url_title}{/categories}'>more&raquo;</a>
					</p>
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
{embed="embeds/_doc-bottom" sim="coupon"}