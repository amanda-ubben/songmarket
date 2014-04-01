<?php // index.php
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterInterest())
   {
        $fgmembersite->RedirectToURL("thank-you-interest.html");
   }
}

?>

<!DOCTYPE html><html><head></script>
<title>The Song Market - Home</title>
<link rel='stylesheet' href='css/main2.css' type='text/css' />
<link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
<script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>

<header>
<div id='header'>
<div class='appname'>
<?php
if ($fgmembersite->CheckLogin())
{
  echo "Welcome, " . $fgmembersite->UserFullName() . "<br/>";
  echo "<a href='logout.php'>Logout</a></div>";
}
else
{
  echo "<a href='login.php'>Login</a><br/>";
  echo "<a href='register.php'>Register</a><br/></div>";
}
?>

<img id='logo' alt='The Song Market' src='img/layout/TSMLogo.JPG' />
</div>
</header>
<br />


<span class='main'>
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
</span>

<center>
<div id='fg_membersite'>
  <form id='interest' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
    <fieldset >
    <legend>Interest</legend>

    <input type='hidden' name='submitted' id='submitted' value='1'/>

    <div class='short_explanation'>* required fields</div>
    <input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

    <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
    <div class='container'>
        <label for='name' >Your Full Name*: </label><br/>
        <input type='text' name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name') ?>' maxlength="50" /><br/>
        <span id='register_name_errorloc' class='error'></span>
    </div>
    <div class='container'>
        <label for='email' >Email Address*:</label><br/>
        <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
        <span id='register_email_errorloc' class='error'></span>
    </div>

    <div class='container'>
        <input type='submit' name='Submit' value='Submit' />
    </div>

    </fieldset>
  </form>
</div>
</center>
<br />

<footer>
  <p>Copyright 2014 by The Song Market</p>
  <p>Contact information: <a href="mailto:thesongmarket@gmail.com">
  thesongmarket@gmail.com</a>.</p>
</footer>

<script type='text/javascript'>
// <![CDATA[
    var frmvalidator  = new Validator("interest");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");
// ]]>
</script>

</body>
</html>
