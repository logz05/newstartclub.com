{embed="includes/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="Partnership Application"
}
{assign_variable:channel="partners"}
{assign_variable:section="Partners"}
<div class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    <h1>
      Partnership Application
    </h1>
  </div>
  <div class="grid23 clearafter">
    <div class="left">
      <form action="/partners/application-submitted" method="post" enctype="multipart/form-data">
        <table>
          <tr>
            <th scope="row">
              <label for="name">Name</label>
            </th>
            <td>
              <input type="text" name="name" class="input" id="name" size="25" value="{exp:user:stats dynamic='off'}{firstName} {lastName}{/exp:user:stats}" />
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="email">E-mail</label>
            </th>
            <td>
              <input type="text" name="email" class="input" id="email" size="28" value="{exp:user:stats dynamic='off'}{username}{/exp:user:stats}" />
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="credentials">Credentials</label>
            </th>
            <td>
              <input type="text" name="credentials" class="input" id="credentials" size="8" value="" />
              <p class="instructions">i.e. MD, RN, MPH, etc.</p>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="address">Business Address</label>
            </th>
            <td>
              <input type="text" name="address" class="input" id="address" size="32" value="" />
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="city">City</label>
            </th>
            <td>
              <input type="text" name="city" class="input" id="city" value="" size="20" value="" />
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="state">State</label>
            </th>
            <td>
              <select name="state" class="input"> 
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
            <th scope="row">
              <label for="zip">Zip Code</label>
            </th>
            <td>
              <input type="text" name="zip" class="input" id="zip" value="" size="7" value="" />
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="specialty">Specialty</label>
            </th>
            <td>
              <input type="text" name="specialty" class="input" id="specialty" value="" size="23" value="" />
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="bio">Biography</label>
            </th>
            <td>
              <textarea class="input" id="bio" name="bio" rows="5" cols="32" autocomplete="off"></textarea>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="partnerPicture">Picture</label>
              <div></div>
            </th>
            <td>
              <input type="file" name="partnerPicture" id="partnerPicture" />
              <p class="instructions">Accepted file types: .jpg, .bmp, .tiff, .png</p>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <label for="affiliation">Local Church Affiliation</label>
            </th>
            <td>
              <input type="text" name="affiliation" class="input" id="affiliation" size="20" value="" />
            </td>
          </tr>
          <tr>
            <th scope="row">
            </th>
            <td>
              <div class="button-wrap">
                <button type="submit" class="super green button"><span>Submit</span></button>
              </div>
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div class="sidebar right">
      <div class="bar">Partnership Application</div>
      <p>{site_name} partners must be individuals that abide by and promote the principles of the <a href="http://newstart.com">NEWSTART&reg;</a> acronym and should be in harmony with the teachings of the Seventh-day Adventist Church. We reserve the right to deny or revoke partnership.</p>
    </div>
  </div>
</div>
{embed="includes/_doc_bottom"}