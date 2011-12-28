{embed="embeds/_doc-top" 
  channel="{channel}"
  section="{section}"
  title="Request More Information"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
<ul id="trail">
  <li><a href="/">Home</a></li>
  <li><a href="/{channel}">{section}</a></li>
</ul>
<div class="heading clearfix">
  <h1>Request More Information</h1>
</div>

<div class="grid23 clearfix">
  <div class="main left">
    <div id="entry">
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
            <td><textarea class="input" cols="36" rows="6" name="custom-message" onfocus="if(this.value=='Short description of your condition (optional)')this.value='';" onblur="if(this.value=='')this.value='Short description of your condition (optional)';">Short description of your condition (optional)</textarea></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>
              <div class="button-wrap">
                <button type="submit" class="super green button"><span>Send Request</span></button>
              </div>
              <p><a href="/{channel}/results">&laquo; Back to my results</a></p>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div class="sidebar right">
    <div class="bar">Request More Info</div>
    <p>We offer multiple NEWSTART&reg; Lifestyle Program locations throughout the United States. You may receive information from the programs listed <a data-reveal-id="locations">here</a>. The information you provide will be saved electronically and will not be shared with third parties.</p>
  </div><!--/.sidebar-->
</div><!--/.grid23-->
{embed="embeds/_doc-bottom"}