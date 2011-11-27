{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{segment_3_category_name} {section}"}
{assign_variable:channel="events"}
{assign_variable:section="Events"}
{embed="embeds/_rss-feed"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
<div class="heading clearfix">
  <h1>{segment_3_category_name}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    <ul id="listing">
      {embed="events/_event-listitem" parameters='category="{segment_3_category_id}"'}
    </ul>
  </div>
  <div class="sidebar right">
    {embed="events/_sidebar"}
  </div>
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}