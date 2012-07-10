{embed="embeds/_doc-top" 
	class="faq"
	title="FAQ"
}
{embed="embeds/_rss-feed" link="http://feeds.feedburner.com/newstartclub-faq"}
<div class="heading">
	<h1 data-icon="i">FAQ</h1>
</div>

<div class="grid23 clearfix">
	<div class="main left">
		<ul class="listing">
		{exp:weblog:entries weblog="questions" limit="9" orderby="date" sort="desc" paginate="bottom" dynamic="off"}
			<li class="question">
				<h2>Q.</h2>
				<h3><a href="{url_title_path='faq/detail'}">{qa_question}</a></h3>
				<p class="answer">
					{exp:trunchtml chars="120" inline="&hellip; <a class='link-more' href='{url_title_path='faq/detail'}'>more&raquo;</a>"}
						{exp:html_strip}{qa_answer}{/exp:html_strip}
					{/exp:trunchtml}
				</p>
			</li>
			{paginate}
				{if "{total_pages}" > 1}
					<li class="pagination">
						<p>{pagination_links}</p>
					</li>
				{/if}
			{/paginate}
		{/exp:weblog:entries}
		</ul>
	</div>
	<div class="sidebar right">
		{embed="faq/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}