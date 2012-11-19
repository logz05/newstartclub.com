<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
	<title>Sponsor List</title>
	<meta name="description" content="" />
  	<meta name="keywords" content="" />
	<meta name="robots" content="" />
</head>
<body>
<pre>
Number	Name	Address
{exp:channel:entries channel="locations" order_by="category_id" sort="asc" status="open"}{categories}{category_id}{/categories}	{title}	{location_address}, {location_city}, {location_state} {location_zip}
{/exp:channel:entries}
</pre>
</body>
</html>