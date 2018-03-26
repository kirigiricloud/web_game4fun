<?php

session_start();

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

input.hidden {
	background: transparent;
	border: none !important;
	font-size:0;
}

</style>
<body>
	<h1 style="text-align: center;">WELCOME TO GAME4FUN!</h1>
	<form style="text-align: center;" action="login_check.php"   method= "POST">
		<input type="radio" name="utype" value="Personal" <?php if($_SESSION["utype"] == "Personal") { echo "checked";}?>> Personal
		<input type="radio" name="utype" value="Business" <?php if($_SESSION["utype"] == "Business") { echo "checked";}?>> Business
		<input type="radio" name="utype" value="Admin" <?php if($_SESSION["utype"] == "Admin") { echo "checked";}?>> admin<br>
		User Name:<br>
		<input type="text" name="uname" maxlength="20 value= <?php echo $_SESSION["uname"];?> ">
		<br>
		Password:<br>
		<input type="password" name="psw" value="" maxlength="30">
		<br>
		<b style="color: red"><?php echo $_SESSION["rep"];
										$_SESSION["rep"] = " "; ?></b>
		<br>
		<input style="visibility: hidden; width: 0px;" type="submit"  value="Log in">	
		<button type="submit" formaction="register.php"  formmethod= "POST" formtarget="_blank">Register now</button>
		<input type="submit"  value="Log in">
		<input style="visibility: hidden; width: 0px;" type="submit"  value="Log in">	
	</form>


</body>
<footer>
	<p style="text-align: center;">All rights reserved by Game4Fun Group</p>
</footer>
</html>