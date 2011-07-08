{if segment_1 == "" || "{embed:title}" == ""}
	<title>{site_name}</title>
{if:elseif "{embed:title}" != ""}
	<title>{embed:title} - {site_name}</title>{/if}