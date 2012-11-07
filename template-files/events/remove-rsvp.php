{exp:delete:delete_entry entry_id="{segment_3}"}
{if segment_1 == ""}
<?php

header("HTTP/1.1 301 Moved Permanently");
header("Location: /");
exit();

?>
{if:else}
<?php

header("HTTP/1.1 301 Moved Permanently");
header("Location: /{exp:page_history:get page='1'}");
exit();

?>
{/if}