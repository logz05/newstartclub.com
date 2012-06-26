<?php

{exp:weblog:entries weblog="events" entry_id="{segment_2}" show_future_entries="yes"}

header("Location: /events/detail/{url_title}"); /* Redirect browser */

exit;
{/exp:weblog:entries}

?>