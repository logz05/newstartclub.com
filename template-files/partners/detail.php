{embed="embeds/_doc-top" 
	class="partners"
	title="
		{exp:weblog:entries weblog='partners' url_title='{segment_3}' limit='1'}
			{title}{if partner_cred != ""}, {partner_cred}{/if}
		{/exp:weblog:entries}"
}
<ul id="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/partners">Partners</a></li>
</ul>
{exp:weblog:entries weblog="partners" limit="1" require_entry="yes"}
{if no_results || segment_4 !=""}{redirect="404"}{/if}
<div class="heading clearfix">
	<h1>{embed="embeds/_edit-this" weblog_id="{weblog_id}" entry_id="{entry_id}" title="{title}"}{title}{if partner_cred != ""}, {partner_cred}{/if}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post">
			{exp:ce_img:single src="{partner_photo}" max_width="200" max_height="200" crop="yes" attributes='alt="{title}" title="{title}" class="image"'}
			<div class="bio">{partner_bio}</div>
		</div>
		{/exp:weblog:entries}
	</div>
	<div class="sidebar right">
		<div class="bar">Contact Information</div>
		{if logged_out}
			<p class="button-wrap">
				<a href="/signin" class="super small secondary button" data-reveal-id="signin-modal-contact"><span>View Contact Information</span></a>
			</p>
		{/if}
		{if logged_in}
			<dl>
				{exp:weblog:entries weblog="partners" sort="asc" limit="1"}
					{if partner_phone != ""}
						<dt>Phone:</dt>
						<dd>{partner_phone}</dd>
					{/if}
					{if partner_address != ""}
						<dt>Address:</dt>
						<dd>{partner_address}<br />
					{partner_city}, {partner_state} {partner_zip}</dd>
					{/if}
						<dt>Specialty:</dt>
						<dd>{categories backspace="1"}<a href="/partners/specialty/{category_url_title}/">{category_name}</a>, {/categories}</dd>
				{/exp:weblog:entries}
			</dl>
		{/if}
		{if segment_3_category_id}
		{exp:weblog:entries weblog="resources" dynamic="off" limit="1" category="{segment_3_category_id}"}
			<p>
				<a href="/resources/partner/{segment_3}">View Resources by {segment_3_category_name}</a>
			</p>
		{/exp:weblog:entries}
		{/if}
	</div>
</div>
{embed="embeds/_doc-bottom" sim="contact"}