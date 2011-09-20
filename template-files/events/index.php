{embed="includes/_doc-top" 
  channel="{channel}"
  title="{section}"}
{assign_variable:channel="events"}
{assign_variable:section="Events"}
<div class="body">
  <div class="heading clearafter">
      <div class="icon"></div>
      <h1>{section}</h1>
  </div>
  <div class="grid23 clearafter">
    <div class="list left">
      <ul>
    {embed="events/_event-listitem"}
      </ul>
    </div>
    <div class="sidebar right">
      {embed="events/_sidebar"}
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}