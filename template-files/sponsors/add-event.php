{embed="includes/_doc-top" 
  channel="sponsors"
  title="Sponsorship Program | Create a new event"
  add="datePicker"}
<div class="body">
  <div class="heading clearafter">
    <h1>Create a new event</h1>
  </div>
  <div class="grid23 clearafter">
    <div class="left">
{exp:user:stats dynamic="off"}
{exp:weblog:entry_form weblog="events" return="/sponsors/edit-event" category="{sponsor_number}"}
    <h1>Event Information</h1>
    <table>
      <tr>
        <th scope="row"><label for="title">* Title</label></th>
        <td><input type="text" class="input" name="title" id="title" value="{title}" size="36" maxlength="100" onkeyup="liveUrlTitle();" /></td>
      </tr>
      <tr>
        <th scope="row"><label for="field_id_25">* Start Date</label></th>
        <td>
          <input type="text" dir="ltr" id="field_id_25" class="input" name="field_id_25" value="" maxlength="128" size="25" /><br>
          <p class="instructions">Format date as YYYY-MM-DD</p>
          <input class="hide" type="text" id="entry_date" name="entry_date" value="" maxlength="23" size="25" />
          <input type="text" class="hide" name="expiration_date" id="expiration_date" value="" maxlength="23" size="25" />
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="field_id_33">Start Time</label></th>
        <td>
          <input type="text" dir="ltr" id="field_id_33" class="input" name="field_id_33" value="" maxlength="128" size="25" /><br>
          <p class="instructions">Format time as 24 hour time.<br>
            12:00am = 00:00, 11:59pm = 23:59<br>
            <em>If all day event leave this field blank.</em></p>
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="field_id_26">* End Date</label></th>
        <td>
          <input type="text" dir="ltr" id="field_id_26" class="input" name="field_id_26" value="" maxlength="128" size="25" /><br>
          <p class="instructions">Format date as YYYY-MM-DD</p>
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="field_id_34">End Time</label></th>
        <td>
          <input type="text" dir="ltr" id="field_id_34" class="input" name="field_id_34" value="" maxlength="128" size="25" /><br>
          <p class="instructions">Format time as 24 hour time.<br>
            12:00am = 00:00, 11:59pm = 23:59<br>
            <em>If all day event leave this field blank.</em></p>
        </td>
      </tr>
      {exp:weblog:entries weblog="locations" limit="1" category="{sponsor_number}"}
      <tr>
        <th scope="row"><label for="field_id_341">Name</label></th>
        <td>
          <input type="text" dir="ltr" id="field_id_341" class="input" name="field_id_341" value="{title}" maxlength="256" size="40" />
          <p class="instructions">Name of the event location.</p>
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="field_id_337">* Address</label></th>
        <td><input type="text" dir="ltr" id="field_id_337" class="input" name="field_id_337" value="{sponsor_address}" maxlength="256" size="30" /><br></td>
      </tr>
      <tr>
        <th scope="row"><label for="field_id_338">* City</label></th>
        <td><input type="text" dir="ltr" id="field_id_338" class="input" name="field_id_338" value="{sponsor_city}" maxlength="256" size="25" /><br></td>
      </tr>
      <tr>
        <th scope="row"><label for="field_id_339">* State</label></th>
        <td>
          <select name="field_id_339" class="input"> 
            <option value="--"{if sponsor_state=="--"} selected="selected"{/if}>Select State</option>
            <option value="AL"{if sponsor_state=="AL"} selected="selected"{/if}>Alabama</option>
            <option value="AK"{if sponsor_state=="AK"} selected="selected"{/if}>Alaska</option>
            <option value="AZ"{if sponsor_state=="AZ"} selected="selected"{/if}>Arizona</option>
            <option value="AR"{if sponsor_state=="AR"} selected="selected"{/if}>Arkansas</option>
            <option value="CA"{if sponsor_state=="CA"} selected="selected"{/if}>California</option>
            <option value="CO"{if sponsor_state=="CO"} selected="selected"{/if}>Colorado</option>
            <option value="CT"{if sponsor_state=="CT"} selected="selected"{/if}>Connecticut</option>
            <option value="DE"{if sponsor_state=="DE"} selected="selected"{/if}>Delaware</option>
            <option value="DC"{if sponsor_state=="DC"} selected="selected"{/if}>District of Columbia</option>
            <option value="FL"{if sponsor_state=="FL"} selected="selected"{/if}>Florida</option>
            <option value="GA"{if sponsor_state=="GA"} selected="selected"{/if}>Georgia</option>
            <option value="HI"{if sponsor_state=="HI"} selected="selected"{/if}>Hawaii</option>
            <option value="ID"{if sponsor_state=="ID"} selected="selected"{/if}>Idaho</option>
            <option value="IL"{if sponsor_state=="IL"} selected="selected"{/if}>Illinois</option>
            <option value="IN"{if sponsor_state=="IN"} selected="selected"{/if}>Indiana</option>
            <option value="IA"{if sponsor_state=="IA"} selected="selected"{/if}>Iowa</option>
            <option value="KS"{if sponsor_state=="KS"} selected="selected"{/if}>Kansas</option>
            <option value="KY"{if sponsor_state=="KY"} selected="selected"{/if}>Kentucky</option>
            <option value="LA"{if sponsor_state=="LA"} selected="selected"{/if}>Louisiana</option>
            <option value="ME"{if sponsor_state=="ME"} selected="selected"{/if}>Maine</option>
            <option value="MD"{if sponsor_state=="MD"} selected="selected"{/if}>Maryland</option>
            <option value="MA"{if sponsor_state=="MA"} selected="selected"{/if}>Massachusetts</option>
            <option value="MI"{if sponsor_state=="MI"} selected="selected"{/if}>Michigan</option>
            <option value="MN"{if sponsor_state=="MN"} selected="selected"{/if}>Minnesota</option>
            <option value="MS"{if sponsor_state=="MS"} selected="selected"{/if}>Mississippi</option>
            <option value="MO"{if sponsor_state=="MO"} selected="selected"{/if}>Missouri</option>
            <option value="MT"{if sponsor_state=="MT"} selected="selected"{/if}>Montana</option>
            <option value="NE"{if sponsor_state=="NE"} selected="selected"{/if}>Nebraska</option>
            <option value="NV"{if sponsor_state=="NV"} selected="selected"{/if}>Nevada</option>
            <option value="NH"{if sponsor_state=="NH"} selected="selected"{/if}>New Hampshire</option>
            <option value="NJ"{if sponsor_state=="NJ"} selected="selected"{/if}>New Jersey</option>
            <option value="NM"{if sponsor_state=="NM"} selected="selected"{/if}>New Mexico</option>
            <option value="NY"{if sponsor_state=="NY"} selected="selected"{/if}>New York</option>
            <option value="NC"{if sponsor_state=="NC"} selected="selected"{/if}>North Carolina</option>
            <option value="ND"{if sponsor_state=="ND"} selected="selected"{/if}>North Dakota</option>
            <option value="OH"{if sponsor_state=="OH"} selected="selected"{/if}>Ohio</option>
            <option value="OK"{if sponsor_state=="OK"} selected="selected"{/if}>Oklahoma</option>
            <option value="OR"{if sponsor_state=="OR"} selected="selected"{/if}>Oregon</option>
            <option value="PA"{if sponsor_state=="PA"} selected="selected"{/if}>Pennsylvania</option>
            <option value="PR"{if sponsor_state=="PR"} selected="selected"{/if}>Puerto Rico</option>
            <option value="RI"{if sponsor_state=="RI"} selected="selected"{/if}>Rhode Island</option>
            <option value="SC"{if sponsor_state=="SC"} selected="selected"{/if}>South Carolina</option>
            <option value="SD"{if sponsor_state=="SD"} selected="selected"{/if}>South Dakota</option>
            <option value="TN"{if sponsor_state=="TN"} selected="selected"{/if}>Tennessee</option>
            <option value="TX"{if sponsor_state=="TX"} selected="selected"{/if}>Texas</option>
            <option value="UT"{if sponsor_state=="UT"} selected="selected"{/if}>Utah</option>
            <option value="VT"{if sponsor_state=="VT"} selected="selected"{/if}>Vermont</option>
            <option value="VA"{if sponsor_state=="VA"} selected="selected"{/if}>Virginia</option>
            <option value="VI"{if sponsor_state=="VI"} selected="selected"{/if}>Virgin Islands</option>
            <option value="WA"{if sponsor_state=="WA"} selected="selected"{/if}>Washington</option>
            <option value="WV"{if sponsor_state=="WV"} selected="selected"{/if}>West Virginia</option>
            <option value="WI"{if sponsor_state=="WI"} selected="selected"{/if}>Wisconsin</option>
            <option value="WY"{if sponsor_state=="WY"} selected="selected"{/if}>Wyoming</option>
          </select>
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="field_id_340">* Zip Code</label></th>
        <td><input type="text" dir="ltr" id="field_id_340" class="input" name="field_id_340" value="{sponsor_zip}" maxlength="9" size="5" /><br></td>
      </tr>
      {/exp:weblog:entries}
      <tr>
        <th scope="row"><label for="field_id_35">* Description</label></th>
        <td>
          <textarea id="field_id_35" class="input" name="field_id_35" dir="ltr" cols="36" rows="8"></textarea><br>
          <p class="instructions">Should include event description, contact information, registration instructions, etc.</p>
            <p class="instructions">Follow these <strong><a href="#formatting-tips" class="formatting-tips">formatting tips</a></strong> to make text bold, italic, or as a bulleted list.</p>
            <p id="formatting-tips" class="instructions">
            <strong>Formatting Tips:</strong><br>
              *Bold* = <strong>Bold</strong><br>
              _Italic_ = <em>Italic</em><br><br>
              <strong>To add a bulleted list follow this format:</strong><br>
              * Item One<br>
              * Item Two<br>
              * Item Three<br><br>
              
              <strong>To add a numbered list follow this format:</strong><br>
              # Item One<br>
              # Item Two<br>
              # Item Three<br><br>
              
              <strong>To add a link to a website or e-mail address:</strong><br>
              "text that you want linked":http://www.linkgoeshere.com<br>
              "emailme@anywhere.com":mailto:emailme@anywhere.com<br>
            </p>
        </td>
      </tr>
      <tr>
        <th scope="row">
          <label for="field_id_35">* Categories</label>
        </th>
        <td>
          <br>
          <p class="instructions"><strong>Please select at least one category for your event.</strong></p>
          <input type="checkbox" name="category[]" value="374" /> <span>Finding Peace</span><br />
          <input type="checkbox" name="category[]" value="371" /> <span>Fitness</span><br />
          <input type="checkbox" name="category[]" value="376" /> <span>Health Expo</span><br />
          <input type="checkbox" name="category[]" value="369" /> <span>Heart Disease Prevention</span><br />
          <input type="checkbox" name="category[]" value="372" /> <span>Improving Mental Performance</span><br />
          <input type="checkbox" name="category[]" value="367" /> <span>Natural Remedies</span><br />
          <input type="checkbox" name="category[]" value="375" /> <span>Overcoming Depression</span><br />
          <input type="checkbox" name="category[]" value="373" /> <span>Reducing Stress</span><br />
          <input type="checkbox" name="category[]" value="365" /> <span>Reversing Diabetes</span><br />
          <input type="checkbox" name="category[]" value="370" /> <span>Stop Smoking</span><br />
          <input type="checkbox" name="category[]" value="366" /> <span>Vegetarian Cooking</span><br />
          <input type="checkbox" name="category[]" value="368" /> <span>Weight Management</span><br />
        </td>
      </tr>
      <tr class="hide">
        <td>
          <input name="start-date" id="start-date" class="date-pick" />
          <input name="end-date" id="end-date" class="date-pick" />
        </td>
      </tr>
      <tr>
        <th></th>
        <td>
          <div class="button-wrap">
            <button type="submit" class="super green button"><span>Save</span></button>
            <button type="reset" class="super secondary button"><span>Reset</span></button>
          </div>
        </td>
      </tr>
    </table>
{/exp:weblog:entry_form}
{/exp:user:stats}
  </div><!-- /.left -->
  <div class="right sidebar">
    <div class="bar">Add Events</div>
      <p>To view or edit an event, click <a href="/sponsors/edit-event">here</a>.</p>
      <p><strong>IMPORTANT:</strong> Please create a separate entry for each day of an event that does not fall on consecutive days.</p>
      <p>Only approved {site_name} events may be added. If your event type is not listed <a href="/sponsors/resources">here</a>, please email <a href="mailto:club@newstart.com">club@newstart.com</a> or call 530-422-7993 before adding your event.</p>
  </div>
  </div><!-- /.grid23 -->
</div><!-- /.body -->
{embed="includes/_doc_bottom" script_add="jquery.date.min|jquery.datePicker.min|jquery.maskedinput-1.3.min|sponsors-masking|sponsors"}