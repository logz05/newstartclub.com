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
{embed="embeds/_rss-feed" link="http://feeds.feedburner.com/newstartclub"}
<div class="heading clearfix">
	<h1 data-icon="h">News</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<ul class="listing">
		{exp:weblog:entries weblog="resources|events|partners|locations|recipes|questions|deals" limit="20" orderby="date" sort="desc" paginate="bottom" dynamic="off" show_expired="yes"}
			<li class="entry {weblog_short_name}">
				{if weblog_short_name == "resources"}<h2 data-icon="d">{/if}
				{if weblog_short_name == "partners" }<h2 data-icon="a">{/if}
				{if weblog_short_name == "events"   }<h2 data-icon="e">{/if}
				{if weblog_short_name == "locations"}<h2 data-icon="f">{/if}
				{if weblog_short_name == "recipes"  }<h2 data-icon="g">{/if}
				{if weblog_short_name == "questions"}<h2 data-icon="i">{/if}
				{if weblog_short_name == "deals"    }<h2 data-icon="n">{/if}
					
					{if weblog_short_name == "deals"}
						<a href="{path='deals/detail/{categories show_group="24"}{category_url_title}{/categories}'}">{exp:char_limit total="48"}{title}{/exp:char_limit}</a>
					{if:elseif weblog_short_name == "questions"}
						<a href="{path='faq/detail/{url_title}'}">{exp:char_limit total="48"}{qa_question}{/exp:char_limit}</a>
					{if:else}
						<a href="{path='{weblog_short_name}/detail/{url_title}'}">{exp:char_limit total="48"}{title}{/exp:char_limit}</a>
					{/if}
				</h2>
				<div class="date">
					<span class="timeago">{if entry_date > current_time}Upcoming{if:else}<?php echo distanceOfTimeInWords('{entry_date}', '{current_time}', true); ?>{/if}</span>
					<span class="entry-date">{entry_date format="%D, %M %j, %Y	%g:%i%a %T"}</span>
				</div>
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
		{embed="news/_sidebar"}
	</div><!--/.sidebar-->
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}