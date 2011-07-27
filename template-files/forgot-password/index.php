{embed="includes/_doc-top" 
  channel="{channel}"
  header="no"
  nav="no"
  title="{section}"
}
{assign_variable:channel="members"}
{assign_variable:section="Forgot Password"}
<div class="body">
  {if logged_out}
    <h1>Forgot your password?</h1>
    <p>If you've forgotten your password, just enter your email address you registered with and you will receive an email with instructions for resetting your password.</p>
    {exp:user:forgot}
      <table>
        <tr>
          <th scope="row"><label for="email">Email</label></th>
          <td><input type="text" class="input" id="email" name="email" value="" size="23" /></td>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td>
            <button type="submit" class="super green button"><span>Reset Password</span></button>
          </td>
        </tr>
      </table>
    {/exp:user:forgot}
  {if:else}
    <h1>You&rsquo;re already signed in!</h1>
    <p>If you&rsquo;d like to change your password go to <a href="/settings/">settings</a> and use the new password form under the Account section.</p>
  {/if}
</div>
{doc_bottom}