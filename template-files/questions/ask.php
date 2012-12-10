{if segment_3 == ""}
	{redirect="questions/ask-partner"}
{/if}
{embed="embeds/_doc-top" 
	class="questions"
	title="Ask {segment_3_category_name}"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='questions'}">Questions</a></li>
</ul>
<div class="heading clearfix">
	<h1>Ask {segment_3_category_name}</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
	{exp:user:stats dynamic="off"}
	{exp:freeform:form
		form_id="4"
		required="ff_first_name|ff_last_name|ff_sender_email"
		return="questions/sent/{segment_3}"
		user_email_field="ff_sender_email"
		recipient_user_input="yes"
		recipient_user_template="question_received"
	}
		<table>
			<tr>
				<th scope="row"><label for="ff_first_name">First Name</label></th>
				<td>
					{exp:user:stats dynamic="off"}
						<input type="text" class="input" name="ff_first_name" id="ff_first_name" value="{member_first_name}" size="20" />
					{/exp:user:stats}
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="ff_last_name">Last Name</label></th>
				<td>
					{exp:user:stats dynamic="off"}
						<input type="text" class="input" name="ff_last_name" id="ff_last_name" value="{member_last_name}" size="22" />
					{/exp:user:stats}
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="ff_sender_email">Email</label></th>
				<td>
					{exp:user:stats dynamic="off"}
						<input type="text" class="input" name="ff_sender_email" id="ff_sender_email" value="{email}" size="28" />
					{/exp:user:stats}
					<p class="instructions">The email that you would like to use for coorespondence.</p>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="ff_message" class="req">Message</label></th>
				<td><textarea class="input" name="ff_message" id="ff_message" value="" rows="12" cols="30"></textarea></td>
			</tr>
			<tr>
				<th></th>
				<td>
					{exp:user:users group_id="6" dynamic="off" search:member_partner_id="{segment_4}" limit="1"}
					<input type="text" class="input hidden" name="recipient_email_user" id="recipient_email_user" value="{email}" size="28" />
					{/exp:user:users}
					<div class="button-wrap">
						<button type="submit" class="super green button"><span>Ask</span></button>
					</div>
				</td>
			</tr>
		</table>
	{/exp:freeform:form}
	{/exp:user:stats}
	</div>
	<div class="sidebar right">
		<section class="section">
			<header class="bar">Privacy</header>
			<p>Your personal information will <strong>not</strong> be shared with any third party. If we use your question on our site <strong>your information will remain anonymous.</strong></p>
		</section>
	</div>
</div>
{embed="embeds/_doc-bottom" sim="comments"}