<?

$timestamp = time();
$errmsg = '';

$dberror = $this->error();
$dberrno = $this->errno();

if($dberrno == 1114) {

?>
<html>
<head>
<title>Max Onlines Reached</title>
</head>
<body bgcolor="#FFFFFF">
<table cellpadding="0" cellspacing="0" border="0" width="600" align="center" height="85%">
  <tr align="center" valign="middle">
    <td>
    <table cellpadding="10" cellspacing="0" border="0" width="80%" align="center" style="font-family: Verdana, Tahoma; color: #666666; font-size: 9px">
    <tr>
      <td valign="middle" align="center" bgcolor="#EBEBEB">
        <br><b style="font-size: 10px">Website onlines reached the upper limit</b>
        <br><br><br>Sorry, the number of online visitors has reached the upper limit.
        <br>Please wait for someone else going offline or visit us in idle hours.
        <br><br>
      </td>
    </tr>
    </table>
    </td>
  </tr>
</table>
</body>
</html>
<?

	function_exists('dexit') ? dexit() : exit();

} else {

	if($message) {
		$errmsg = "<b>BTList! info</b>: $message\n\n";
	}
	if($sql) {
		$errmsg .= "<b>SQL</b>: ".htmlspecialchars($sql)."\n";
	}
	$errmsg .= "<b>Error</b>:  $dberror\n";
	$errmsg .= "<b>Errno.</b>:  $dberrno";

	echo "</table></table></table></table></table>\n";
	echo "<p style=\"font-family: Verdana, Tahoma; font-size: 11px; background: #FFFFFF;\">";
	echo nl2br($errmsg);
	echo '</p>';
	function_exists('dexit') ? dexit() : exit();
}

?>