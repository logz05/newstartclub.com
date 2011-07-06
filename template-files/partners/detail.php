{embed="includes/_doc-top" 
	channel="{channel}"
	section="{section}"
	title="
		{exp:weblog:entries weblog='{channel}' url_title='{segment_3}' limit='1'}
			{title}{if partner_cred != ""}, {partner_cred}{/if}
		{/exp:weblog:entries}"
}
{assign_variable:channel="partners"}
{assign_variable:section="Partners"}
<div class="body">
	{embed="includes/_breadcrumbs" channel="{channel}" section="{section}"}
	<?php
	$path = ini_get('include_path');
	ini_set('include_path', $path . ':/mnt/stor7-wc2-dfw1/530872/582181/www.newstartclub.com/web/content/lib');
	
	require_once 'member_relations.php';
	require_once ( 'utilities.php' );
	?>
	<div class="heading clearafter">
		<h1>
			{exp:weblog:entries weblog="{channel}" sort="asc" url_title="{segment_3}" limit="1"}
				{title}{if partner_cred != ""}, {partner_cred}{/if}
			{/exp:weblog:entries}
		</h1>
	</div>
	<div class="grid23 clearafter">
		<div class="single left">
			{exp:weblog:entries weblog="{channel}" sort="asc" url_title="{segment_3}" limit="1"}
			{if no_results}
				{redirect="404"}
			{/if}
			<div class="partner">
				<div>
					{exp:ce_img:single src="{partner_photo}" max_width="200" max_height="200" crop="yes" attributes='alt="{title}" title="{title}"'}
				</div>
				<div class="bio">
					{partner_bio}
				</div>
			</div><!--/.partner-->
			{/exp:weblog:entries}
			{!--{if group_id=="1"}
			<ul>
			{exp:weblog:entries weblog="resources|questions" limit="50" orderby="date" sort="desc" paginate="bottom" dynamic="off"}
				<li class="article {weblog_short_name}">
					<h1>
						<a href="{path='{weblog_short_name}/detail/{url_title}'}">
							{if weblog_short_name == 'questions'}
								{exp:char_limit total="35"}{qa_question}{/exp:char_limit}
							{if:else}
								{exp:char_limit total="35"}{title}{/exp:char_limit}
							{/if}
						</a>
					</h1>
					<div class="date">
						<span class="timeago"><?php echo distanceOfTimeInWords('{entry_date}', '{current_time}', true); ?></span>
						<span class="entry-date">{entry_date format="%D, %M %j, %Y  %g:%i%a %T"}</span>
					</div>
				</li>
				{paginate}
					{if "{total_pages}" > 1}
						<li class="pagination">
							<p>{pagination_links}</p>
						</li>
					{/if}
				{/paginate}
			{/exp:weblog:entries}
			</ul>
			{/if}--}
		</div><!--/.single-->
		<div class="sidebar right">
			<div class="bar">Contact Information</div>
			{if logged_out}
				<p class="button-wrap">
					<a href="/members/signin/" class="super small secondary button" data-reveal-id="signin-modal-contact"><span>View Contact Information</span></a>
				</p>
			{/if}
			{if logged_in}
				<dl>
					{exp:weblog:entries weblog="{channel}" sort="asc" url_title="{segment_3}" limit="1"}
						{if partner_phone != ""}
							<dt>Phone:</dt>
							<dd>{partner_phone}</dd>
						{/if}
						{if partner_address != ""}
							<dt>Address:</dt>
							<dd>{partner_address}<br />
						{partner_city}, {partner_state} {partner_zip}</dd>
						{/if}
						{if partner_specialty != ""}
							<dt>Specialty:</dt>
							<dd>{partner_specialty}</dd>
						{/if}
					{/exp:weblog:entries}
				</dl>
			{/if}
			{exp:weblog:entries weblog="{channel}" sort="asc" url_title="{segment_3}" limit="1"}
				<p>
					<a href="/resources/partner/{url_title}/">View Resources by {title}</a>
				</p>
			{/exp:weblog:entries}
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_signin-modal modal-role="contact" modal-msg="You must be signed in to view contact information."}
{embed="includes/_doc_bottom"}