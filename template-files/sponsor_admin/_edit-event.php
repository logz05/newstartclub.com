	<div class="heading clearafter">
		<h1>Edit Events</h1>
	</div>
	<div class="grid23 clearafter">
		<div class="left list">
		<form method="post" action='{path="{embed:channel}/events/edit/"}' class="hide">

			<select name="orderby" class="input">
				<option value="date">Sort By:</option>
				<option value="event_start_date">Start Date</option>
				<option value="title">Title</option>
			</select>
			
			<select name="sort" class="input">
				<option value="asc">Order In:</option>
				<option value="asc">Ascending</option>
				<option value="desc">Descending</option>
			</select>
			
			<select name="limit" class="input">
				<option value="10">Result Limit:</option>
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="40">40</option>
			</select>
			
			<button type="submit" class="super small green button"><span>Sort</span></button>
		
		</form>
		<ul>
			{exp:weblog:entries weblog="events" sort="asc" orderby="event_start_date" paginate="bottom" limit="10" show_future_entries="yes" show_expired="no" category="{embed:sponsor_number}" dynamic_parameters="orderby|limit|sort"}{assign_variable:e_start_date="{exp:nice_date date='{event_start_date}' format='%m'}"}{assign_variable:e_end_date="{exp:nice_date date='{event_end_date}' format='%m'}"}
			{if no_results}<p>You don&rsquo; have any current events. Click {exp:weblog:categories show="{embed:sponsor_number}" weblog="{embed:channel}" style="linear"}<a href="/sponsor_admin/events/add/">here</a>{/exp:weblog:categories} to add a new event.</p>{/if}
				<li class="row">
					<script type="text/javascript">
						function confirmation_{entry_id}() {
							var answer = confirm("Are you sure you want to delete this event?")
							if (answer){
								document.forms["entryform_{entry_id}"].submit();
							}
						}
					</script>
					<h1 class="title">{title}</h1>
					<p class="button-wrap">
						<a href="http://admin.newstartclub.com/index.php?C=edit&M=edit_entry&weblog_id={weblog_id}&entry_id={entry_id}" target="_blank" class="super small white button"><span>Edit</span></a>
						<a href="javascript: confirmation_{entry_id}()" class="super small white button"><span>Delete</span></a>
					</p>
					<div class="details">
						<dl>
							<dt>Date</dt>
							<dd>
								<p>
									{if event_start_time != ""}
										<span class="start-time">{exp:nice_date date="{event_start_time}" format="%g:%i %a"}</span> - 
										<span class="end-time">{exp:nice_date date="{event_end_time}" format="%g:%i %a"}</span>,
										<span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
										<span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span>,
										<span class="year">{exp:nice_date date="{event_end_date}" format="%Y"}</span>
									{if:elseif "{e_start_date}" == "{e_end_date}"}
										<span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
										<span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span> - 
										<span class="day">{exp:nice_date date="{event_end_date}" format="%j"}</span>,
										<span class="year">{exp:nice_date date="{event_end_date}" format="%Y"}</span>
									{if:elseif "{e_start_date}" != "{e_end_date}"}
										<span class="month">{exp:nice_date date="{event_start_date}" format="%F"}</span>
										<span class="day">{exp:nice_date date="{event_start_date}" format="%j"}</span> - 
										<span class="month">{exp:nice_date date="{event_end_date}" format="%F"}</span>
										<span class="day">{exp:nice_date date="{event_end_date}" format="%j"}</span>,
										<span class="year">{exp:nice_date date="{event_end_date}" format="%Y"}</span>
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
							
							<dt>Details</dt>
							<dd>{exp:textile}{event_description}{/exp:textile}</dd>
						</dl>
					</div>
					<form id="entryform_{entry_id}" method="post" action="{path='{embed:channel}/{segment_2}/{segment_3}'}"  >
						<div class='hiddenFields'>
							<input type="hidden" name="ACT" value="18" />
							<input type="hidden" name="RET" value="{path='{embed:channel}/{segment_2}/{segment_3}'}" />
							<input type="hidden" name="PRV" value="" />
							<input type="hidden" name="URI" value="{path='{embed:channel}/{segment_2}/{segment_3}'}" />
							<input type="hidden" name="return_url" value="{path='{embed:channel}/{segment_2}/{segment_3}'}" />
							<input type="hidden" name="author_id" value="{author_id}" />
							<input type="hidden" name="weblog_id" value="28" />
							<input type="hidden" name="status" value="closed" />
							<input type="hidden" name="site_id" value="4" />
						</div>
						<input type="hidden" name="title" id="title" value="{title}" />
						<input type="hidden" name="url_title" id="url_title" value="{url_title}" />
						<input type="hidden" name="entry_id" value="{entry_id}" />
					</form>
				</li>
				{if count==total_count}
					</ul>
				{/if}
			{paginate}{if "{total_pages}" != 1}<p>Page {current_page} of {total_pages} pages {pagination_links}</p>{/if}{/paginate}
			{/exp:weblog:entries}
			</ul>
		</div><!-- /.left -->
		<div class="right sidebar">
			<div class="bar">Edit Events</div>
			<p>To see more about an event click on the event title.</p>
			<p>To add a new event, click <a href="{path='{embed:channel}/events/add/'}">here</a>.</p>
			<p>Click {exp:weblog:categories show="{embed:sponsor_number}" weblog="{embed:channel}" style="linear"}<a href="{path='events/{category_url_title}'}">here</a>{/exp:weblog:categories} to see your active events.</p>
	</div>
	</div><!-- /.grid23 -->