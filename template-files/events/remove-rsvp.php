{exp:delete:delete_entry entry_id="{segment_3}"}

<?php

header("HTTP/1.1 301 Moved Permanently");
header("Location: http://newstartclub.com/{exp:page_history:get page='1'}");
exit();

?>