<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<link rel="stylesheet" href="css/main2.css" />
</head>

<body>
	<div id='wrapper'>
	<div id="head">
	<header>
        <img id="logo" alt="The Song Market" src="img/TSMLogo.JPG" />
        <img id="logo" alt="The Song Market" src="img/TSMLogo.JPG" />
	<!--/*<nav id="mainNav">
		<ul>
    		<li><a href="#">Home</a></li>
        	<li><a href="#">Portfolio</a></li>
        	<li><a href="#">Crowds</a></li>
        	<li><a href="#">Rankings</a></li>
        	<li><a href="#">Charts</a></li>
    	</ul>
	</nav>*/-->
    
    <div id="tfheader">
		<form id="tfnewsearch" method="get" action="http://www.google.com">
		        <input type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
		</form>
	<div class="tfclear"></div>
	</div>
    <div id="login">
    	<?php
         echo <<<_END
    	<form id="cred" method="post" action="formtest.php">
        	<input type="text" class="loginput" name="user" size="10" maxlength="20" value="Username"/><input type="text" class="loginput" name="pass" size="10" maxlength="15" value="Password"/><input type="submit" value="Log in" class="loginbtn"/><input type="submit" value="Sign up" class="signupbtn"/>
        </form>
        _END;
        ?>
     </div>
   </header>
   </div>
  <section id='welcome'>
	<h1>Welcome to the premier stage for showcasing your intuition for predicting music success.</h1>
    <h1>Do you have what it takes to become a master song trader?</h1>
    <h2>Coming Soon!</h2>
    </section>
    <div id='images'>
    <article id="crowd">
    	<img alt="crowds" src="img/crowd.png" />
     </article>
      <article id="arrow">
        <img  alt="stock arrow" src="img/arrow.png" />
       </article>
       <article id="trophy">
         <img  alt="trophy" src="img/trophy.png" />
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
  <footer>
  <p>Copyright 2014 by The Song Market</p>
  <p>Contact information: <a href="mailto:thesongmarket@gmail.com">
  thesongmarket@gmail.com</a>.</p>
</footer> 
</body>
</html>



