{embed="includes/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="{section}"}
{assign_variable:channel="news"}
{assign_variable:section="News"}
<?php
$path = ini_get('include_path');
ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');

require_once 'member_relations.php';
require_once ( 'utilities.php' );
?>
<div class="body">
  <div class="heading clearafter">
    <div class="icon"></div>
    <h1>{section}</h1>
  </div>
  <div class="grid23 clearafter">
    <div class="list left">
      <ul>
      {exp:weblog:entries weblog="resources|events|partners|locations|questions" limit="20" orderby="date" sort="desc" paginate="bottom" dynamic="off" show_future_entries="yes" show_expired="yes"}
        <li class="article {weblog_short_name}">
          <h1>
            <a href="{path='{weblog_short_name}/detail/{url_title}'}">
              {if weblog_short_name == 'questions'}
                {exp:char_limit total="35"}{qa_question}{/exp:char_limit}
              {if:else}
                {exp:char_limit total="35"}{title}{/exp:char_limit}
              {/if}
            </a>
          </h1>
          <div class="date">
            <span class="timeago">{if entry_date > current_time}Upcoming{if:else}<?php echo distanceOfTimeInWords('{entry_date}', '{current_time}', true); ?>{/if}</span>
            <span class="entry-date">{entry_date format="%D, %M %j, %Y  %g:%i%a %T"}</span>
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
      <div class="bar">News</div>
      <p>Find out what is happening on newstartclub.com. Visit this page to follow the latest updates to our website. You&rsquo;ll find new articles, videos, recipes, events, and more!</p>
      <p>Follow us on Facebook and Twitter or subscribe to our RSS feed to stay up to date when you are not on our website.</p>
      <a href="http://www.facebook.com/newstartclub" title="Facebook">
        <h4 class="icon" id="facebook-icon">Facebook</h4>
      </a>
      <a href="http://www.twitter.com/newstartclub" title="Twitter">
        <h4 class="icon" id="twitter-icon">Twitter</h4>
      </a>
      <a href="/news/rss" title="Subscribe">
        <h4 class="icon" id="rss-icon">Subscribe</h4>
      </a>
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
  <div id="rss-feed">
    <a href="/{segment_1}/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" title="RSS Feed">
      <div class="icon"></div><span>RSS Feed</span>
    </a>
  </div>
</div><!-- /.body -->
{embed="includes/_doc_bottom"}