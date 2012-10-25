<?php

$path = ini_get('include_path');
ini_set('include_path', $path . ':/home/newstartclub/www/www-newstartclub-com/content/lib');

require_once('dbconnect.php');
require_once('utilities.php');

?>
{embed="embeds/_doc-top" 
	class="sponsors"
	title="Invite Members"
	sponsor_type="{exp:user:stats dynamic="off"}{exp:channel:categories show="{member_admin_id}" channel="locations" style="linear"}{sponsor_type}{/exp:channel:categories}{/exp:user:stats}"
}
{preload_replace:sponsor_title="{exp:user:stats dynamic='off'}{exp:channel:categories show='{member_admin_id}' weblog='locations' style='linear'}{category_name}{/exp:channel:categories}{/exp:user:stats}"}
	<div class="heading clearfix">
		<h1>Invite Members</h1>
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
					required="first_name|last_name|recipient_email_user"
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
								<td><input type="text" class="input" id="to" name="recipient_email_user" value="" size="32" autocomplete="off" /></td>
							</tr>
							<tr>
								<th></th>
								<td>
							{exp:user:stats dynamic="off"}
								<input type="hidden" name="location_name" id="location_name" value="{exp:channel:categories show='{member_admin_id}' channel='locations' style='linear'}{category_name}{/exp:channel:categories}" />
								<input type="hidden" name="sponsor_full_name" value="{member_first_name} {member_last_name}" />
								<input type="hidden" name="ff_sender_email" value="{email}" />
								<input type="hidden" name="sponsor_id" value="{member_admin_id}" />
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
				dynamic="no"
				form_id="2"
				date_start="3 weeks ago"
				date_end="today"
				orderby="entry_date"
				sort="desc"
				search:sponsor_id="{member_admin_id}"
			}
			{if "{freeform:absolute_count}" == 1}
			<h2>Pending Invitations ( {freeform:total_results} )</h2>
				<ul class="listing">
			{/if}
				
				<li>
					<h2>{freeform:field:recipient_email_user}</h2>
					<div class="date">
						<span class="timeago"><?php echo distanceOfTimeInWords('{freeform:entry_date}', '{current_time}', true); ?></span>
						<span class="invite-date">{freeform:entry_date format="%D, %M %j, %Y	 %g:%i%a %T"}</span>
					</div>
				</li>
			{if "{freeform:absolute_count}" == "{freeform:total_results}"}
				</ul>
			{/if}
			
			{/exp:freeform:entries}
		</div>
		
		<div class="sidebar right">
			<header class="bar">Invite Members</header>
			<p>You can invite members to join the club by sending a personal message from your email client or by using the form provided.</p>
			<p>Members will be added to your <a href="{path='sponsors/email-members'}">member list</a> when they use the following link or when they use promo code <strong>{member_admin_id}</strong>:
			<p><a href="{path='join/{member_admin_id}'}">{site_url}<br />join/{member_admin_id}</a></p>
			{if "{sponsor_type}" == "profit"}
				<p>Alternatively, contacts can be added to your member list when print one of your deals. Invitations with no response will expire after 21 days.</p>
			{if:else}
				<p>Alternatively, contacts can be added to your member list when they RSVP to one of your events. Invitations with no response will expire after 21 days.</p>
			{/if}
		</div>
		{/exp:user:stats}
	</div>
{embed="embeds/_doc-bottom" script_add="sponsors"}