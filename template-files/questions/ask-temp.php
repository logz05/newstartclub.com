{embed="embeds/_doc-top" 
	class="questions"
	title="Ask your question"
}
<ul class="trail">
	<li><a href="{path='site_index'}">Home</a></li>
	<li><a href="{path='questions'}">Questions</a></li>
</ul>
<div class="heading clearfix">
	<h1>Ask your question</h1>
</div>
<div class="grid23 clearfix">
	<div class="main left">
	{exp:user:stats dynamic="off"}
	{exp:freeform:form
		form_name="ask_a_question"
		required="ff_first_name|ff_last_name|ff_sender_email|recipient_email_user"
		admin_bcc_notify="club@newstart.com"
		return="questions/question-sent"
		user_email_field="ff_sender_email"
		recipient_user_input="yes"
		recipient_template="question_received"
	}
		<table>
			<tr>
				<th scope="row"><label for="ff_first_name">First Name</label></th>
				<td><input type="text" class="input" name="ff_first_name" id="ff_first_name" value="{member_first_name}" size="20" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="ff_last_name">Last Name</label></th>
				<td><input type="text" class="input" name="ff_last_name" id="ff_last_name" value="{member_last_name}" size="22" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="ff_sender_email">Email</label></th>
				<td>
					<input type="text" class="input" name="ff_sender_email" id="ff_sender_email" value="{email}" size="28" />
					<p class="instructions">The email that you would like to use for coorespondence.</p>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="recipient_email_user" class="req">Partner</label></th>
				<td>
					<select class="input" name="recipient_email_user">
						<option value="">Select Partner&hellip;</option>
					{exp:query
						sql="
							SELECT email, CONCAT(m_field_id_1, ' ', m_field_id_2) AS full_name FROM exp_member_data 
								JOIN exp_members
								ON exp_member_data.member_id = exp_members.member_id
							WHERE m_field_id_30 !=''
							AND (group_id = 6 OR group_id = 1)
							ORDER BY full_name ASC
						"}
						<option value="{email}">{full_name}</option>
					{/exp:query}
					</select>
					<p class="instructions">Choose whom you would like to answer your question.</p>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="ff_message" class="req">Message</label></th>
				<td><textarea class="input" name="ff_message" id="ff_message" value="" rows="8" cols="30"></textarea></td>
			</tr>
			<tr>
				<th></th>
				<td>
					
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
			<p>Your personal information will not be shared with any third party. If we use your question on our site your information will remain anonymous.</p>
		</section>
	</div>
</div>
{embed="embeds/_doc-bottom" sim="comments"}