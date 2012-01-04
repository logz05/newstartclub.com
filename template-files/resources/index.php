{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section}"}
{assign_variable:channel="resources"}
{assign_variable:section="Resources"}
{embed="embeds/_rss-feed"}
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