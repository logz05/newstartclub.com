{embed="embeds/_doc-top" 
	class="services"
	title="{segment_3_category_name} Services"
}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='services'}">Services</a></li>
</ul>
<div class="heading clearfix">
	<h1>{segment_3_category_name}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		{embed="services/_page-listing" parameters="category='{segment_3_category_id}'"}
	</div>
	<div class="sidebar right">
		{embed="services/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}