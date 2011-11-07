{embed="includes/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="{embed:title} {segment_3_category_name}"}
{assign_variable:channel="resources"}
{assign_variable:section="Resources"}
<div class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    {if segment_3 == ''}
      <h1>No resources here!</h1>
    {/if}
    {if segment_3_category_id == ''}
      <h1>No resources here!</h1>
    {if:else}
      <h1>{segment_3_category_name}</h1>
    {/if}
  </div>
  <div class="grid23 clearafter">
    <div class="list left">
    <!-- {segment_3_category_id} -->
      {if segment_3 == '' || segment_3_category_id == ''}
        <p>We could not find any resources at <strong><code>{segment_2}/{segment_3}</code></strong>.</p>
        <p>Please choose from a category on the right or click <a href="{path='{channel}'}">here</a> to see our latest resources.</p>
      {if:else}
        {embed="{channel}/_page-listing" category="{segment_3_category_id}" orderby="title" sort="asc"}
      {/if}
    </div><!--/.list-->
    <div class="sidebar right">
      {embed="{channel}/_sidebar" channel="{channel}"}
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
  <div id="rss-feed">
    <a href="/{segment_1}/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" title="RSS Feed">
      <div class="icon"></div><span>RSS Feed</span>
    </a>
  </div>
</div><!-- /.body -->
{embed="includes/_doc_bottom"}