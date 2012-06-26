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
	<i>8</i>
	<h1>News</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
		<ul id="listing">
		{exp:weblog:entries weblog="resources|events|partners|locations|recipes|questions" limit="20" orderby="date" sort="desc" paginate="bottom" dynamic="off" show_expired="yes"}
			<li class="entry {weblog_short_name}">
				<h2>
					{if weblog_short_name == "resources"}<i>3</i>{/if}
					{if weblog_short_name == "partners"}<i>4</i>{/if}
					{if weblog_short_name == "events"}<i>5</i>{/if}
					{if weblog_short_name == "locations"}<i>6</i>{/if}
					{if weblog_short_name == "recipes"}<i>7</i>{/if}
					{if weblog_short_name == "questions"}<i>9</i>{/if}
					<a href="{path='{if weblog_short_name == 'questions'}faq{if:else}{weblog_short_name}{/if}/detail/{url_title}'}">
						{if weblog_short_name == 'questions'}
							{exp:char_limit total="48"}{qa_question}{/exp:char_limit}
						{if:else}
							{exp:char_limit total="48"}{title}{/exp:char_limit}
						{/if}
					</a>
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