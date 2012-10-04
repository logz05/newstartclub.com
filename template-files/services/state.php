{embed="embeds/_doc-top" 
	class="services"
	title="Services in {exp:channel:entries channel='services' limit='1' search:service_state='={segment_3}' dynamic='off'}{service_state:label}{/exp:channel:entries}"
}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='services'}">Services</a></li>
</ul>
<div class="heading clearfix">
	<h1>{exp:channel:entries channel="services" limit="1" search:service_state="={segment_3}" dynamic="no"}{service_state:label}{/exp:channel:entries}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		{embed="services/_page-listing" parameters="search:service_state='={segment_3}'"}
	</div>
	<div class="sidebar right">
		{embed="services/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}