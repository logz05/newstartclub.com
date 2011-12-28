{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section}"
}
{assign_variable:channel="members"}
{assign_variable:section="Create an Account"}
<div class="heading clearfix">
  <h1>{section}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
  {if group_id==1}
    <p>You&rsquo;re currently signed in as a Super Admin. To see this form you must log out.</p>
  {/if}
{exp:user:register form:name="register-key" form:id="register" return="update-profile" required="firstName|lastName|username|password|password_confirm|zipCode" require_key="yes"}
  <noscript>
    <div class="no-script">
      <p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
    </div>
  </noscript>
  <table>
    <tr>
      <th scope="row" width="140"><label for="firstName" class="req"><span class="req">* </span>First Name</label></th>
      <td><input type="text" class="input" name="firstName" id="firstName" value="" size="25" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="lastName" class="req"><span class="req">* </span>Last Name</label></th>
      <td><input type="text" class="input" name="lastName" id="lastName" value="" size="25" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="address">Address</label></th>
      <td><input type="text" class="input" id="address" name="address" value="" size="32" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="city">City</label></th>
      <td><input type="text" class="input" id="city" name="city" value="" size="20" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="state">State</label></th>
      <td>
        <select name="state" class="input"> 
        {select_state} 
        <option value="{value}" {selected}>{value}</option> 
        {/select_state} 
        </select>
      </td>
    </tr>
    <tr>
      <th scope="row"><label for="zipCode" class="req"><span class="req">* </span>Zip Code</label></th>
      <td><input type="text" pattern="[0-9]*" class="input" id="zipCode" name="zipCode" value="" size="7" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="phone">Phone</label></th>
      <td><input type="tel" class="input" id="phone" name="phone" value="" size="15" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="username" class="req"><span class="req">* </span>Email</label></th>
      <td>
        <input type="email" class="input" id="email" name="username" value="" size="32" autocomplete="off" />
        <p class="instructions">Please provide a valid email address to receive your FREE gift. The email address is not made public and will only be used if you wish to receive a new password or to receive certain news or notifications by email.</p>
      </td>
    </tr>
    <tr>
      <th scope="row"><label for="password" class="req"><span class="req">* </span>Password</label></th>
      <td><input type="password" class="input" id="password" name="password" size="20" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="password_confirm" class="req"><span class="req">* </span>Password, Again</label></th>
      <td><input type="password" class="input" id="password_confirm" name="password_confirm" size="20" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row">
      </th>
      <td>
        <h2>How did you hear about us?</h2>
        <select name="referrer" class="input">
          {select_referrer} 
          <option value="{value}" {selected}>{value}</option> 
          {/select_referrer}
        </select>
      </td>
    </tr>
    <tr>
      <th scope="row">
      </th>
      <td>
        <input class="checkbox" type="checkbox" name="terms_and_conditions"><span>I agree to the <a href="/about/terms-of-use">terms</a> and <a href="/about/privacy-policy">conditions</a>.</span>
      </td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>
        <input type="hidden" name="key" value="{key}" />
        <input type="hidden" class="input" id="sponsor_number_credit" name="sponsor_number_credit" size="5" value="{segment_3}" autocomplete="off" />
        <div class="button-wrap">
          <button type="submit" class="super green button"><span>Submit</span></button>
          <button type="reset" class="super secondary button"><span>Reset</span></button>
        </div>
      </td>
    </tr>
  </table>
{/exp:user:register}
  </div>
  <div class="sidebar right">
    <div class="bar">My Information</div>
    <p class="fine-print">The information provided will be saved electronically and will not be shared with third parties. You will only receive information from us regarding our own or our partners&rsquo; events and materials, according to your interest.</p>
  </div>
</div><!--/.grid23-->
{embed="embeds/_doc-bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|member-register"}