<?php 
// Turn off all error reporting
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<title>Send SMS for free</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class="wrapper">

<?php
if (isset($_POST['Submit']))
{
	$from = $_POST['from'];
	$number = trim($_POST['number']);
	$carrier = $_POST['carrier'];
	$to = $number.$carrier;
	$message = stripslashes($_POST['message']);

	$success = mail("$to", "SMS", "$message");

	if ($success)
	{
		echo '<div class="output1">SMS was successfully Send</div>';
	}
	else
	{
		echo '<div class="output2">ERROR: SMS was not send</div>';
	}
}
?>

<form id="sms" name="sms" method="post" action="index.php">

<table width="400">
  <tr>
    <td align="right" valign="top">From:</td>
    <td align="left"><input name="from" type="text" id="from" size="30" /></td>
  </tr>
  <tr>
    <td align="right" valign="top">To:</td>
    <td align="left"><input name="to" type="text" id="to" size="30" /></td>
  </tr>
  <tr>
    <td align="right" valign="top">Carrier:</td>
    <td align="left">
	<select name="carrier" id="carrier">
        <option value="@message.alltel.com">Alltel</option>
        <option value="@myboostmobile.com">Boost</option>
        <option value="@mobile.mycingular.com">Cingular</option>
        <option value="@messaging.nextel.com">Nextel</option>
        <option value="@tmomail.net">T-Mobile USA</option>
        <option value="@vtext.com">Verizon Wireless</option>
        <option value="@vmobl.com">Virgin Mobile USA</option>
    </select>
	</td>
  </tr>
  <tr>
    <td align="right" valign="top">Message:</td>
    <td align="left"><textarea name="message" cols="40" rows="5" id="message"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
</table>
</form>

</div>

</body>

</html>