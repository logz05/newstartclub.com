{exp:channel:categories channel="services" show="{segment_2}" style="linear"}

	{exp:http_header status="301" location="{path='services/detail/{category_url_title}'}" terminate="yes"}

{/exp:channel:categories}