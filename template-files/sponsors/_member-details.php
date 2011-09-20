{exp:user:users limit="1" orderby="join_date" sort="asc" dynamic_parameters="yes" member_id="{embed:member_id}"}
  <li class="row">
    <h1 class="username">{username}</h1>
    <div class="date">
      <span class="timeago"><?php echo distanceOfTimeInWords('{join_date}', '{current_time}', true); ?></span>
      <span class="join-date">{join_date format="%D, %M %j, %Y  %g:%i%a %T"}</span>
    </div>
    <div class="details">
      <p><?php echo ucwords(strtolower("{firstName} {lastName}")); ?><br />
      {if address != ""}<?php echo ucwords("{address}"); ?><br />
      {/if}{if city != ""}<?php echo ucwords(strtolower("{city}")); ?>,{/if}{if state != "--"} {state}{/if} {zipCode}</p>
      {if phone != ""}<p>Phone: {phone}</p>{/if}
      {if memberScoreTotal}<p>Health Score: {memberScoreTotal}</p>{/if}
      {if logged_in_group_id == "1"}
        <div class="admin_info">
          <p><strong>Admin Information</strong></p>
          <p>
            <strong>Member ID:</strong> {member_id}{if group_id == "1"} <em>Administrator</em>{/if}{if group_id == "13"} <em>Club Sponsor</em>{/if}<br />
            {if sponsor_number_credit != ''}<strong>Sponsor Credit:</strong> 
            {exp:weblog:categories category_group="24" weblog="locations" show="{sponsor_number_credit}" style="linear"}
              {category_name}, {category_id}
            {/exp:weblog:categories}<br />{/if}
            <strong>In this list because of:</strong> 
            {if sponsor_number_credit == '{embed:sponsor_number}'}matching sponsor number{/if}
            {if zipCode == '{embed:sponsor_zipcode}'}matching zip code{/if}<br />
            <strong>Interests:</strong>
            {categories group_id="14|15|16" backspace="2"}
            {category_body}{category_name}, {/category_body}
            {/categories}
          </p>
        </div>
      {/if}
    </div>
  </li>
  
  {paginate}
    {if "{total_pages}" > 1}
      <li class="pagination">
        <p>{pagination_links}</p>
      </li>
    {/if}
  {/paginate}
{/exp:user:users}