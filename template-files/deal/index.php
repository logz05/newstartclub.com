{exp:channel:entries channel="deals" entry_id="{segment_2}" show_expired="yes" show_future_entries="yes"}

	{exp:http_header status="301" location="{url_title_path='deals/detail'}" terminate="yes"}

{/exp:channel:entries}