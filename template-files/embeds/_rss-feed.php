<div class="icon rss-feed">
{if embed:link}
	<a href="{embed:link}" title="RSS Feed">
		<em>RSS Feed</em><i>r</i>
	</a>
{if:else}
	<a href="/{segment_1}/rss{if segment_2}/{segment_2}{/if}{if segment_3}/{segment_3}{/if}{if segment_4}/{segment_4}{/if}" title="RSS Feed">
		<em>RSS Feed</em><i>r</i>
	</a>
{/if}
</div>