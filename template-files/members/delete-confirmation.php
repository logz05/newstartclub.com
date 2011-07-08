<?php 

if (isset($_POST['reason']))
{
$reason = $_POST['reason'];

$subject = "Account Deleted Feedback";

$message = 'Message: ';
$message .= nl2br($reason);

$headers  = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
$headers .= 'From: club@newstart.com' . "\r\n";

mail("club@newstart.com, cblood@weimar.org", stripslashes($subject), stripslashes($message), $headers);
}

?>

{embed="includes/_doc-top"
	title="Account Deleted"
	header="no"
	nav="no"
}
<div class="body">
<?php if (isset($_POST['reason'])) { ?>
	<h1>Thanks!</h1>
	<h3>Your feedback is appreciated!</h3>
	<script type="text/javascript">
		setTimeout("location.href = '{site_url}';", 2000);
	</script>
<?php } else { ?>
	<h1>Account Deleted</h1>  
	<h3>Could you let us know what we did wrong? Your feedback will really help us improve the {site_name}.</h3>
	<form action="" method="post">
		<table>
			<tr>
				<th scope="row"></th>
				<td><textarea name="reason" class="input" cols="60" rows="5"></textarea></td>
			</tr>
			<tr>
				<th scope="row"></th>
				<td>
					<div class="button-wrap clearafter">
						<button type="submit" class="super green button"><span>Send</span></button>
					</div>
				</td>
			</tr>
		</table>
	</form>
<?php } ?>
</div><!-- /.body -->
{embed="includes/_doc_bottom" standalone="yes"}