<?php // interest.php
include_once 'header.php';

echo <<<_END
<script>
function ajaxRequest()
{
	try { var request = new XMLHttpRequest() }
	catch(e1) {
		try { request = new ActiveXObject("msxml2.XMLHTTP") }
	catch(e2) {
		try { request = new ActiveXObject("Microsoft.XMLHTTP") }
	catch(e3) {
		request = false
	} } }
	return request
}
</script>
<div class='main'><h3>Sign up for launch information!</h3>
_END;

$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();

if (isset($_POST['user']))
{
	$firstName = sanitizeString($_POST['firstName']);
	$lastName = sanitizeString($_POST['lastName']);
	$email = sanitizeString($_POST['email']);
	if ($firstName =="" || $lastName == "" || $email == "")
		$error = "Not all fields were entered<br /><br />";
		else
		{
			queryMysql("INSERT INTO interest VALUES('$firstName', '$lastName', '$email')");
			die("<h4>Account created</h4>Please log in.<br /><br />");
		}
	}


echo <<<_END
<form method='post' action='interest.php'>$error
<span class='fieldname'>First Name</span>
<input type='text' maxlength='16' name='firstName' vlaue='$firstName' /><span id='info'></span><br />
<span class='fieldname'>Last Name</span>
<input type='text' maxlength='16' name='lastName' value='$lastName' /><br />
<span class='fieldname'>Email</span>
<input type='text' maxlength='100' name='email' value='$email' />
<br />

_END;
?>

<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Sign Up' />
</form></div><br /></body></html>
