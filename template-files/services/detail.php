{embed="embeds/_doc-top" 
	class="services"
	title="
		{exp:channel:entries channel='services' url_title='{segment_3}' limit='1'}
			{title}{if service_credentials}, {service_credentials}{/if}
		{/exp:channel:entries}"
	microdata="person"
	meta='
		{exp:channel:entries channel="services" url_title="{segment_3}"}
			<meta property="og:title" content="{title}"/>
			<meta property="og:site_name" content="{site_name}"/>
			<meta property="og:url" content="{url_title_path='services/detail'}"/>
			<meta property="og:type" content="author"/>
			<meta property="og:image" content="{service_image}"/>
			<meta property="og:description" content="{exp:eehive_hacksaw chars="300" append="&hellip;"}{service_bio}{/exp:eehive_hacksaw}"/>
			<meta name="description" content="{exp:eehive_hacksaw chars="300" append="&hellip;"}{service_bio}{/exp:eehive_hacksaw}"/>
		{/exp:channel:entries}
	'
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='services'}">Services</a></li>
</ul>

{exp:channel:entries channel="services" limit="1" url_title="{segment_3}"}

{if no_results || segment_4 !=""}{redirect="404"}{/if}

<div class="heading  clearfix">
	<h1>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}{if service_credentials}, {service_credentials}{/if}</h1>
</div>

<div class="grid23  clearfix">
	<div class="main  left">
		<div class="post  clearfix">
		
			<figure class="figure  figure--main  left">
				{exp:ce_img:single src="{service_image}" max_width="200" max_height="200" crop="yes" attributes='alt="{title}" title="{title}" class="image"'}

				<figcaption>
					{exp:user:users group_id="6" dynamic="off" search:member_partner_id="{segment_3_category_id}" limit="1"}
						{if logged_out}
							<a href="{path='signin'}" class="super  small  secondary  button" data-reveal-id="signin-modal-question"><span>Ask a Question</span></a>
						{if:else}
							<a href="{site_url}/questions/ask/{segment_3}/{segment_3_category_id}" class="super  small  secondary  button"><span>Ask a Question</span></a>
						{/if}
					{/exp:user:users}
				</figcaption>
			</figure>
			
			<div class="bio">{service_bio}</div>
			
		</div>
		
		<ul class="tags">
			<li data-icon="r">Tags:</li>
			{categories show_group="40"}
				<li><a href="{site_url}/services/specialty/{category_url_title}">{category_name}</a></li>
			{/categories}
				<li><a href="{site_url}/services/state/{service_state}">{service_state:label}</a></li>
		</ul>
		
		
		
		<div class="related-entries">
				
			<h2>Contributions</h2>
			
			<ul class="icon-grid  clearfix">
				{if {exp:playa:total_parents channel="resources"}}
					<li><a href="{path='resources/partner/{segment_3}'}"><i class="i  resources" data-icon="d"></i><span class="link-text">Resources</span> <span class="count">({exp:playa:total_parents channel="resources"})</span></a></li>
				{/if}
				
				{if {exp:playa:total_parents channel="questions"}}
					<li><a href="{path='questions/partner/{segment_3}'}"><i class="i  questions" data-icon="i"></i><span class="link-text">Questions</span> <span class="count">({exp:playa:total_parents channel="questions"})</span></a></li>
				{/if}
				
				{if {exp:playa:total_parents channel="recipes"}}
					<li><a href="{path='recipes/partner/{segment_3}'}"><i class="i  recipes" data-icon="g"></i><span class="link-text">Recipes</span> <span class="count">({exp:playa:total_parents channel="recipes"})</span></a></li>
				{/if}
			</ul>
		
		</div>
		
	</div>
	
	
	
	<div class="sidebar  right">
		<section class="section">
			<header class="bar">Contact Information</header>
			{if logged_out}
				<p class="button-wrap">
					<a href="{path='signin'}" class="super small secondary button" data-reveal-id="signin-modal-contact"><span>View Contact Information</span></a>
				</p>
			{/if}
			
			{if logged_in}
				<dl>
					{if service_phone}
						<dt>Phone:</dt>
						<dd>{service_phone}</dd>
					{/if}
					
					{if service_address}
						<dt>Address:</dt>
						<dd>{service_address}<br />{service_city}, {service_state} {service_zip}</dd>
					{/if}
				</dl>
			{/if}
			
		</section>
		
		{embed="embeds/_share" channel="services" image="{service_image}"}
		
	</div>
	
</div>
{/exp:channel:entries}

{embed="embeds/_doc-bottom" sim="contact|question"}