<?php
	require './DBC.php';

	session_start();

	if (empty($_POST["username"]) || empty($_POST["password"]))
	{
		header("Location: index.php");
		exit();
	}

	$username = $_POST["username"];
	$type = 'BUser';
	$password = $_POST["password"];

	$hash = password_hash($_POST["password"],PASSWORD_DEFAULT);


	echo password_hash($password, PASSWORD_DEFAULT);



	$query = DBC::getConnection()->query("insert into users (username, type,  password) values ('" . $_POST["username"] . "', '" .$type."' ,'" . $hash . "');");

	$_SESSION["username"] = $username;
	$_SESSION["type"] = $type;
	$_SESSION["password"] = $password;

	header("Location: Page01.php");
?>