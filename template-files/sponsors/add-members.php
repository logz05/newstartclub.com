<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once('dbconnect.php');
require_once('utilities.php');

?>
{embed="embeds/_doc-top" 
	class="sponsors"
	title="Add Members"
	sponsor_type="
		{exp:user:stats dynamic='off'}
			{exp:channel:entries channel="locations" category='{member_sponsor_id}'}
				{location_type}
			{/exp:channel:entries}
		{/exp:user:stats}
		"
}
{preload_replace:sponsor_title="{exp:user:stats dynamic='off'}{exp:channel:categories show='{member_sponsor_id}' weblog='locations' style='linear'}{category_name}{/exp:channel:categories}{/exp:user:stats}"}
{preload_replace:sponsor_type="{exp:user:stats dynamic='off'}{exp:channel:entries channel="locations" category='{member_sponsor_id}'}{location_type}{/exp:channel:entries}{/exp:user:stats}"}
	<div class="heading clearfix">
		<h1>Add Members</h1>
	</div>
	<div class="grid23 clearfix">
		
		<div class="main invite left">
			<h2>Contact Information</h2>
				<noscript>
					<div class="alert-box warning">
						<p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
					</div>
				</noscript>
				<p>Tell your friends about the {site_name}! Just fill out the form below.</p>
				{exp:freeform:form
					form_name="invite_members"
					required="ff_first_name|ff_last_name|recipient_email_user"
					recipient_user_input="yes"
					recipient_user_limit="1"
					recipient_user_template="invite_members"
				}
						
						<table>
							<tr>
								<th scope="row"><label for="ff_first_name" class="req"><span class="req">* </span>First Name</label></th>
								<td><input type="text" class="input" id="ff_first_name" name="ff_first_name" size="32" autocomplete="off" /></td>
							</tr>
							<tr>
								<th scope="row"><label for="ff_last_name" class="req"><span class="req">* </span>Last Name</label></th>
								<td><input type="text" class="input" id="ff_last_name" name="ff_last_name" size="32" autocomplete="off" /></td>
							</tr>
							<tr>
								<th scope="row"><label for="recipient_email_user" class="req"><span class="req">* </span>Email</label></th>
								<td><input type="text" class="input" id="to" id="recipient_email_user" name="recipient_email_user" value="" size="32" autocomplete="off" /></td>
							</tr>
							<tr>
								<th></th>
								<td>
							{exp:user:stats dynamic="off"}
								<input type="hidden" name="ff_location_name" id="ff_location_name" value="{exp:channel:categories show='{member_sponsor_id}' channel='locations' style='linear'}{category_name}{/exp:channel:categories}" />
								<input type="hidden" name="ff_sponsor_full_name" value="{member_first_name} {member_last_name}" />
								<input type="hidden" name="ff_sender_email" value="{email}" />
								<input type="hidden" name="ff_sponsor_id" value="{member_sponsor_id}" />
							{/exp:user:stats}
									<p class="button-wrap">
										<button type="submit" class="super secondary button"><span>Invite Member</span></button>
									</p>
								</td>
							</tr>
						</table>
				 
				{/exp:freeform:form} 
				
			
			{exp:user:stats dynamic="off"}
				
			{exp:freeform:entries
				form_id="2"
				sort="desc"
				orderby="entry_date"
				search:ff_sponsor_id="{member_sponsor_id}"
				limit="500"
			}
			{if "{freeform:absolute_count}" == 1}
				<h2 class="listing-header">Pending Members ( {freeform:total_results} )</h2>
				<div class="row-header  invite  clearfix">
					<div class="left"><strong>Name</strong> ( <span class="exp-col exp">show details</span><span class="exp-col col" style="display:none;">hide details</span> )</div>
					<div class="right"><strong>Invite Date</strong></div>
				</div>
				<ul class="post-list">
			{/if}
				
				<li class="member--data  invite">
					<h2 class="member--name">{freeform:field:ff_first_name} {freeform:field:ff_last_name}</h2>
					<div class="date">
						<span class="timeago"><?php echo distanceOfTimeInWords('{freeform:entry_date}', '{current_time}', true); ?></span>
						<span class="invite-date">{freeform:entry_date format="%D, %M %j, %Y	 %g:%i%a %T"}</span>
					</div>
					<div class="details">
						<p><strong>Email:</strong> <a href="mailto:{freeform:field:recipient_email_user}" title="Email {freeform:field:ff_first_name} {freeform:field:ff_last_name}">{freeform:field:recipient_email_user}</a></p>
					</div>
				</li>
			{if "{freeform:absolute_count}" == "{freeform:total_results}"}
				</ul>
			{/if}
			
			{/exp:freeform:entries}
		</div>
		
		<div class="sidebar right">
			<header class="bar">Add Members</header>
			<p>You can invite members to join the club by sending a personal message from your email client or by using the form provided.</p>
			<p>Members will be added to your <a href="{path='sponsors/email-members'}">member list</a> when they use promo code <strong>{member_sponsor_id}</strong> or when they use the following link:
			<p><a href="{path='join/{member_sponsor_id}'}">{site_url}/join/{member_sponsor_id}</a></p>
		
		{/exp:user:stats}
			{if "{sponsor_type}" == "profit"}
				<p>Alternatively, contacts can be added to your member list when they print one of your deals.</p>
			{if:else}
				<p>Alternatively, contacts can be added to your member list when they RSVP to one of your events.</p>
			{/if}
		</div>
	</div>
{embed="embeds/_doc-bottom" script_add="sponsors"}