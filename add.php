<?php // add.php
/*
 * The Ulitmate Booklist
 * 
 * This page will add the title and author of a book to the user's booklist.
 * 
 * By: Amanda Ubben
 */

include_once 'header.php';

if(!$loggedin) die();
echo "<div class='main'><h3>Add a Book</h3>";
$error = $title = $authorfirstname = $authorlastname = "";

if (isset($_POST['title']))
{
	// Clean up the text input
	$title = sanitizeString($_POST['title']);
	$authorfirstname = sanitizeString($_POST['authorfirstname']);
	$authorlastname = sanitizeString($_POST['authorlastname']);
	
	// Make sure all fields were entered
	if($title == "" || $authorfirstname == "" || $authorlastname == "")
		$error = "not all fields were entered<br /><br />";

	// Insert the values into the database	
	else
	{
		queryMysql("INSERT INTO booklist VALUES('$user','$title','$authorfirstname','$authorlastname')");
		die("<h4>Book added</h4><a href='booklist.php?view='$user'>Return to your booklist</a><br /<br />");
	}
}

// Generate the input form
echo <<<_END
<form method='post' action='add.php'>$error
<span class='fieldname'>Title</span>
<input type='text' maxlength='200' name='title' value='$title'/><span id='info'></span><br />
<span class='fieldname'>Author's Firstname</span><input type='text' maxlength='50' name='authorfirstname' value='$authorfirstname' /><br />
<span class='fieldname'>Author's Lastname</span>
<input type='text' maxlength='50' name='authorlastname' value='$authorlastname' /><br />
_END;

?>

<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Add' />
</form></div></body></html>
