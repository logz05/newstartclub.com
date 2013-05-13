{embed="embeds/_doc-top" 
	class="news"
	title="News"
}
<?php
$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once 'member_relations.php';
require_once ( 'utilities.php' );
?>
{embed="embeds/_rss-feed"}
<div class="heading clearfix">
	<h1>Search Results</h1>
</div>
<div class="post">
	<p>Your search for <strong>&ldquo;{exp:search:keywords}&rdquo;</strong> found {exp:search:total_results}{total_results}{/exp:search:total_results} result{if "{exp:search:total_results}" != 1}s{/if}.</p>
</div>
<div class="grid23 clearfix">
	<div class="main left">
{exp:search:search_results}
	{if count == 1}
		<ul class="listing">
	{/if}
			<li class="entry {channel_short_name}">
				{if channel_short_name == "resources"}<h2 data-icon="d">{/if}
				{if channel_short_name == "services" }<h2 data-icon="a">{/if}
				{if channel_short_name == "events"   }<h2 data-icon="e">{/if}
				{if channel_short_name == "locations"}<h2 data-icon="f">{/if}
				{if channel_short_name == "recipes"  }<h2 data-icon="g">{/if}
				{if channel_short_name == "questions"}<h2 data-icon="i">{/if}
				{if channel_short_name == "deals"    }<h2 data-icon="n">{/if}
					
					{if channel_short_name == "deals"}
						<a href="{path='deals/detail/{categories show_group="24"}{category_url_title}{/categories}'}">{exp:eehive_hacksaw chars="48"}{title}{/exp:eehive_hacksaw}</a>
					{if:elseif channel_short_name == "questions"}
						<a href="{path='questions/detail/{url_title}'}">{exp:eehive_hacksaw chars="48" append="&hellip;"}{question_question}{/exp:eehive_hacksaw}</a>
					{if:else}
						<a href="{path='{channel_short_name}/detail/{url_title}'}">{exp:eehive_hacksaw chars="48" append="&hellip;"}{title}{/exp:eehive_hacksaw}</a>
					{/if}
				</h2>
				<div class="date">
					<span class="timeago">{if entry_date > current_time}Upcoming{if:else}<?php echo distanceOfTimeInWords('{entry_date}', '{current_time}', true); ?>{/if}</span>
					<span class="entry-date">{entry_date format="%D, %M %j, %Y	%g:%i%a %T"}</span>
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
		{embed="blog/_sidebar"}
	</div>
</div>
{embed="embeds/_doc-bottom"}