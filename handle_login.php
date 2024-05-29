<?php
	require './DBC.php';

	session_start();

	if (empty($_POST["username"]) || empty($_POST["password"]))
	{
		header("Location: index.php");
		exit();
	}

	$username = $_POST["username"];
	//$type = $_POST["type"];
	$password = $_POST["password"];


	$hash = '$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a';


	if (password_verify($password, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

	$query = DBC::getConnection()->query("select username, type ,  password from users where username = '" . $_POST["username"] . "' and password = '" . $_POST["password"] . "';");

	$result = $query->fetch(PDO::FETCH_ASSOC);
	

	if ($query->num_rows <= 0)
	{
		die("Unknown user");
	}

	$_SESSION["username"] = $username;
	$_SESSION["type"] = $result["type"];
	$_SESSION["password"] = $password;
	

	header("Location: Page01.php");
?>