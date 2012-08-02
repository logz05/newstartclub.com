{embed="embeds/_doc-top" 
	class="partners"
	title="Partners in {exp:weblog:entries weblog="partners" limit="1" search:partner_state="={segment_3}" dynamic="off"}{partner_state:label}{/exp:weblog:entries}"
}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/partners">Partners</a></li>
</ul>
<div class="heading clearfix">
	<h1>{exp:weblog:entries weblog="partners" limit="1" search:partner_state="={segment_3}" dynamic="off"}{partner_state:label}{/exp:weblog:entries}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		{embed="partners/_page-listing" parameters="search:partner_state='={segment_3}'"}
	</div>
	<div class="sidebar right">
		{embed="partners/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}