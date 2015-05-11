<?php
	session_start();
	$mysqli = new mysqli('localhost', "aman", "atlanta12", "targetit");

	$f_name = $mysqli->real_escape_string($_POST["f_name"]);
	$l_name = $mysqli->real_escape_string($_POST["l_name"]);
	$nick = $mysqli->real_escape_string($_POST["nick"]);

	$addr1 = $mysqli->real_escape_string($_POST["addr1"]);
	$addr2 = $mysqli->real_escape_string($_POST["addr2"]);
	$city = $mysqli->real_escape_string($_POST["city"]);
	$zip = $mysqli->real_escape_string($_POST["zip"]);
	$state = $mysqli->real_escape_string($_POST["state"]);

	$phone1 = $mysqli->real_escape_string($_POST["phone1"]);
	$phone2 = $mysqli->real_escape_string($_POST["phone2"]);

	$email1 = $mysqli->real_escape_string($_POST["email1"]);
	$email2 = $mysqli->real_escape_string($_POST["email2"]);

	$insert = "INSERT INTO `instructors`
	(`f_name`, `l_name`, `nick`, `address_1`, `address_2`, `city`, `state`, `zip`, `phone1`, `phone2`, `email1`, `email2`) VALUES 
	('$f_name', '$l_name', '$nick', '$addr1', '$addr2', '$city', '$state', '$zip', '$phone1', '$phone2', '$email1', '$email2');";

	if($result = $mysqli->query($insert)) {
		$_SESSION["instructor_insert"] = true;
		header('Location: ../add_instructor.php');
	} else {
		$_SESSION["instructor_insert_fail"] = true;
		header('Location: ../add_instructor.php');
	}

?>