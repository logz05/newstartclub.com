<header class="bar">Search</header>
<<<<<<< HEAD
{exp:search:advanced_form result_page="{path='news/search'}" channel="resources|services|events|locations|recipes|questions" results="25" show_expired="yes"}
=======
{exp:search:advanced_form result_page="news/search" channel="resources|services|events|locations|recipes|questions" results="25" show_expired="yes"}
>>>>>>> Removing leftover instances of weblog and updating to channel
<input type="hidden" name="search_in" value="everywhere">
<input id="query" name="keywords" type="search" class="input" placeholder="Search News">
<p><a href="#" class="advanced-search">Advanced Search</a></p>

<div id="advanced-search">
	<table> 
		<tr>
			<th scope="row">Words:</th>
			<td>
				<input type="radio" name="where" class="input radio" value="all" checked="checked" />&nbsp;<span> All</span>
				<input type="radio" name="where" class="input radio" value="any" />&nbsp;<span> Any</span>
			</td>
		</tr>
		<tr>
			<th scope="row">Order by:</th>
			<td>
				<input type="radio" name="orderby" class="input radio" value="title" checked="checked" />&nbsp;<span> Title</span>
				<input type="radio" name="orderby" class="input radio" value="date" />&nbsp;<span> Date</span>
			</td>
		</tr>
		<tr>
			<th scope="row">Sort:</th>
			<td>
				<input type="radio" name="sort_order" class="input radio" value="asc" checked="checked" />&nbsp;<span> Up</span>
				<input type="radio" name="sort_order" class="input radio" value="desc" />&nbsp;<span> Down</span>
			</td>
		</tr>
	</table>
</div>

{/exp:search:advanced_form}
<header class="bar">News Feed</header>
<p>Find out what is happening on newstartclub.com. Visit this page to follow the latest updates to our website. You&rsquo;ll find new articles, videos, recipes, events, and more!</p>
<p>Follow us on Facebook and Twitter or subscribe to our RSS feed to stay up to date when you are not on our website.</p>
<a href="http://www.facebook.com/newstart" title="Facebook">
	<h4 class="icon" id="facebook-icon">Facebook</h4>
</a>
<a href="http://www.twitter.com/newstartweimar" title="Twitter">
	<h4 class="icon" id="twitter-icon">Twitter</h4>
</a>
<a href="http://feeds.feedburner.com/newstartclub" title="Subscribe">
	<h4 class="icon" id="rss-icon">Subscribe</h4>
</a>