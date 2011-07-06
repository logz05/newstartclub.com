{embed="includes/_doc-top" 
	channel="{channel}"
	section="{section}"
	title="
				{if segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0") }
					{section}
				{if:else}
					{section} in {exp:weblog:entries weblog="{channel}" limit="1" search:sponsor_state="={segment_3}" dynamic="off"}{sponsor_state:label}{/exp:weblog:entries}
				{/if}"
}
{assign_variable:channel="sponsors"}
{assign_variable:section="Sponsors"}
<div class="body">
	{if segment_2 == "state"}{embed="includes/_breadcrumbs" channel="{channel}" section="{section}"}{/if}
	<div class="heading clearafter">
		{if segment_2 == "" || (segment_2 <= "P9999" && segment_2 >= "P0") }
		<div class="icon"></div>
		<h1>{section}</h1>
		{if:else}
		<h1>{exp:weblog:entries weblog="{channel}" limit="1" search:sponsor_state="={segment_3}" dynamic="off"}{sponsor_state:label}{/exp:weblog:entries}</h1>
		{/if}
	</div>		
	<div class="grid23 clearafter">
		<div class="list left">
		<ul>
			{if segment_2 == "state" && segment_3}
				{exp:weblog:entries weblog="{channel}" orderby="sponsor_city" sort="asc" search:sponsor_state="={segment_3}" limit="9" paginate="bottom" disable="member_data" dynamic="off"}
					<li class="sponsor clearafter">
						<a href="{url_title_path='{channel}/detail'}"><div class="sponsor-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={sponsor_address}+{sponsor_city}+{sponsor_state}&zoom=7&markers=size:med%7C{sponsor_address}+{sponsor_city}+{sponsor_state}&size=90x110&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});">
						</div></a>
						<h1><a href="{url_title_path='{channel}/detail'}">{title}</a></h1>
						<h2>{sponsor_address}<br />{sponsor_city}, {sponsor_state}</h2>
					</li>
					{paginate}
						{if "{total_pages}" > 1}
							<li class="pagination">
								<p>{pagination_links}</p>
							</li>
						{/if}
					{/paginate}
				{/exp:weblog:entries}
			{if:else}
				{exp:weblog:entries weblog="{channel}" orderby="sponsor_city" sort="asc" limit="9" paginate="bottom" disable="member_data" dynamic="off"}
					<li class="sponsor clearafter">
						<a href="{url_title_path='{channel}/detail'}"><div class="sponsor-map" style="background-image: url({exp:valid_url}http://maps.google.com/maps/api/staticmap?center={sponsor_address}+{sponsor_city}+{sponsor_state}&zoom=7&markers=size:med%7C{sponsor_address}+{sponsor_city}+{sponsor_state}&size=90x110&sensor=false&key=ABQIAAAAF-2CpS0wqiEdGgvg2d1hGRTGCIkugz-UOgj4gO0cudB8rdAkEhQSlPrUNc_decH5dHcFVu0pRuGwSg{/exp:valid_url});">
						</div></a>
						<h1><a href="{url_title_path='{channel}/detail'}">{title}</a></h1>
						<h2>{sponsor_address}<br />{sponsor_city}, {sponsor_state}</h2>
					</li>
					{paginate}
						{if "{total_pages}" > 1}
							<li class="pagination">
								<p>{pagination_links}</p>
							</li>
						{/if}
					{/paginate}
				{/exp:weblog:entries}
			{/if}
		</ul>
		</div><!--/.list-->
		<div class="sidebar right">
			<div class="bar">{section}</div>
			<p>Our sponsors share our interest in helping you achieve true wellness. They provide locations, facilities, and services for locally organized club events such as: 
				<ul class="bullets">
					<li>Vegetarian cooking classes</li>
					<li>Natural remedies classes</li>
					<li>Depression recovery programs</li>
					<li>Coronary health improvement programs</li>
					<li>Reversing diabetes and obesity seminars</li>
					<li>Health expos</li>
					<li>Personal and group support</li>
				</ul></p>
			<p>If your organization is interested in sponsoring a local {site_name}, click&nbsp;<a href="{path='sponsor_admin'}">here</a>.</p>
				<div class="bar">Filter</div>
				<h2>State</h2>
				<ul>
	<?php
	
		$state_list = array(
			{exp:weblog:entries weblog="{channel}" sort="asc" dynamic="off" orderby="sponsor_state" backspace="1"}
				"{sponsor_state}" => "{sponsor_state:label}", 
			{/exp:weblog:entries}
			);
	
		foreach ($state_list as $key => $state) {
			print('<li><a href="{path="{channel}/state/'. $key . '"}">'. $state .'</a></li>');
		}
	
	
	?>
				</ul>
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}