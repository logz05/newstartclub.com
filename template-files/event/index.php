<?php

{exp:channel:entries channel="events" entry_id="{segment_2}" show_future_entries="yes"}

header("Location: /events/detail/{url_title}"); /* Redirect browser */

exit;
{/exp:channel:entries}

?>