{exp:rss:feed weblog="resources" status="open" debug="yes"}
<?xml version="1.0" encoding="{encoding}"?>
<rss version="2.0"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>

		<title>{exp:xml_encode}{site_name} News{/exp:xml_encode}</title>
		<link>{site_url}</link>
		<description>The latest updates from the {site_name}</description>
		<dc:language>{weblog_language}</dc:language>
		<dc:creator>club@newstart.com</dc:creator>
		<dc:rights>Copyright {gmt_date format="%Y"}</dc:rights>
		<pubDate>{gmt_date format="%D, %d %M %Y %H:%i:%s %T"}</pubDate>
		<atom:link href="{master_rss_uri}" rel="self" type="application/rss+xml" />
		
	{exp:weblog:entries weblog="resources" limit="50" rdf="off" dynamic_start="on" disable="member_data|trackbacks" status="open"}
		<item>
			<title>{exp:xml_encode protect_entities="yes"}{title}{/exp:xml_encode}</title>
			<link>{path='resources/detail/{url_title}'}</link>
			<guid isPermaLink="false">{title_permalink="site/index"}#id:{entry_id}#date:{gmt_entry_date format="%H:%i"}</guid>
			<description><![CDATA[{exp:char_limit total="225"}{resource_description}{/exp:char_limit}]]></description>
			{categories}<category>{exp:xml_encode protect_entities="yes"}{category_name}{/exp:xml_encode}</category>
			{/categories}
			<pubDate>{gmt_entry_date format="%D, %d %M %Y %H:%i %T"}</pubDate>
		</item>
	{/exp:weblog:entries}

	</channel>
</rss>
{/exp:rss:feed} 