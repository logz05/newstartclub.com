{if logged_out}
<div id="signin-modal-sponsor-apply" class="reveal-modal">
  <div class="grid12 clearfix">
    <div class="left">
      <h2>Sign In</h2>
      <h3>You must sign in to apply for sponsorship.</h3>
      {exp:member:login_form error_page="members/error" return="/sponsors/apply"}
      <table>
        <tr>
          <th scope="row"><label for="email">Email</label></th>
          <td><input type="email" class="input" id="email" name="username" value="" size="23" autocapitalize="off" autocorrect="off" autocomplete="off"/></td>
        </tr>
        <tr>
          <th scope="row"><label for="password">Password</label></th>
          <td><input type="password" class="input" id="password" name="password" size="23" /></td>
        </tr>
        {if auto_login}<tr>
          <th></th>
          <td>
            <p>
              <input class="checkbox" type="checkbox" name="auto_login" value="1" /><span>Keep me logged in</span>
            </p>
          </td>
        </tr>{/if}
        <tr>
          <th scope="row">&nbsp;</th>
          <td>
            <div class="button-wrap">
              <button type="submit" class="super green button"><span>Sign In</span></button>
              <a class="forgot-pass" href="/forgot-password">Forgot your password?</a>
            </div>
          </td>
        </tr>
      </table>
      {/exp:member:login_form}
    </div>
    <div class="right">
      <h2>Not a Member?</h2>
      <h3>Here&rsquo;s some of the benefits:</h3>
      <ul>
        <li>Live streaming videos</li>
        <li>Local seminars &amp; events</li>
        <li>Expert health advice</li>
        <li>Wellness tips &amp; tools</li>
        <li>FREE membership</li>
      </ul>
      <p class="button-wrap">
        <a href="/register" class="super red button"><span>Register</span></a>
      </p>
    </div>
  </div>
  <a class="close-modal close">&times;</a>
</div>
{/if}