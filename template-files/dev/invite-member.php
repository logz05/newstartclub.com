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
				<input type="hidden" name="location_name" id="location_name" value="{exp:channel:categories show='{member_sponsor_id}' channel='locations' style='linear'}{category_name}{/exp:channel:categories}" />
				<input type="hidden" name="sponsor_full_name" value="{member_first_name} {member_last_name}" />
				<input type="hidden" name="ff_sender_email" value="{email}" />
				<input type="hidden" name="sponsor_id" value="{member_sponsor_id}" />
			{/exp:user:stats}
					<p class="button-wrap">
						<button type="submit" class="super secondary button"><span>Invite Member</span></button>
					</p>
				</td>
			</tr>
		</table>
 
{/exp:freeform:form}