{embed="embeds/_doc-top" 
	class="deals"
	title="Deals in {exp:weblog:entries weblog="locations" limit="1" search:location_state="={segment_3}" dynamic="off"}{location_state:label}{/exp:weblog:entries}"
"}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/deals">Deals</a></li>
</ul>
<div class="heading clearfix">
	<h1>{exp:weblog:entries weblog="locations" limit="1" search:location_state="={segment_3}" dynamic="off"}{location_state:label}{/exp:weblog:entries}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">

		<ul class="listing">
		{exp:weblog:entries weblog="locations" limit="12" sort="desc" paginate="bottom" dynamic="off" search:location_type="=profit" search:location_state="={segment_3}"}
			{reverse_related_entries orderby="expiration_date" sort="asc"}
			<li class="deal independant clearfix">
				<h2><a href="/deals/detail/{categories show_group="24"}{category_url_title}{/categories}">{title}</a>{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}</h2>
				<a href="/deals/detail/{categories show_group="24"}{category_url_title}{/categories}" class="image">
				{categories show_group="24"}
					{exp:ce_img:single src="{category_image}" max_width="100" max_height="75" crop="yes" attributes='alt="{title}" title="{title}"'}
				{/categories}
				</a>
				<div class="details">
					<p>
						{exp:trunchtml chars="125" inline="&hellip;"}
							{exp:html_strip}{deal_instructions}{/exp:html_strip}
						{/exp:trunchtml}
						<a class='link-more' href='/deals/detail/{categories show_group="24"}{category_url_title}{/categories}'>more&raquo;</a>
					</p>
					<p class="expires">{if expiration_date}Expires: {expiration_date format="%m/%d/%y"}{/if}</p>
					{if logged_out}
						<a class="show-coupon" href="/signin" data-reveal-id="signin-modal-coupon"><span data-icon="p">Show coupon code</span></a>
					{if:else}
						<a class="show-coupon" href="/deal/coupon/{url_title}" data-reveal-id="modal-coupon-{entry_id}"><span data-icon="p">Show coupon code</span></a>
					{/if}
				</div>
			</li>
			{/reverse_related_entries}
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
{embed="embeds/_doc-bottom"
	sim="coupon"
	show-coupons='{exp:weblog:entries weblog="locations" limit="12" sort="desc" paginate="bottom" dynamic="off" search:location_type="=profit" search:location_state="={segment_3}"}
									{reverse_related_entries orderby="expiration_date" sort="asc"}
										{entry_id}|
									{/reverse_related_entries}
								{/exp:weblog:entries}'
}