{exp:channel:entries channel="events" sort="asc" orderby="date" limit="1" dynamic="no" show_future_entries="yes" show_expired="no" category="{embed:sponsor_number}"}
	{if no_results}<p>You don&rsquo;t have any active events. Click <a href="/sponsors/add-event">here</a> to add a new event.</p>{/if}
{/exp:channel:entries}
<ul class="listing entries">
{exp:channel:entries channel="events" sort="desc" orderby="edit_date" paginate="bottom" limit="10" show_future_entries="yes" show_expired="no" category="{embed:sponsor_number}" dynamic_parameters="orderby|limit|sort"}
	<li>
		<script type="text/javascript">
			function confirmation_{entry_id}() {
				var answer = confirm("Are you sure you want to delete this event?")
				if (answer){
					document.forms["entryform_{entry_id}"].submit();
				}
			}
		</script>
		<h2>{title}</h2>
		<div class="edit-entry">
			<a href="/sponsors/edit-event/{entry_id}" title="Edit &ldquo;{title}&rdquo;"><span>&#63490;</span></a>
			<a href="javascript: confirmation_{entry_id}()" title="Delete&hellip;"><span>&#10006;</span></a>
		</div>
		<div class="details">
			<dl>
				<dt>Details</dt>
				<dd>{event_description}</dd>
				<dt>Date</dt>
				<dd>
					<p>
						{!-- Check if event is only on one date and time is set --}
						{if ("{entry_date format='%d'}" == "{expiration_date format='%d'}") && "{event_start_time}"}
							<span class="start-time">{exp:low_nice_date date="{event_start_time}" format="%g:%i %a"}</span>{if event_end_time ==""},{/if}
							{if event_end_time} to <span class="end-time">{exp:low_nice_date date="{event_end_time}" format="%g:%i %a"}</span>,{/if}
							<span class="month">{entry_date format="%F"}</span>
							<span class="day">{entry_date  format="%j"}</span>,
							<span class="year">{expiration_date format="%Y"}</span>
							<!-- 1 -->
						{/if}
						
						{!-- Check if event is only on one date and time is NOT set --}
						{if ("{entry_date format='%d'}" == "{expiration_date format='%d'}") && "{event_start_time}" ==""}
							<span class="month">{entry_date  format="%F"}</span>
							<span class="day">{entry_date  format="%j"}</span>,
							<span class="year">{expiration_date format="%Y"}</span>
							<!-- 2 -->
						{/if}
						
						{!-- Check to see if repeating event --}
						{if ("{entry_date format='%d'}" != "{expiration_date format='%d'}") && "{event_start_time}"}
							<span class="start-time">{exp:low_nice_date date="{event_start_time}" format="%g:%i %a"}</span>{if event_end_time ==""},{/if}
							{if event_end_time} to <span class="end-time">{exp:low_nice_date date="{event_end_time}" format="%g:%i %a"}</span>,{/if}
							<span class="month">{entry_date format="%F"}</span>
							<span class="day">{entry_date format="%j"}</span> to 
							<span class="month">{entry_date format="%F"}</span>
							<span class="day">{expiration_date format="%j"}</span>,
							<span class="year">{expiration_date format="%Y"}</span>
							<!-- 3 -->
						{/if}
						
						{!-- Check to see if repeating event and time is NOT set --}
						{if ("{entry_date format='%d'}" != "{expiration_date format='%d'}") && "{event_start_time}" == "" && ("{entry_date format='%Y'}" == "{expiration_date format='%Y'}")}
							<span class="month">{entry_date  format="%F"}</span>
							<span class="day">{entry_date  format="%j"}</span> to 
							<span class="month">{expiration_date format="%F"}</span>
							<span class="day">{expiration_date format="%j"}</span>,
							<span class="year">{expiration_date format="%Y"}</span>
							<!-- 4 -->
						{/if}
						
						{!-- Check to see if repeating event, time is NOT set, and event spans years --}
						{if ("{entry_date format='%d'}" != "{expiration_date format='%d'}") && "{event_start_time}" == "" && ("{entry_date format='%Y'}" != "{expiration_date format='%Y'}")}
							<span class="month">{entry_date  format="%F"}</span>
							<span class="day">{entry_date  format="%j"}</span>,
							<span class="year">{entry_date  format="%Y"}</span> to 
							<span class="month">{expiration_date format="%F"}</span>
							<span class="day">{expiration_date format="%j"}</span>,
							<span class="year">{expiration_date format="%Y"}</span>
							<!-- 5 -->
						{/if}
					</p>
				</dd>
				<dt>Location</dt>
				<dd>
					<p>{if event_location_name}{event_location_name}<br />{/if}
						{event_address}<br />
						{event_city}, {event_state} {event_zip}
					</p>
				</dd>
				<dt>Event URL</dt>
				<dd>
					<p><a href="{path='event/{entry_id}'}" target="_blank">{path='event/{entry_id}'}</a></p>
				</dd>
			</dl>
		</div>
		<form id="entryform_{entry_id}" method="post" action="/sponsors/edit-events"	 >
			<div class='hiddenFields'>
				<input type="hidden" name="ACT" value="18" />
				<input type="hidden" name="RET" value="/sponsors/edit-events" />
				<input type="hidden" name="PRV" value="" />
				<input type="hidden" name="URI" value="/sponsors/edit-events" />
				<input type="hidden" name="return_url" value="/sponsors/edit-events" />
				<input type="hidden" name="author_id" value="{author_id}" />
				<input type="hidden" name="channel_id" value="2" />
				<input type="hidden" name="status" value="closed" />
				<input type="hidden" name="site_id" value="4" />
			</div>
			<input type="hidden" name="title" id="title" value="{title}" />
			<input type="hidden" name="url_title" id="url_title" value="{url_title}" />
			<input type="hidden" name="entry_id" value="{entry_id}" />
		</form>
	</li>
{paginate}{if "{total_pages}" != 1}<p>Page {current_page} of {total_pages} pages {pagination_links}</p>{/if}{/paginate}
{/exp:channel:entries}
</ul>