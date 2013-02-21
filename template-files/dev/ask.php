{exp:freeform:form
		form_id="4"
		return="dev/ask-success"
		recipients="yes"
		recipient1="Email 1|email1@domain.com"
		recipient2="Email 2|email2@domain.org"
}
	<p><label>Choose Recipients</label><br/>
	<select name="recipient_email" />
			{freeform:recipients}
			<option value="{freeform:recipient_value}">
					{freeform:recipient_name}
			</option>
			{/freeform:recipients}
	</select></p>
	
	<input type="submit" />
	
{/exp:freeform:form}