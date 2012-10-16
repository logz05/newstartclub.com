{if segment_2 == "1562"}

	{exp:channel:entries channel="events" entry_id="898" show_future_entries="yes"}
	
		<?php
		
		header("Location: /events/detail/{url_title}"); /* Redirect browser */
		
		exit;
		
		?>
		
	{/exp:channel:entries}

{/if}

{exp:channel:entries channel="events" entry_id="{segment_2}" show_future_entries="yes"}

	<?php
	
	header("Location: /events/detail/{url_title}"); /* Redirect browser */
	
	exit;
	
	?>
	
{/exp:channel:entries}