<?php

session_start();

$_SESSION["rep"] = " ";
$_SESSION["utype"] = "Personal";
$_SESSION["uname"] = " ";
$_SESSION["upsw"] = " ";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<style>
h1 {
	color: blue;
	font-family: verdana;
	font-size: 300%;
}
</style>
<body>
	<h1 style="text-align: center;">WELCOME TO GAME4FUN!</h1>
	<form style="text-align: center;" action="login_check.php"   method= "POST">
		<input type="radio" name="utype" value="Personal" checked> Personal
		<input type="radio" name="utype" value="Business"> Business
		<input type="radio" name="utype" value="Admin"> admin<br>
		User Name:<br>
		<input type="text" name="uname" value="" maxlength="20">
		<br>
		Password:<br>
		<input type="password" name="psw" value="" maxlength="30">
		<br>
		<br>
		<input style="visibility: hidden; width: 0px;" type="submit"  value="Log in">	
		<button type="submit" formaction="register.php"  formmethod= "POST" formtarget="_blank">Register now</button>
		<input type="submit" value="Log in">
		<input style="visibility: hidden; width: 0px;" type="submit"  value="Log in">		
	</form>

</body>

<footer>
	<p style="text-align: center;">All rights reserved by Game4Fun Group</p>
</footer>
</html>