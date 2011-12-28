{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section}"
}
{assign_variable:channel="partners"}
{assign_variable:section="Partners"}
{embed="embeds/_rss-feed"}
<div class="heading clearfix">
  <div class="icon"></div>
  <h1>{section}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    {embed="partners/_page-listing"}
  </div><!--/.list-->
  <div class="sidebar right">
    {embed="partners/_sidebar"}
  </div><!--/.sidebar-->
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}