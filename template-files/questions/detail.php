{embed="embeds/_doc-top" 
	class="questions"
	title="{exp:low_title:entry url_title='{segment_3}' channel='questions'}"
	meta='
		{exp:channel:entries channel="questions" url_title="{segment_3}"}
			<meta property="og:title" content="{exp:eehive_hacksaw}{question_question}{/exp:eehive_hacksaw}"/>
			<meta property="og:site_name" content="{site_name}"/>
			<meta property="og:url" content="{url_title_path='questions/detail'}"/>
			<meta property="og:type" content="article"/>
			<meta property="og:image" content="{site_url}/assets/css/images/icon-questions.png"/>
			<meta property="og:description" content="{exp:eehive_hacksaw chars="300" append="&hellip;"}{question_response}{/exp:eehive_hacksaw}"/>
			<meta name="description" content="{exp:eehive_hacksaw chars="300" append="&hellip;"}{question_response}{/exp:eehive_hacksaw}"/>
		{/exp:channel:entries}
	'
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='questions'}">Questions</a></li>
</ul>
{exp:channel:entries channel="questions"}
{if no_results || segment_4 !=""}
	{redirect="404"}
{/if}
<div class="heading clearfix">
	<h1>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<div class="post clearfix">
			<h2 class="question"><span class="drop-cap">Q.</span> {exp:eehive_hacksaw}{question_question}{/exp:eehive_hacksaw}</h2>
			<span class="drop-cap answer">A.</span>
			{question_response}
		</div>
		<ul class="tags">
			<li data-icon="r">Tags:</li>
			{categories show_group="not 22"}
				{if category_group == "17"}<li><a href="{site_url}/questions/health-condition/{category_url_title}">{category_name}</a></li>{/if}
				{if category_group == "19"}<li><a href="{site_url}/questions/living-better/{category_url_title}">{category_name}</a></li>{/if}
				{if category_group == "21"}<li><a href="{site_url}/questions/partner/{category_url_title}">{category_name}</a></li>{/if}
			{/categories}
		</ul>
		{embed="embeds/_comments" channel="{channel_short_name}"}
	</div>
	<div class="sidebar right">
		{question_responder}
			{if count == 1}
				<section class="section">
			{/if}
			
			<header class="bar"><a href="{url_title_path='services/detail'}">{title}</a></header>
			{service_bio}
			<p><a href="{url_title_path='questions/partner'}">View questions by {title}</a></p>
			
			{if count == total_results}
				</section>
			{/if}
		{/question_responder}
		{embed="embeds/_share" channel="{channel_short_name}"}
	</div>
</div>
{/exp:channel:entries}
{embed="embeds/_doc-bottom" sim="comments"}