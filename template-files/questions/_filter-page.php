{embed="embeds/_doc-top" 
	class="questions"
	title="{embed:title} {segment_3_category_name}"
}
{embed="embeds/_rss-feed"}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='questions'}">Questions</a></li>
</ul>
<div class="heading clearfix">
	{if segment_3 == ''}
		<h1>No questions here!</h1>
	{/if}
	{if segment_3_category_id == ''}
		<h1>No questions here!</h1>
	{if:else}
		<h1>{segment_3_category_name}</h1>
	{/if}
</div>
<div class="grid23 clearfix">
	<div class="main left">
		{if segment_3 == '' || segment_3_category_id == ''}
			<p>We could not find any questions at <strong><code>{segment_2}/{segment_3}</code></strong>.</p>
			<p>Please choose from a category on the right or click <a href="{path='questions'}">here</a> to all the questions.</p>
		{if:else}
			{embed="questions/_page-listing" category="{segment_3_category_id}" orderby="date" sort="desc"}
		{/if}
	</div>
	<div class="sidebar right">
		{embed="questions/_sidebar" channel="questions"}
	</div>
</div>
{embed="embeds/_doc-bottom"}