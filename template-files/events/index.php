{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section}"}
{assign_variable:channel="events"}
{assign_variable:section="Events"}
{embed="embeds/_rss-feed"}
<div class="heading clearfix">
  <div class="icon"></div>
  <h1>{section}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    <ul id="listing">
      {embed="events/_event-listitem"}
    </ul>
  </div>
  <div class="sidebar right">
    {embed="events/_sidebar"}
  </div>
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}