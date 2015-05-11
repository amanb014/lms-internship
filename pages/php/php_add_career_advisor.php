<?php
	session_start();
	$mysqli = new mysqli('localhost', "aman", "atlanta12", "targetit");

	$f_name = $mysqli->real_escape_string($_POST["f_name"]);
	$l_name = $mysqli->real_escape_string($_POST["l_name"]);

	$phone1 = $mysqli->real_escape_string($_POST["phone1"]);

	$email1 = $mysqli->real_escape_string($_POST["email1"]);
	$county = (int)$_POST["county"];
	
	$desc = $mysqli->real_escape_string($_POST["desc"]);

	$insert = "INSERT INTO `targetit`.`career_advisors` 
	(`f_name`, `l_name`, `phone`, `county_id`, `email`, `desc`) VALUES 
	('$f_name', '$l_name', '$phone1', $county, '$email1', '$desc')";

	if($result = $mysqli->query($insert)) {
		$_SESSION["advisor_insert"] = true;
		header('Location: ../add_career_advisor.php');
	} else {
		$_SESSION["advisor_insert_fail"] = true;
		header('Location: ../add_career_advisor.php');
	}

?>