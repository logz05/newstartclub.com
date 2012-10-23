{exp:channel:entries channel="questions" limit="9" orderby="date" sort="desc" paginate="bottom" dynamic="no" {if embed:category}category="{segment_3_category_id}"{/if}}
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