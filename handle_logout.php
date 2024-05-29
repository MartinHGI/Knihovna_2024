<?php

session_start();

$_SESSION["username"] = null;
$_SESSION["type"] = null;
$_SESSION["password"] = null;

header("Location: index.php");

?>