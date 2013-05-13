{embed="embeds/_doc-top"
	class="questions"
	title="&ldquo;{exp:search:keywords}&rdquo; Search Results"
}
<ul class="trail">
  <li><a href="{path='site_index'}">Home</a></li>
  <li><a href="{path='questions'}">Questions</a></li>
</ul>

<div class="heading clearfix">
	<h1>Search Results</h1>
</div>

<div class="grid23 clearfix">
	<div class="main left">
		<p>Your search for <strong>&ldquo;{exp:search:keywords}&rdquo;</strong> found {exp:search:total_results}{total_results}{/exp:search:total_results} result{if "{exp:search:total_results}" != 1}s{/if}.</p>
		{exp:search:search_results}
		
		{if count == 1}
			<ul class="listing">
		{/if}
			<li class="question">
				<h2><span class="drop-cap">Q.</span> <a href="{url_title_path='questions/detail'}">{exp:eehive_hacksaw}{question_question}{/exp:eehive_hacksaw}</a>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}</h2>
				<div class="details">
					<p class="answer">
						{exp:eehive_hacksaw chars="200" append="&hellip; <a class='link-more' href='{url_title_path='questions/detail'}'>more&raquo;</a>"}
							{question_response}
						{/exp:eehive_hacksaw}
					</p>
					<ul class="tags">
						<li data-icon="r">Tags:</li>
						{categories show_group="not 22"}
							{if category_group == "17"}<li><a href="{site_url}/questions/health-condition/{category_url_title}/">{category_name}</a></li>{/if}
							{if category_group == "19"}<li><a href="{site_url}/questions/living-better/{category_url_title}/">{category_name}</a></li>{/if}
							{if category_group == "21"}<li><a href="{site_url}/questions/partner/{category_url_title}/">{category_name}</a></li>{/if}
						{/categories}
					</ul>
				</div>
			</li>
			
			{if count == total_results}
				</ul>
			{/if}
			
			{paginate}
				<p class="pagination">{pagination_links}</p>
			{/paginate}
			
		{/exp:search:search_results}
	</div>
	
	<div class="sidebar right">
		{embed="questions/_sidebar"}
	</div>
	
</div>

{embed="embeds/_doc-bottom" sim="comments|question"}