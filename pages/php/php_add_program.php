<?php
	session_start();
	$mysqli = new mysqli('localhost', "aman", "atlanta12", "targetit");

	// if ($mysqli->connect_errno) {
	//     echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	// }

	$program = $mysqli->real_escape_string($_POST["program_name"]);
	$abbr = $mysqli->real_escape_string($_POST["abbr"]);

	$query = "INSERT INTO `programs` (`program_abbr`, `program_name`) VALUES (\"$abbr\", \"$program\")";

	if($result = $mysqli->query($query)) {
		$_SESSION["program_insert"] = true;
		header('Location: ../add_new_program.php');
	} else {
		$_SESSION["program_insert_fail"] = true;
		header('Location: ../add_new_program.php');
	}

?>