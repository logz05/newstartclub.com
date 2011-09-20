{if logged_out}
<div id="signin-modal-{embed:modal-role}" class="reveal-modal standalone">
  <div class="grid12 clearafter">
    <div class="left">
      <h1>Sign In</h1>
      {if embed:modal-msg}<p>{embed:modal-msg}</p>{/if}
      {exp:member:login_form error_page="members/error" return="/{segment_1}/{segment_2}/{segment_3}/{segment_4}/{segment_5}/{segment_6}/{segment_7}"}
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
          <td><input class="checkbox" type="checkbox" name="auto_login" value="1" /><span>Keep me logged in</span></td>
        </tr>{/if}
        <tr>
          <th scope="row">&nbsp;</th>
          <td>
            <button type="submit" class="super green button"><span>Sign In</span></button>
            <a class="forgot-pass" href="/forgot-password">Forgot your password?</a>
          </td>
        </tr>
      </table>
      {/exp:member:login_form}
    </div><!--/.left-->
    <div class="right">
      <h1>Not a Member?</h1>
      <p>Here's some of the benefits:</p>
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