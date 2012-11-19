{exp:channel:entries
	channel="questions"
	disable="category_fields|member_data|pagination"
	require_entry="yes"
	limit="1"
}
{if no_results || segment_4}{redirect="404"}{/if}
{gv_doctype}
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{title} | {site_name}</title>
	<meta name="viewport" content="width=860;" />
	<meta name="author" content="{site_name}">
	<meta property="fb:admins" content="696875904" />
	<link rel="stylesheet" href="{stylesheet='site/boilerplate'}" type="text/css" />
	<link rel="stylesheet" href="{stylesheet='site/default'    }" type="text/css" />
	<link rel="stylesheet" href="{stylesheet='site/icons'      }" type="text/css" />
	{gv_modernizr}
</head>

{sn_body-conditions}

<header class="header">
	{sn_nav-super}
	{sn_masthead}
	{sn_nav-main}
	<div class="shadow-left"></div>
	<div class="shadow-right"></div>
</header>

<div class="body {segment_1}">

	<ul class="trail">
		<li><a href="{path='site_index'}">Home</a></li>
		<li><a href="{path='questions'}">Questions</a></li>
	</ul>
	<hgroup class="heading">
		<h1>{embed="embeds/_edit-this" channel_id="{channel_id}" entry_id="{entry_id}" title="{title}"}{title}</h1>
	</hgroup>
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
		</div><!-- /main -->
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
		</div><!-- /sidebar -->
	</div>
</div><!-- /body -->
{sn_footer}

{sn_scripts}

</body>
</html>

{/exp:channel:entries}