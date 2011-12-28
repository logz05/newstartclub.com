{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section}"}
{assign_variable:channel="resources"}
{assign_variable:section="Resources"}
<div id="rss-feed">
  <a href="/{segment_1}/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" title="RSS Feed">
    <div class="icon"></div><span>RSS Feed</span>
  </a>
</div>
<div class="heading clearfix">
  <div class="icon"></div>
  <h1>{section}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    {embed="{channel}/_page-listing" orderby="date" sort="desc"}
  </div>
  <div class="sidebar right">
    {embed="{channel}/_sidebar" channel="{channel}"}
  </div>
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}