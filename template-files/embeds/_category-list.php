<h2 class="{embed:class} filter-heading">{embed:title}<span class="arrow up"></span><span class="arrow down"></span></h2>
<ul class="{embed:class} filter-list">
{exp:query sql="
	SELECT
	 exp_weblogs.blog_name,
	 exp_categories.cat_id,
	 exp_categories.cat_url_title,
	 exp_categories.cat_name,
	 count(exp_channel_titles.entry_id) as post_count
	FROM
	 exp_categories
	 LEFT JOIN
	  exp_category_posts
	  LEFT JOIN
	   exp_channel_titles
	   ON
	   exp_channel_titles.entry_id = exp_category_posts.entry_id
	   AND
	   exp_channel_titles.status = 'open'
	  ON
	  exp_category_posts.cat_id = exp_categories.cat_id
	 LEFT JOIN
	  exp_weblogs
	  ON
	  exp_weblogs.channel_id = exp_channel_titles.channel_id
	WHERE
	 exp_weblogs.blog_name = {embed:channel}
	 AND
	 exp_categories.group_id = {embed:group}
	 AND
	 exp_category_posts.entry_id IS NOT NULL
	 AND
	 exp_channel_titles.entry_id IS NOT NULL
	GROUP BY
	 exp_categories.cat_id
	ORDER BY
	 exp_categories.cat_order
	"}
	<li><a href="{path='{embed:url_prefix}/{cat_url_title}'}">{cat_name} <span class="count">(&nbsp;{post_count}&nbsp;)</span></a></li>
	{/exp:query}
</ul>