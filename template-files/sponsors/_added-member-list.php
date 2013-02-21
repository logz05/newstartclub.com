{exp:freeform:entries
	dynamic="no"
	form_id="2"
	date_start="3 weeks ago"
	date_end="today"
	orderby="entry_date"
	sort="desc"
	search:sponsor_id="{embed:sponsor_id}"
	limit="500"
}
{if "{freeform:absolute_count}" == 1}
<h2>Pending Members ( {freeform:total_results} )</h2>
	<ul class="listing">
{/if}
	
	<li>
		<h2>{freeform:field:recipient_email_user}</h2>
		<div class="date">
			<span class="timeago"><?php echo distanceOfTimeInWords('{freeform:entry_date}', '{current_time}', true); ?></span>
			<span class="invite-date">{freeform:entry_date format="%D, %M %j, %Y	 %g:%i%a %T"}</span>
		</div>
	</li>
{if "{freeform:absolute_count}" == "{freeform:total_results}"}
	</ul>
{/if}

{/exp:freeform:entries}