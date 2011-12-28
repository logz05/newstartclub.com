{embed="embeds/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="{section}"}
{assign_variable:channel="members"}
{assign_variable:section="Member Settings"}
<div class="heading clearfix">
  <div class="icon"></div>
  <h1>{section}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">

  <?php
  
  session_start();
  
  
  if( isset( $_SESSION['settingsUpdated'] ) && $_SESSION['settingsUpdated'] == true ) {
    echo '<div id="settings-msg">
        <p>Your settings have been saved!</p>
      </div>';
  }
  //reset this now that we've given our message.
  $_SESSION['settingsUpdated'] = false;
  
  ?>
  
  <noscript>
    <div class="no-script">
      <p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
    </div>
  </noscript>
  
{exp:user:edit form:class="clearfix" form:name="settings" form:id="settings" return="settings" error_page="members/error" password_required="y" dynamic="off"}
    <h2 class="first">Subjects you are interested in:</h2>
    <div class="grid12-23 clearfix">
      <div class="left">
        <ul>
        {categories group_id="14" orderby="category_order"}{category_selected} checked="checked"{/category_selected}
        {category_body}<li><label><input type="checkbox" class="input checkbox" name="category[]" value="{category_id}"{selected} /><span>{category_description}</span></label></li>
        {/category_body}{/categories}
        </ul>
      </div>
      <div class="right">
        <h3>Emotional and spiritual health:</h3>
        <ul>
        {categories group_id="15" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
        {category_body}<li><label><input type="checkbox" class="input checkbox" name="category[]" value="{category_id}"{selected} /><span>{category_description}</span></label></li>
        {/category_body}{/categories}
        </ul>
      </div>
    </div>
    <h3>I would like information on:</h3>
    <ul>
    {categories group_id="16" orderby="category_order"}{category_selected}checked="checked"{/category_selected}
    {category_body}<li><label><input type="checkbox" class="input checkbox" name="category[]" value="{category_id}"{selected} /><span>{category_description}</span></label></li>
    {/category_body}{/categories}
    </ul>

    <h2>Profile Information</h2>
    <table>
      <tr>
        <th scope="row" width="178"><label for="firstName">First Name</label></th>
        <td><input type="text" class="input" name="firstName" id="firstName" value="{firstName}" size="25" /></td>
      </tr>
      <tr>
        <th scope="row"><label for="lastName">Last Name</label></th>
        <td><input type="text" class="input" name="lastName" id="lastName" value="{lastName}" size="25" /></td>
      </tr>
      <tr>
        <th scope="row"><label for="address">Address</label></th>
        <td><input type="text" class="input" id="address" name="address" value="{address}" size="28" /></td>
      </tr>
      <tr>
        <th scope="row"><label for="city">City</label></th>
        <td><input type="text" class="input" id="city" name="city" value="{city}" size="20" /></td>
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
        <th scope="row"><label for="zipCode">Zip Code</label></th>
        <td><input type="text" class="input" id="zipCode" name="zipCode" value="{zipCode}" size="7" /></td>
      </tr>
      <tr>
        <th scope="row"><label for="phone">Phone</label></th>
        <td><input type="text" class="input" id="phone" name="phone" value="{phone}" size="15" /></td>
      </tr>
      <tr class="hidden">
        <th scope="row"><label>Localization Settings</label></th>
        <td>
          <p class="button-wrap">
            <a class="super green button" data-reveal-id="localization"><span>Choose Settings</span></a>
          </p>
        </td>
      </tr>
    </table>
    
    <div id="localization" class="reveal-modal standalone">
      <h2>Localization Settings</h2>
      <table>
        <tr class="hidden">
          <th scope="row"><label for="language">Language</label></th>
          <td>
            <select name="language" class="input">
              {languages}
              <option value="{language_name}" {selected}>{language_label}</option>
              {/languages}
            </select>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="timezone">Timezone</label></th>
          <td>
            <select name="timezone" class="input"> 
              {timezones} 
              <option value="{zone_name}" {selected}>{zone_label}</option> 
              {/timezones} 
            </select>
          </td>
        </tr>
        <tr>
          <th scope="row"><label for="daylight_savings">DST</label></th>
          <td>
            <input type="checkbox" class="input" name="daylight_savings" value="y" {if daylight_savings == "y"}checked="checked"{/if} /><span>Use Daylight Savings Time</span>
          </td>
        </tr>
        <tr>
          <th scope="row"></th>
          <td>
            <p class="button-wrap">
              <a class="super green button close-modal"><span>Select</span></a>
            </p>
          </td>
        </tr>
      </table>
    </div>
    
    <h2>Account</h2>
    <table>
      <tr>
        <th scope="row"><label for="username">Email</label></th>
        <td>
          <input class="input" type="text" name="username" id="username" value="{username}" size="32" />
          <input class="hidden" type="hidden" name="email" id="email" value="{username}" />
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="password">New Password</label></th>
        <td><input type="password" class="input" id="password" name="password" size="20" autocomplete="off" /></td>
      </tr>
      <tr>
        <th scope="row"><label for="password_confirm">Confirm New Password</label></th>
        <td><input type="password" class="input" id="password_confirm" name="password_confirm" size="20" autocomplete="off" /></td>
      </tr>
      <tr>
        <th scope="row"><label for="current_password" class="req">Current Password</label></th>
        <td>
          <input type="password" class="input" id="current_password" name="current_password" size="20" autocomplete="off" />
          <input type="hidden" name="terms_and_conditions" value="on" />
        </td>
      </tr>
      <tr>
        <th></th>
        <td>
          <input type="hidden" name="update" value="updated" />
          <div class="button-wrap">
            <button type="submit" class="super green button"><span>Update</span></button>
          </div>
        </td>
      </tr>
    </table>
    <p>
      <a class="right" href="/delete-account/">Delete Account&hellip;</a>
    </p>
    
  </div><!--/.left-->
  {/exp:user:edit}
  <div class="sidebar right">
    <div class="bar">{section}</div>
    <p>Please enter your current password to save changes.</p>
  </div>
</div><!--/.grid23-->

{embed="embeds/_doc-bottom" script_add="modalpopup|jquery.validate.min|jquery.maskedinput-1.3.min|member-settings"}
