{embed="includes/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="Request More Information"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
<div class="body">
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
  <div class="heading clearafter">
    <h1>Request More Information</h1>
  </div>
  
  <div class="grid23 clearafter">
    <div class="single left">
      {exp:weblog:entries weblog="{channel}" entry_id="640" limit="1"}
        {body}
      {/exp:weblog:entries}
      <form method="post" action="/{channel}/request-sent/" class="clearafter request-info">
        <table>
          {exp:user:stats}
          <tr>
            <th scope="row"><label for="name">Name</label></th>
            <td><input type="text" class="input" name="name" id="name" value="{firstName} {lastName}" size="28" /></td>
          </tr>
          <tr>
            <th scope="row"><label for="email">Email</label></th>
            <td><input type="text" class="input" name="email" id="email" value="{email}" size="28" /></td>
          </tr>
          <tr>
            <th scope="row"><label for="phone">Phone</label></th>
            <td><input type="text" class="input" id="phone" name="phone" value="{phone}" size="15" /></td>
          </tr>
          <tr>
            <th scope="row"><label for="zipCode">Zip Code</label></th>
            <td>
              <input type="text" class="input" id="zipCode" name="zipCode" value="{zipCode}" size="7" />
              <input type="hidden" name="memberAge" value="{memberAge}" />
            </td>
          </tr>
          {/exp:user:stats}
          <tr>
            <th scope="row"><label for="custom-message">Message</label></th>
            <td><textarea class="input" cols="36" rows="6" name="custom-message" onfocus="if(this.value=='Short description of your condition (optional)')this.value='';">Short description of your condition (optional)</textarea></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>
              <button type="submit" class="super green button"><span>Send Request</span></button>
            </td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td><p><a href="/{channel}/results/">&laquo; Back to my results</a></p></td>
          </tr>
        </table>
        <div id="locations" class="reveal-modal standalone">
          <p><strong>NEWSTART&reg; Lifestyle Program Locations</strong></p>
          <hr>
          <div class="scroll-box">
            <table>
              <tr>
                <td>
                  <p><strong>Weimar Center of Health &amp; Education</strong><br />20601 West Paoli Lane<br />Weimar, CA 95736</p>
                  <p>(800) 525-9192<br /><a href="http://www.newstart.com" title="NEWSTART&reg;" target="_blank">www.newstart.com</a></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p><strong>Wildwood Lifestyle Center &amp; Hospital</strong><br />435 Lifestyle Ln<br />Wildwood, GA 30757</p>
                  <p>(800) 634-9355<br /><a href="http://www.wildwoodhealth.org/" title="Wildwood Lifestyle Center &amp; Hospital" target="_blank">www.wildwoodhealth.org</a></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p><strong>Uchee Pines Institute</strong><br />30 Uchee Pines Road<br />Seale, AL 36875</p>
                  <p>(877) 824-3374<br /><a href="http://www.ucheepines.org/" title="Uchee Pines Institute" target="_blank">www.ucheepines.org</a></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p><strong>Eden Valley Institute</strong><br />6263 North County Road 29<br />Loveland, CO 80538</p>
                  <p>(800) 637-9355<br /><a href="http://www.eden-valley.org/" title="Eden Valley Institute" target="_blank">www.eden-valley.org</a></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p><strong>Black Hills Health &amp; Education Center</strong><br />3815 Battle Creek Road<br />Hermosa, SD 57744</p>
                  <p>(800) 658-5433<br /><a href="http://www.bhhec.org/" title="Black Hills Health &amp; Education Center" target="_blank">www.bhhec.org</a></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p><strong>Living Springs Retreat</strong><br />1768 County Road 628<br />Roanoke, AL 36274</p>
                  <p>(256) 449-2628<br /><a href="http://www.livingspringsretreat.com/" title="Living Springs Retreat" target="_blank">www.livingspringsretreat.com</a></p>
                </td>
              </tr>
            </table>
          </div>
          <a class="close-modal close">&times;</a>
        </div>
      </form>
    </div><!--/.list-->
    <div class="sidebar right">
      <div class="bar">Request More Info</div>
      <p>We offer multiple NEWSTART&reg; Lifestyle Program locations throughout the United States. You may receive information from the programs listed <a data-reveal-id="locations">here</a>. The information you provide will be saved electronically and will not be shared with third parties.</p>
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
</div><!-- /.body -->
{embed="includes/_doc_bottom"}