{embed="embeds/_doc-top" 
	class="questions"
	title="Questions"
}
{embed="embeds/_rss-feed" link="http://feeds.feedburner.com/newstartclub-questions"}
<div class="heading">
	<h1 data-icon="i">Questions</h1>
</div>

<div class="grid23 clearfix">
	<div class="main left">
{exp:channel:entries channel="questions" limit="9" orderby="date" sort="desc" paginate="bottom" dynamic="no"}
	{if count == 1}
		<ul class="listing">
	{/if}
			<li class="question">
				<h2>Q.</h2>
				<h3><a href="{url_title_path='questions/detail'}">{exp:eehive_hacksaw}{question_question}{/exp:eehive_hacksaw}</a>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}</h3>
				<p class="answer">
					{exp:eehive_hacksaw chars="120" append="&hellip; <a class='link-more' href='{url_title_path='questions/detail'}'>more&raquo;</a>"}
						{question_response}
					{/exp:eehive_hacksaw}
				</p>
			</li>
	{paginate}
		<p class="pagination">{pagination_links}</p>
	{/paginate}
	{if count == total_results}
		</ul>
	{/if}
{/exp:channel:entries}
	</div>
	<div class="sidebar right">
		{embed="questions/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}