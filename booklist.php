<?php //booklist.php
/*
 * The Ultimate Booklist
 *
 * This page displays the user's booklist.
 * 
 * By: Amanda Ubben
 */
include_once 'header.php';
if (!$loggedin) die();
echo "<div class='main'>";

// Find out who's booklist to view
if (isset($_GET['view']))
{
	$view = sanitizeString($_GET['view']);
	
	if ($view == $user) $name = "Your";
	else $name = "$view's";
	echo "<h3>$name Booklist</h3>";
}

// Retrieve the books in the booklist from the database
$booklist=array();
$result = queryMysql("SELECT title FROM booklist WHERE user='$user'");
$num = mysql_num_rows($result);
for ($j = 0; $j < $num; ++$j)
{
	$row = mysql_fetch_row($result);
	$booklist[$j] = $row[0];
}

// Display the books
if (sizeof($booklist))
{
	foreach($booklist as $book)
		echo "<li>$book";
	echo "</ul>";
}

?>
<a href='add.php'>Add A Book</a>
</div></body></html>
