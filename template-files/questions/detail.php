{embed="embeds/_doc-top" 
	class="questions"
	title="{exp:low_title:entry url_title='{segment_3}' channel='questions'}"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='questions'}">Questions</a></li>
</ul>
{exp:channel:entries channel="questions"}
{if no_results || segment_4 !=""}
	{redirect="404"}
{/if}
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post clearfix">
			<div id="question">
				<span class="drop-cap">{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}Q.</span>
				<h1>{question_question}</h1>
			</div>
			<div id="answer">
				<span class="drop-cap">A.</span>
					{question_response}
				<p>Response by {question_responder}<a href="{url_title_path='services/detail'}">{title}</a>{/question_responder}</p>
			</div>
		</div>
		{embed="embeds/_comments" channel="{channel_short_name}"}
	</div>
	<div class="sidebar right">
		{question_responder}
			{if count == 1}
				<section class="section">
			{/if}
			
			<header class="bar"><a href="{url_title_path='services/detail'}">{title}</a></header>
			<p>{service_bio}</p>
			
			{if count == total_results}
				</section>
			{/if}
		{/question_responder}
		{embed="embeds/_share" channel="{channel_short_name}"}
	</div>
</div>
{/exp:channel:entries}
{embed="embeds/_doc-bottom" sim="comments"}