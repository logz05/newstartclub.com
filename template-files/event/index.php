{if segment_2 == "1562"}

	{exp:channel:entries channel="events" entry_id="898" show_future_entries="yes" show_expired="yes"}
	
		{exp:http_header status="301" location="{url_title_path='events/detail'}" terminate="yes"}
		
	{/exp:channel:entries}

{/if}

{exp:channel:entries channel="events" entry_id="{segment_2}" show_future_entries="yes" show_expired="yes"}

	{exp:http_header status="301" location="{url_title_path='events/detail'}" terminate="yes"}
	
{/exp:channel:entries}