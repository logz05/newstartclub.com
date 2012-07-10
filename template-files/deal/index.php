<?php

{exp:weblog:entries weblog="deals" entry_id="{segment_2}" style="linear" show_expired="yes"}

header("Location: /deals/coupon/{url_title}"); /* Redirect browser */

exit;
{/exp:weblog:entries}

?>