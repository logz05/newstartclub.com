{embed="embeds/_doc-top" 
  channel="{channel}"
  title="{section}"
  header=""
  sponsor_admin="yes"}
{assign_variable:channel="sponsors"}
{assign_variable:section="Sponsorship Application"}
<div class="heading clearfix">
  <h1>{section}</h1>
</div>
<div class="grid23 clearfix">
  <div class="main left">
    <div id="entry">
      {exp:weblog:entries weblog="sponsors" entry_id="479" limit="1"}
        {body}
      {/exp:weblog:entries}
    </div>
<form action="/sponsors/application-submitted" method="post" id="sponsor_register" enctype="multipart/form-data">

  <h2>Sponsor Information</h2>
  <noscript>
    <div class="alert-box warning">
      <p>For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions how to enable JavaScript in your web browser</a>.</p>
    </div>
  </noscript>
  <table>
    <tr>
      <th scope="row" width="150px"><label for="sponsorName" class="req"><span class="req">* </span>Sponsor Name</label></th>
      <td><input type="text" class="input" name="sponsorName" id="sponsorName" value="" size="25" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorAddress" class="req"><span class="req">* </span>Physical Address</label></th>
      <td><input type="text" class="input" id="sponsorAddress" name="sponsorAddress" value="" size="32" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorCity" class="req"><span class="req">* </span>City</label></th>
      <td><input type="text" class="input" id="sponsorCity" name="sponsorCity" value="" size="20" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorState" class="req"><span class="req">* </span>State</label></th>
      <td>
        <select name="sponsorState" class="input"> 
          <option value="--">--</option>
          <option value="Alabama">Alabama</option>
          <option value="Alaska">Alaska</option>
          <option value="Arizona">Arizona</option>
          <option value="Arkansas">Arkansas</option>
          <option value="California">California</option>
          <option value="Colorado">Colorado</option>
          <option value="Connecticut">Connecticut</option>
          <option value="Delaware">Delaware</option>
          <option value="District of Columbia">District of Columbia</option>
          <option value="Florida">Florida</option>
          <option value="Georgia">Georgia</option>
          <option value="Guam">Guam</option>
          <option value="Hawaii">Hawaii</option>
          <option value="Idaho">Idaho</option>
          <option value="Illinois">Illinois</option>
          <option value="Indiana">Indiana</option>
          <option value="Iowa">Iowa</option>
          <option value="Kansas">Kansas</option>
          <option value="Kentucky">Kentucky</option>
          <option value="Louisiana">Louisiana</option>
          <option value="Maine">Maine</option>
          <option value="Maryland">Maryland</option>
          <option value="Massachusetts">Massachusetts</option>
          <option value="Michigan">Michigan</option>
          <option value="Minnesota">Minnesota</option>
          <option value="Mississippi">Mississippi</option>
          <option value="Missouri">Missouri</option>
          <option value="Montana">Montana</option>
          <option value="Nebraska">Nebraska</option>
          <option value="Nevada">Nevada</option>
          <option value="New Hampshire">New Hampshire</option>
          <option value="New Jersey">New Jersey</option>
          <option value="New Mexico">New Mexico</option>
          <option value="New York">New York</option>
          <option value="North Carolina">North Carolina</option>
          <option value="North Dakota">North Dakota</option>
          <option value="Ohio">Ohio</option>
          <option value="Oklahoma">Oklahoma</option>
          <option value="Oregon">Oregon</option>
          <option value="Pennsylvania">Pennsylvania</option>
          <option value="Puerto Rico">Puerto Rico</option>
          <option value="Rhode Island">Rhode Island</option>
          <option value="South Carolina">South Carolina</option>
          <option value="South Dakota">South Dakota</option>
          <option value="Tennessee">Tennessee</option>
          <option value="Texas">Texas</option>
          <option value="Utah">Utah</option>
          <option value="Vermont">Vermont</option>
          <option value="Virginia">Virginia</option>
          <option value="Virgin Islands">Virgin Islands</option>
          <option value="Washington">Washington</option>
          <option value="West Virginia">West Virginia</option>
          <option value="Wisconsin">Wisconsin</option>
          <option value="Wyoming">Wyoming</option>
        </select>
      </td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorZipCode" class="req"><span class="req">* </span>Zip Code</label></th>
      <td><input type="text" class="input" id="sponsorZipCode" name="sponsorZipCode" value="" size="7" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorCountry">Country</label></th>
      <td><div class="input readonly">United States</div><input type="hidden" name="sponsorCountry" value="United States" size="32" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorPhone" class="req"><span class="req">* </span>Phone</label></th>
      <td><input type="tel" class="input" id="sponsorPhone" name="sponsorPhone" value="" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorEmail" class="req"><span class="req">* </span>Email</label></th>
      <td><input type="email" class="input" id="sponsorEmail" name="sponsorEmail" value="" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorFax">Fax</label></th>
      <td><input type="text" class="input" id="sponsorFax" name="sponsorFax" value="" size="15" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorWebsite">Website</label></th>
      <td><input type="text" class="input" id="sponsorWebsite" name="sponsorWebsite" value="" size="24" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorRegAff" class="req"><span class="req">* </span>Religious Affiliation</label></th>
      <td><input type="text" class="input" id="sponsorRegAff" name="sponsorRegAff" value="" size="32" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorHealthEvents" class="req"><span class="req">* </span>Health Events</label></th>
      <td>
        <textarea class="input" id="sponsorHealthEvents" name="sponsorHealthEvents" rows="5" cols="32" autocomplete="off"></textarea>
        <p class="instructions">Please list the type of community health events your organization would like to sponsor.</p>
      </td>
    </tr>
    <tr>
      <th scope="row"><label for="sponsorNeedHelp" class="req"><span class="req">* </span>Need Help?</label></th>
      <td><br>
        <label class="need-help">
          <input type="radio" class="input" name="sponsorNeedHelp" value="Yes" />
          <span>Yes</span>
        </label><br>
        <label class="need-help">
          <input type="radio" class="input" name="sponsorNeedHelp" value="No" />
          <span>No</span>
        </label>
        <p class="instructions"><a href="http://newstartglobal.com" target="_blank">NEWSTART&reg; Global</a> medical missionary teams are available to help you get started with your health outreach.</p>
      </td>
    </tr>
  </table>

  <h2>Contact Person</h2>

  <table>
    {exp:user:stats}
    <tr>
      <th scope="row" width="150px"><label for="contactName" class="req"><span class="req">* </span>Contact Name</label></th>
      <td><input type="text" class="input" name="contactName" id="contactName" value="{firstName} {lastName}" size="25" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="contactAddress"><span class="req">* </span>Mailing Address</label></th>
      <td><input type="text" class="input" id="contactAddress" name="contactAddress" value="{address}" size="32" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="contactCity"><span class="req">* </span>City</label></th>
      <td><input type="text" class="input" id="contactCity" name="contactCity" value="{city}" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="contactState"><span class="req">* </span>State</label></th>
      <td>
        <select name="contactState" class="input"> 
          {select_state} 
          <option value="{value}" {selected}>{value}</option> 
          {/select_state}
        </select>
      </td>
    </tr>
    <tr>
      <th scope="row"><label for="contactZipCode" class="req"><span class="req">* </span>Zip Code</label></th>
      <td><input type="text" class="input" id="contactZipCode" name="contactZipCode" value="{zipCode}" size="7" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="contactPhone"><span class="req">* </span>Phone</label></th>
      <td><input type="tel" class="input" id="contactPhone" name="contactPhone" value="{phone}" size="15" autocomplete="off" /></td>
    </tr>
    <tr>
      <th scope="row"><label for="contactEmail" class="req"><span class="req">* </span>Email</label></th>
      <td><input type="email" class="input" id="contactEmail" name="contactEmail" value="{email}" size="32" autocomplete="off" /></td>
    </tr>
    {/exp:user:stats}
    <tr>
      <th scope="row">&nbsp;</th>
      <td>
        <div class="button-wrap">
          <button type="submit" class="super green button"><span>Submit</span></button>
          <button type="reset" class="super secondary button"><span>Reset</span></button>
        </div>
      </td>
    </tr>
  </table>
</form>
  </div>
  <div class="sidebar right">
    <div class="bar">Sponsorship Application</div>
    {exp:weblog:entries weblog="{channel}" entry_id="480" limit="1"}
      {body}
    {/exp:weblog:entries}
  </div>
</div>
{embed="embeds/_doc-bottom" script_add="jquery.validate.min|jquery.maskedinput-1.3.min|sponsor-register"}