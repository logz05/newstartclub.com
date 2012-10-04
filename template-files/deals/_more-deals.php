{exp:channel:entries channel="deals" entry_id="not {embed:entry_id}" category="{embed:cat_id}" dynamic="no"}
{if count == 1}
<section class="section">
	<header class="bar"  data-icon="n">More Deals</header>
	<ul class="listing">
{/if}
		<li><a href="{url_title_path='deals/detail'}" title="{title}">{title}</a></li>
{if count == total_results}
	</ul>
</section>
{/if}
{/exp:channel:entries}