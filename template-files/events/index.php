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
  <div id="rss-feed">
    <a href="/{segment_1}/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" title="RSS Feed">
      <div class="icon"></div><span>RSS Feed</span>
    </a>
  </div>
</div><!-- /.body -->
{embed="includes/_doc_bottom"}