{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section} specializing in {segment_3_category_name}"
}
{assign_variable:channel="partners"}
{assign_variable:section="Partners"}
{embed="embeds/_rss-feed"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
<div class="heading clearfix">
  <h1>{segment_3_category_name}<!-- {segment_3_category_id} --></h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    {embed="partners/_page-listing" parameters="category='{segment_3_category_id}'"}
  </div>
  <div class="sidebar right">
    {embed="partners/_sidebar"}
  </div>
</div>
{embed="embeds/_doc-bottom"}