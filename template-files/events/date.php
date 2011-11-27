{embed="embeds/_doc-top" 
  channel="{channel}"
  title="Events in {exp:nice_date date="{segment_3}-{segment_4}" format="%F %Y"}"}
{assign_variable:channel="events"}
{assign_variable:section="Events"}
{embed="embeds/_rss-feed"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
<div class="heading clearfix">
  <h1>{exp:nice_date date="{segment_3}-{segment_4}" format="%F %Y"}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    <ul id="listing">
  {embed="events/_event-listitem" parameters='search:event_start_date="{segment_3}-{segment_4}"'}
    </ul>
  </div>
  <div class="sidebar right">
    {embed="events/_sidebar"}
  </div>
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}