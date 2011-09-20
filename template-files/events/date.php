{embed="includes/_doc-top" 
  channel="{channel}"
  title="Events in {exp:nice_date date="{segment_3}-{segment_4}" format="%F %Y"}"}
{assign_variable:channel="events"}
{assign_variable:section="Events"}
<div class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    <h1>{exp:nice_date date="{segment_3}-{segment_4}" format="%F %Y"}</h1>
  </div>
  <div class="grid23 clearafter">
    <div class="list left">
      <ul>
    {embed="events/_event-listitem" parameters='search:event_start_date="{segment_3}-{segment_4}"'}
      </ul>
    </div>
    <div class="sidebar right">
      {embed="events/_sidebar"}
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}