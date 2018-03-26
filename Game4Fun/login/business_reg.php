<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Business User register Page</title>
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
	<form style="text-align: center;" action="b_add.php" method= "POST" target="_self">
		<caption>Business user regeister</caption>
		<span>(<span style="color: red">*</span> part must be filled)</span><br>
		<span style="color: red">*</span>
		Email:<br>
		<input type="email" name="email" value="" required>
		<br>
		<span style="color: red">*</span>
		User Name(less than 20 character):<br>
		<input type="text" name="uname" value="" maxlength="20" required>
		<br>
		<span style="color: red">*</span>
		Password(less than 30 character):<br>
		<input type="text" name="psw" value="" maxlength="30" required>
		<br>
		Official site:<br>
		<input type="url" name="officialSite" value=" ">
		<br>
		<span style="color: red">*</span>
		Notification:<br>
		<input type="radio" name="notif" value="1"> Yes
		<input type="radio" name="notif" value="0" checked> No<br>
		<b style="color: red"><?php echo $_SESSION["rep"];
										$_SESSION["rep"] = " "; ?></b>
		<br>
		<input type="submit" value="Register now">	
	</form>

</body>
</html>