{embed="includes/_doc-top" 
	channel="{channel}"
	section="{section}"
	title="Ask your question"}
{assign_variable:channel="questions"}
{assign_variable:section="Questions"}
{embed="includes/_breadcrumbs" channel="{channel}" section="{section}"}
<div class="body">
	<div class="heading clearafter">
		<h1>Ask your question</h1>
	</div>
	<div class="grid23 clearafter">
		<div class="single left">
		<p>Have a health concern? Ask one of our {site_name} <a href="/partners/">partners</a>.</p>
		{exp:freeform:form form_name="qa_form" return="questions/question-submitted" notify="club@newstart.com|tloo@weimar.org" template="admin_notify" required="name|email" send_user_email="yes" user_email_template="question_submitted"}
		<table>
			<tr>
				<th scope="row"><label for="name" class="req">Name</label></th>
				<td><input type="text" class="input" name="name" id="name" value="{firstName} {lastName}" size="25" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="email" class="req">Email</label></th>
				<td><input type="text" class="input" name="email" id="email" value="{email}" size="25" /></td>
			</tr>
			<tr>
				<th scope="row"><label for="message" class="req">Message</label></th>
				<td><textarea class="input" name="message" id="message" value="" rows="8" cols="30"></textarea></td>
			</tr>
			<tr>
				<th></th>
				<td>
					<p class="button-wrap">
						<button type="submit" class="super green button"><span>Submit</span></button>
						<button type="reset" class="super secondary button"><span>Reset</span></button>
					</p>
				</td>
			</tr>
		</table>
		{/exp:freeform:form}
		</div><!--/.list-->
		<div class="sidebar right">
			<div class="bar">Privacy</div>
			<p>Your personal information will not be shared with any third party. If we use your question on our site your information will remain anonymous.</p>
		</div><!--/.sidebar-->
	</div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom" standalone="{if logged_out}yes{if:else}{/if}"}