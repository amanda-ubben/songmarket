<?php // header.php
session_start();
echo"<!DOCTYPE html>\n<html><head><script src='osc.js'></script>";
include 'functions.php';

$userstr = ' Guest';

if (isset($_SESSION['user']))
{
	$user		=$_SESSION['user'];
	$loggedin = TRUE;
	$userstr = " ($user)";
}
else $loggedin = FALSE;

echo "<header><title> $appname,$userstr</title><link rel='stylesheet'" .
	"href='css/main2.css' type='text/css' />" .
	"</head><body><div id='header'><div class='appname'>$appname,$userstr!</div>";

if($loggedin)
{
	echo "<img id='logo' alt='The Song Market' src='img/layout/TSMLogo.JPG' />" .
	     "<!--<br ><ul class='menu'>" .
	     "<li><a href='members.php?view=$user'>Home</a></li>" .
	     "<li><a href='members.php'>Members</a></li>" .
	     "<li><a href='viewall.php'>View All</a></li>" .
	     "<li><a href='friends.php'>Friends</a></li>" .
	     "<li><a href='booklist.php?view=$user'>Your List</a></li>" .
	     "<li><a href='profile.php'>Your Profile</a></li>" .
	     "<li><a href='logout.php'>Log Out</a></li>--!>";
}
else
{
	echo("<img id='logo' alt='The Song Market' src='img/layout/TSMLogo.JPG' />" .
	     "<!--<br /><ul class='menu'>" .
	     "<li><a href='index.php'>Home</a></li>" .
	     "<li><a href='signup.php'>Sign Up</a></li>" .
	     "<li><a href='login.php'>Log In</a></li>" .
	     "<li><a href='viewall.php'>View All</a></li>".
	     "<span class='info'>&#8658; You must be logged in to" .
	     "view this page.--!></span><br /><br /></div></header>");
}
?>
