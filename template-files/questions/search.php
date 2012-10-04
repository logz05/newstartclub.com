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
<div class="post">
	<p>Your search for <strong>&ldquo;{exp:search:keywords}&rdquo;</strong> found {exp:search:total_results}{total_results}{/exp:search:total_results} result{if "{exp:search:total_results}" != 1}s{/if}.</p>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<ul class="listing">
		{exp:search:search_results}
			<li class="question">
				<h2>Q.</h2>
				<h3><a href="{url_title_path='questions/detail'}">{exp:eehive_hacksaw}{question_question}{/exp:eehive_hacksaw}</a></h3>
				<p class="answer">
					{exp:eehive_hacksaw chars="120" append="&hellip; <a class='link-more' href='{url_title_path='questions/detail'}'>more&raquo;</a>"}
						{question_response}
					{/exp:eehive_hacksaw}
				</p>
			</li>
		{/exp:search:search_results}
		{if paginate}
			<li class="pagination">
				<p>{paginate}</p>
			</li>
		{/if}
		</ul>
	</div>
	<div class="sidebar right">
		{embed="questions/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom" sim="comments|question"}