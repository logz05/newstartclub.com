{embed="embeds/_doc-top" 
	class="services"
	title="
		{exp:channel:entries channel='services' url_title='{segment_3}' limit='1'}
			{title}{if partner_cred}, {partner_cred}{/if}
		{/exp:channel:entries}"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='services'}">Services</a></li>
</ul>
{exp:channel:entries channel="services" limit="1" require_entry="yes"}
{if no_results || segment_4 !=""}{redirect="404"}{/if}
<div class="heading clearfix">
	<h1>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}{if partner_cred != ""}, {partner_cred}{/if}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post">
			{exp:ce_img:single src="{service_image}" max_width="200" max_height="200" crop="yes" attributes='alt="{title}" title="{title}" class="image"'}
			<div class="bio">{service_bio}</div>
		</div>
		{/exp:channel:entries}
	</div>
	<div class="sidebar right">
		<section class="section">
			<header class="bar">Contact Information</header>
			{if logged_out}
				<p class="button-wrap">
					<a href="{path='signin'}" class="super small secondary button" data-reveal-id="signin-modal-contact"><span>View Contact Information</span></a>
				</p>
			{/if}
			{if logged_in}
				<dl>
					{exp:channel:entries channel="services" sort="asc" limit="1"}
						{if service_phone}
							<dt>Phone:</dt>
							<dd>{service_phone}</dd>
						{/if}
						{if service_address}
							<dt>Address:</dt>
							<dd>{service_address}<br />
						{service_city}, {service_state} {service_zip}</dd>
						{/if}
							<dt>Specialty:</dt>
							<dd>{categories backspace="2"}<a href="/services/specialty/{category_url_title}/">{category_name}</a>, {/categories}</dd>
					{/exp:channel:entries}
				</dl>
			{/if}
			{if segment_3_category_id}
			{exp:channel:entries channel="resources" dynamic="no" limit="1" category="{segment_3_category_id}"}
				<p>
					<a href="/resources/partner/{segment_3}">View Resources by {segment_3_category_name}</a>
				</p>
			{/exp:channel:entries}
			{/if}
		</section>
	</div>
</div>
{embed="embeds/_doc-bottom" sim="contact"}