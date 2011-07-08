{embed="includes/_doc-top" 
	channel="{channel}"
	header="no"
	nav="no"
	title="{section}"}
{assign_variable:channel="my_health"}
{assign_variable:section="Health Score Calculator Error"}
	{if logged_out}
		{embed="includes/_signin-form" msg="You must be signed in to see this page."}
	{/if}
	{if logged_in}
		<h1>Calculator Error</h1>
		<p>There was an error in processing your request and the form must be reset.</p>
		<p class="button-wrap">
			<a href="{path='{channel}/calculator'}" class="super green button"><span>Reset</span></a>
		</p>
	{/if}
</div><!-- /.body -->
{embed="includes/_doc_bottom" standalone="{if logged_out}{if:else}yes{/if}"}