{embed="embeds/_doc-top" 
	class="faq"
	title="
		{exp:weblog:entries weblog="questions" limit="1" disable="member_data|categories"}
			{title}
		{/exp:weblog:entries}"
}
<ul class="trail">
	<li><a href="/">Home</a></li>
	<li><a href="/faq">FAQ</a></li>
</ul>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post clearfix">
			{exp:weblog:entries weblog="questions" limit="1" require_entry="yes"}
				{if no_results || segment_4 !=""}{redirect="404"}{/if}
				<div id="question">
					<span class="drop-cap">Q.</span>
					<h1>{qa_question}</h1>
				</div>
				<div id="answer">
					<span class="drop-cap">A.</span>
						{qa_answer}
						<p>Response by {related_entries id="qa_author"}<a href="{url_title_path='partners/detail'}">{title}</a>{/related_entries}</p>
				</div>
			{/exp:weblog:entries}
		</div>
		{embed="embeds/_comments" channel="questions"}
	</div>
	<div class="sidebar right">
		{exp:weblog:entries weblog="questions" limit="1" url_title="{segment_3}"}
			{related_entries id="qa_author"}
			<header class="bar"><a href="{url_title_path='partners/detail'}">{title}</a></header>
			<p>{partner_bio}</p>
			{/related_entries}
		{/exp:weblog:entries}
		{embed="embeds/_share" channel="questions"}
	</div>
</div>
{embed="embeds/_doc-bottom" sim="comments"}