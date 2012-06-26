{embed="embeds/_doc-top"
	class="faq"
	title="&ldquo;{exp:search:keywords}&rdquo; Search Results"
}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/faq">FAQ</a></li>
</ul>
<div class="heading clearfix">
	<h1>Search Results</h1>
</div>
<div id="entry">
	<p>Your search for <strong>&ldquo;{exp:search:keywords}&rdquo;</strong> found {exp:search:total_results}{total_results}{/exp:search:total_results} result{if "{exp:search:total_results}" != 1}s{/if}.</p>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<ul id="listing">
		{exp:search:search_results}
			<li class="question">
				<h2>Q.</h2>
				<h3><a href="{url_title_path='faq/detail'}">{qa_question}</a></h3>
				<p class="answer">
					{exp:trunchtml chars="120" inline="&hellip; <a class='link-more' href='{url_title_path='faq/detail'}'>more&raquo;</a>"}
						{exp:html_strip}{qa_answer}{/exp:html_strip}
					{/exp:trunchtml}
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
		{embed="faq/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom" sim="comments|question"}