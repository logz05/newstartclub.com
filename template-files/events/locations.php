{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section} in {segment_4}, {segment_3}"}
{assign_variable:channel="events"}
{assign_variable:section="Events"}
{embed="embeds/_rss-feed"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}/">{section}</a></li>
</ul>
<div class="heading clearfix">
  <h1>{segment_4}, {segment_3}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    <ul id="listing">
  {embed="events/_event-listitem" parameters='search:event_state="={segment_3}" search:event_city="={segment_4}"'}
    </ul>
  </div>
  <div class="sidebar right">
    {embed="events/_sidebar"}
  </div>
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}