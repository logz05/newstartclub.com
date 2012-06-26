{embed="embeds/_doc-top" 
	class="{class}"
	title="Deals"
"}
{assign_variable:class="deals"}
{if segment_3}
	{redirect="404"}
{/if}
<div class="heading clearfix">
	<div class="icon"></div>
	<h1>Deals</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<ul id="listing">
		{exp:weblog:entries weblog="deals" limit="12" sort="asc" paginate="bottom" dynamic="off"}
			<li class="deal clearfix">
				<h2><a href="/deals/detail/{url_title}">{title}</a>{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}</h2>
				<a href="#" class="image">
					{exp:ce_img:single src="{deal_image}" max_width="100" max_height="100" crop="yes" attributes='alt="{title}" title="{title}"'}
				</a>
				<div class="details">
					<p class="description">
						{deal_description}
					</p>
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
	<div class="sidebar right">
		<div class="bar">Deals</div>
		<p>Looking for discounts on products and services to keep you fit and strong? As a NEWSTART Lifestyle Club member, you'll get discounts to local businesses so you can start saving and continue living the NEWSTART Lifestyle.</p>
	</div>
</div>
{embed="embeds/_doc-bottom"}