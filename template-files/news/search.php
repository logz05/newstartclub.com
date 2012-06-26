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
	<div id="entry">
		<p>Your search for <strong>&ldquo;{exp:search:keywords}&rdquo;</strong> found {exp:search:total_results}{total_results}{/exp:search:total_results} result{if "{exp:search:total_results}" != 1}s{/if}.</p>
	</div>
	<div class="grid23 clearfix">
		<div class="main left">
			<ul id="listing">
			{exp:search:search_results}
				<li class="entry {weblog_short_name}">
				<h2>
					<a href="{path='{if weblog_short_name == 'questions'}faq{if:else}{weblog_short_name}{/if}/detail/{url_title}'}">
						{if weblog_short_name == 'questions'}
							{exp:char_limit total="48"}{qa_question}{/exp:char_limit}
						{if:else}
							{exp:char_limit total="48"}{title}{/exp:char_limit}
						{/if}
					</a>
				</h2>
				<div class="date">
					<span class="timeago"><?php echo distanceOfTimeInWords('{entry_date}', '{current_time}', true); ?></span>
					<span class="entry-date">{entry_date format="%D, %M %j, %Y	%g:%i%a %T"}</span>
				</div>
			</li>
			{/exp:search:search_results}
			{if paginate}
				<li class="pagination">
					<p>{paginate}</p>
				</li>
			{/if}
			</ul>
		</div><!--/.list-->
		<div class="sidebar right">
			{embed="news/_sidebar"}
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}