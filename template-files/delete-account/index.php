{embed="includes/_doc-top" 
	channel="{channel}"
	title="{section}"
	standalone="yes"
	header="no"
	nav="no"}
{assign_variable:channel="members"}
{assign_variable:section="Delete Account"}
<div class="body">
	<h1>Delete My Account</h1>
	{exp:user:delete_form return="delete-confirmation" form:class="clearfix" form:id="delete-account"} 
		<h2>Delete account: {email}</h2>  
		<table>
			<tr>
				<th scope="row"><label for="password">Your Password:</label></th>
				<td><input type="password" class="input" name="password" /></td>
			</tr>
		</table>
		<p>This will delete all entries, posts, comments, and other content associated with your account.</p>
		<p>WARNING: THIS ACTION CANNOT BE UNDONE!</p>
		<p class="button-wrap clearafter">
			<a href="{path='settings'}" class="super green button"><span>&laquo; Back</span></a>
			<button type="submit" class="super red right button"><span>Delete Account</span></button>
		</p>
	{/exp:user:delete_form}
</div><!-- /.body -->
{embed="includes/_doc_bottom" standalone="yes"}