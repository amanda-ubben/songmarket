<?php // index.php
include_once 'header.php';
$error = $firstName = $lastName = $email ="";
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
			die("<h4>Thank you for you joining our interest list.</h4>Please check back soon.<br /><br />");
		}
	}
if ($loggedin) echo " $user, you are logged in.";

?>

<br /><span class='main'>
  <section id='welcome'>
	<h1>Welcome to the premier stage for showcasing your ability to predict music success!</h1>
    <h1>Do you have what it takes to become a master song trader?</h1>
    <h2>Coming Soon!</h2>
    </section>
    <div id='images'>
    <article id="crowd">
    	<img alt="crowds" src="img/content/crowd.png" />
     </article>
      <article id="arrow">
        <img  alt="stock arrow" src="img/content/arrow.png" />
       </article>
       <article id="trophy">
         <img  alt="trophy" src="img/content/trophy.png" />
    </article>
    </div>
    <div id='text'>
    <section id='crowdinfo' class='textbox'>
    	<p>Compete against your friends by joining or creating a Crowd. </p>
    </section>
    <section id='gameinfo' class='textbox'>
        <p>Find the next hit songs and then use the simulated currency to buy low and sell high. Profit is the goal!</p>
        </section>
        <section id='winninginfo' class='textbox'>
        <p>Accumulate the highest profit margins to win your Crowd! </p>
    </section>
  </div>


<div class="form"><center><form method='post' action='interest.php'>$error
<div class="row"><span class='fieldname'>First Name: </span>
<span class='formw'><input type='text' maxlength='16' name='firstName'/></span></div><br />
<div class='row'><span class='fieldname'>Last Name: </span>
<span class='formw'><input type='text' maxlength='16' name='lastName'/></div><br />
<div class='row'><span class='fieldname'>Email: </span>
<span class='formw'><input type='text' maxlength='100' name='email'/></span></div><br />



<span class='fieldname'>&nbsp;</span>
<div class='formw'><input type='submit' value='Sign Up' /></div>
</form></center></div></div><br /> <footer>
  <p>Copyright 2014 by The Song Market</p>
  <p>Contact information: <a href="mailto:thesongmarket@gmail.com">
  thesongmarket@gmail.com</a>.</p>
</footer> </div></body></html>
