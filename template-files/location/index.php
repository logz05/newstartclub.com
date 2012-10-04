{exp:channel:categories channel="locations" show="{segment_2}" style="linear"}

	{exp:http_header status="301" location="{path='locations/detail/{category_url_title}'}" terminate="yes"}

{/exp:channel:categories}