<?php
	include("../mysqli_connect.php");

	session_start();

	$email = $_POST["email"];
	$uname = $_POST["uname"];
	$psw = $_POST["psw"];
	$officialSite = $_POST["officialSite"];
	$notif = $_POST["notif"];

	$sql = "SELECT * FROM businessuser WHERE userName = '".$uname."'";
	$result = mysqli_query($conn, $sql);

	$_SESSION["rep"] = "";

	if ($result->num_rows > 0) {
    	// duplicate username
		$_SESSION["rep"] = "plz using other user name";
	} else {

		$res = mysqli_query($conn, "SELECT userID from businessuser ORDER BY userID DESC LIMIT 1");
		$row = mysqli_fetch_array($res);
		$userID = $row["userID"] + 1;

		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO businessuser (userID, userName, password, mail, notification, officialSite) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("isssis", $userID, $uname, $psw, $email, $notif, $officialSite);

		if ($stmt->execute()) {
			//insert fail
			$_SESSION["rep"] = "register success, try log in";
			header("Location: login_next.php");
			exit;

		} else {
			//insert fail
			$_SESSION["rep"] = "register fail, plz try again";
		}

	}

	mysqli_close($conn);

	header("Location: business_reg.php");
	exit;

	?>