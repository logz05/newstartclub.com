{embed="includes/_doc-top" 
  channel="{channel}"
  title="{section} sponsored by {segment_3_category_name}"}
{assign_variable:channel="events"}
{assign_variable:section="Events"}
<div class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    <h1>{segment_3_category_name}</h1>
  </div>
  <div class="grid23 clearafter">
    <div class="list left">
      <ul>
    {embed="events/_event-listitem" parameters='category="{segment_3_category_id}"'}
      </ul>
    </div>
    <div class="sidebar right">
      {embed="events/_sidebar"}
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}