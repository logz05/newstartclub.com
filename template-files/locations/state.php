{embed="embeds/_doc-top" 
	class="locations"
	title="Locations in {exp:channel:entries channel="locations" limit="1" search:location_state="={segment_3}" dynamic="no"}{location_state:label}{/exp:channel:entries}"
}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='locations'}">Locations</a></li>
</ul>
<div class="heading clearfix">
	<h1>{exp:channel:entries channel="locations" limit="1" search:location_state="={segment_3}" dynamic="no"}{location_state:label}{/exp:channel:entries}</h1>
</div>		
<div class="grid23 clearfix">
	<div class="main left">
		{embed="locations/_page-listing" parameters="search:location_state='={segment_3}'"}
	</div>
	<div class="sidebar right">
		{embed="locations/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}