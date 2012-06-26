{if segment_2 == "recipes"}
	{redirect="404"}
{/if}
{embed="embeds/_doc-top" 
	class="resources"
	title="Resources"
}
{embed="embeds/_rss-feed" link="http://feeds.feedburner.com/newstartclub-resources"}
<div class="heading clearfix">
	<i>3</i>
	<h1>Resources</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		{embed="resources/_page-listing" orderby="date" sort="desc"}
	</div>
	<div class="sidebar right">
		{embed="resources/_sidebar" channel="resources"}
	</div>
</div>
{embed="embeds/_doc-bottom"}