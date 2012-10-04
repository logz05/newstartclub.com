{exp:user:users limit="1" sort="asc" dynamic_parameters="yes" member_id="{embed:member_id}"}
	<li class="row">
		<h1 class="username">{username}</h1>
		<div class="date">
			<span class="timeago"><?php echo distanceOfTimeInWords('{join_date}', '{current_time}', true); ?></span>
			<span class="join-date">{join_date format="%D, %M %j, %Y	%g:%i%a %T"}</span>
		</div>
		<div class="details">
			<p><?php echo ucwords(strtolower("{member_first_name} {member_last_name}")); ?><br />
			{if address != ""}<?php echo ucwords("{address}"); ?><br />
			{/if}{if city != ""}<?php echo ucwords(strtolower("{city}")); ?>,{/if}{if state != "--"} {state}{/if} {zipCode}</p>
			{if phone != ""}<p><strong>Phone:</strong> {phone}</p>{/if}
			{if member_score_total}<p><strong>Health Score:</strong> {member_score_total}</p>{/if}
			{if logged_in_group_id == "1"}
				<div class="admin_info">
					<h5>Admin Information</h5>
					<p>
						<strong>Member ID:</strong> {member_id}{if group_id == "1"} <em>Administrator</em>{/if}{if group_id == "13"} <em>Club Sponsor</em>{/if}<br />
						{if promo_code}<strong>Promo Code:</strong> 
						{exp:channel:categories category_group="24" weblog="locations" show="{promo_code}" style="linear"}
							{category_name}, {category_id}
						{/exp:channel:categories}<br />{/if}
						<strong>In this list because of:</strong> 
						{if promo_code == '{embed:promo_code}'}Matching Promo Code{/if}
						{if zipCode == '{embed:sponsor_zip}'}Matching Zip Code{/if}<br />
					</p>
				</div>
			{/if}
		</div>
	</li>
{/exp:user:users}