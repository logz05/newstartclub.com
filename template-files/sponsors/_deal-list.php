{if segment_3 == "delete" && segment_4}
	{exp:delete:delete_entry 
		entry_id="{segment_4}" 
		error_no_permissions='<div class="alert-box error"><p>You're not allowed to delete this deal.</p></div>' 
		error_invalid_content='<div class="alert-box warning"><p>It seems that this deal has been already deleted.</p></div>' 
		message_success='<div class="alert-box success"><p>Deal successfully deleted!</p></div>'
	}
{/if}

{exp:channel:entries channel="deals" sort="desc" orderby="edit_date" paginate="bottom" limit="20" show_future_entries="yes" show_expired="no" category="{embed:sponsor_number}" dynamic="no"}
{if no_results}<p>You don&rsquo;t have any active deals. Click <a href="{path='sponsors/add-deal'}">here</a> to add a new deal.</p>{/if}

{if count == 1}
	<ul class="listing entries">
{/if}
	<li>
		<h2>{title}</h2>
		<div class="edit-entry">
			<a href="{path='sponsors/edit-deal/{entry_id}'}" title="Edit &ldquo;{title}&rdquo;"><i class="icon after" data-icon="s"></i></a>
			<a href="{path='sponsors/edit-deals/delete/{entry_id}'}" title="Delete&hellip;" onclick="javascript: if (!confirm('Are you sure you want to delete the deal below? \n\n \u201C{title}\u201D \n\n You can\u2019t undo this action. Click OK to delete.')) return false;"><i class="icon after" data-icon="C"></i></a>
		</div>
		<div class="details">
			<dl>
				<dt>Deal URL</dt>
				<dd><a href="{path='deal/{entry_id}'}" target="_blank">{path='deal/{entry_id}'}</a></dd>
				
				<dt>Coupon Code</dt>
				<dd>{deal_code}</dd>
				
				<dt>Instructions</dt>
				<dd>{deal_instructions}</dd>
				
				<dt>Dates</dt>
				<dd>Valid from {entry_date format="%F %j%S, %Y"}{if expiration_date} to {expiration_date format="%F %j%S, %Y"}{/if}</dd>
				
				<dt>Terms</dt>
				<dd>{deal_terms}</dd>
				
				<dt>Categories</dt>
				<dd>
					<p>{categories backspace="2" show_group="45"}{category_name}, {/categories}</p>
				</dd>
			</dl>
		</div>
	</li>
{if count == total_results}
	</ul>
{/if}
{/exp:channel:entries}