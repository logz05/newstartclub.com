{if segment_3 == "delete" && segment_4}
	{exp:delete:delete_entry 
		entry_id="{segment_4}" 
		error_no_permissions='<div class="alert-box error"><p>You're not allowed to delete this event.</p></div>' 
		error_invalid_content='<div class="alert-box warning"><p>It seems that this event has been already deleted.</p></div>' 
		message_success='<div class="alert-box success"><p>Event successfully deleted!</p></div>'
	}
{/if}

{exp:channel:entries channel="events" sort="desc" orderby="edit_date" paginate="bottom" limit="20" dynamic="no" show_future_entries="yes" show_expired="no" category="{embed:sponsor_number}"}

{if no_results}<p>You don&rsquo;t have any active events. Click <a href="{path='sponsors/add-event'}">here</a> to add a new event.</p>{/if}

{if count == 1}
<ul class="listing entries">
{/if}

	<li>
		<h2>{title}</h2>
		<div class="edit-entry">
			<a href="{path='sponsors/edit-event/{entry_id}'}" title="Edit &ldquo;{title}&rdquo;"><i class="icon after" data-icon="s"></i></a>
			<a href="{path='sponsors/edit-events/delete/{entry_id}'}" title="Delete&hellip;" onclick="javascript: if (!confirm('Are you sure you want to delete the event below? \n\n \u201C{title}\u201D \n\n You can\u2019t undo this action. Click OK to delete.')) return false;"><i class="icon after" data-icon="C"></i></a>
		</div>
		<div class="details">
			<dl>
				<dt>Event URL</dt>
				<dd>
					<p><a href="{path='event/{entry_id}'}" target="_blank">{path='event/{entry_id}'}</a></p>
				</dd>
				
				<dt>Event Description</dt>
				<dd>{event_description}</dd>
				<dt>Date & Time</dt>
				<dd>
					<p>
						{!-- Check if event is only on one date and time is set --}
						{if ('{entry_date format="%Y-%M-%d"}' == '{expiration_date format="%Y-%M-%d"}') && "{event_start_time}" != "0"}
							<span class="start-time">{event_start_time format="%g:%i %a"}</span>{if event_end_time =="0"},{/if}
							{if event_end_time != "0"} to <span class="end-time">{event_end_time format="%g:%i %a"}</span>,{/if}
							<span class="month">{entry_date format="%F"}</span>
							<span class="day">{entry_date format="%j"}</span>,
							<span class="year">{expiration_date format="%Y"}</span>
							<!-- 1 -->
						{/if}
						
						{!-- Check if event is only on one date and time is NOT set --}
						{if ('{entry_date format="%Y-%M-%d"}' == '{expiration_date format="%Y-%M-%d"}') && "{event_start_time}" =="0"}
							<span class="month">{entry_date format="%F"}</span>
							<span class="day">{entry_date format="%j"}</span>,
							<span class="year">{expiration_date format="%Y"}</span>
							<!-- 2 -->
						{/if}
						
						{!-- Check to see if repeating event --}
						{if ('{entry_date format="%Y-%M-%d"}' != '{expiration_date format="%Y-%M-%d"}') && "{event_start_time}"}
							<span class="start-time">{event_start_time format="%g:%i %a"}</span>{if event_end_time =="0"},{/if}
							{if event_end_time} to <span class="end-time">{event_end_time format="%g:%i %a"}</span>,{/if}
							<span class="month">{entry_date format="%F"}</span>
							<span class="day">{entry_date format="%j"}</span> to 
							<span class="month">{expiration_date format="%F"}</span>
							<span class="day">{expiration_date format="%j"}</span>,
							<span class="year">{expiration_date format="%Y"}</span>
							<!-- 3 -->
						{/if}
						
						{!-- Check to see if repeating event and time is NOT set and is in the same year--}
						{if ('{entry_date format="%Y-%M-%d"}' != '{expiration_date format="%Y-%M-%d"}') && "{event_start_time}" == "0" && ('{entry_date format="%Y"}' == '{expiration_date format="%Y"}')}
							<span class="month">{entry_date format="%F"}</span>
							<span class="day">{entry_date format="%j"}</span> to 
							<span class="month">{expiration_date format="%F"}</span>
							<span class="day">{expiration_date format="%j"}</span>,
							<span class="year">{expiration_date format="%Y"}</span>
							<!-- 4 -->
						{/if}
						
						{!-- Check to see if repeating event, time is NOT set, and event spans years --}
						{if ('{entry_date format="%Y-%M-%d"}' != '{expiration_date format="%Y-%M-%d"}') && "{event_start_time}" == "0" && ("{entry_date format='%Y'}" != "{expiration_date format='%Y'}")}
							<span class="month">{entry_date format="%F"}</span>
							<span class="day">{entry_date format="%j"}</span>,
							<span class="year">{entry_date format="%Y"}</span> to 
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
				
				<dt>Categories</dt>
				<dd>
					<p>{categories backspace="2" show_group="41"}{category_name}, {/categories}</p>
				</dd>
			</dl>
		</div>
	</li>
{if count == total_results}
	</ul>
{/if}
{paginate}
	<p class="pagination">{pagination_links}</p>
{/paginate}
{/exp:channel:entries}