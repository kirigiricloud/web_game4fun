<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Personal User update Page</title>
</head>
<style>
</style>
<body>
	<form style="text-align: left;" action="p_update.php" method= "POST" target="_self">
		<caption>Personal user information</caption>
		<span>(<span style="color: red">*</span> part must be filled)</span><br>
		<span style="color: red">*</span>
		Email:<br>
		<input type="email" name="email" value=<?php echo $_SESSION["uemail"];?> required>
		<br>
		<span style="color: red">*</span>
		User Name(less than 20 character):<br>
		<input type="text" name="uname" value=<?php echo $_SESSION["uname"];?> maxlength="20" required>
		<br>
		<span style="color: red">*</span>
		Password(less than 30 character):<br>
		<input type="text" name="psw" value=<?php echo $_SESSION["upsw"];?> maxlength="30" required>
		<br>
		Gender:<br>
		<input type="radio" name="gender" value="Male" <?php if($_SESSION["ugender"] == "Male") { echo "checked";}?>> Male
		<input type="radio" name="gender" value="Female" <?php if($_SESSION["ugender"] == "Female") { echo "checked";}?>> Female<br>
		Age:<br>
		<input type="number" name="age" value=<?php echo $_SESSION["uage"];?> min="0" max="100">
		<br>
		Country:<br>
		<input type="text" name="country" maxlength="20" value=<?php echo $_SESSION["ucountry"];?>>
		<br>
		<span style="color: red">*</span>
		Notification:<br>
		<input type="radio" name="notif" value="1" <?php if($_SESSION["unotif"] == "1") { echo "checked";}?>> Yes
		<input type="radio" name="notif" value="0" <?php if($_SESSION["unotif"] == "0") { echo "checked";}?>> No
		<br>
		<b style="color: red"><?php echo $_SESSION["rep"];
										$_SESSION["rep"] = " "; ?></b>
		<br>
		<input type="reset" value="rest to previous">
		<input type="submit" value="update">	
	</form>

</body>
</html>