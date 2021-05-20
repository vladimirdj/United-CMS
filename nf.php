<?php
session_start();
unset($_SESSION["user"]);
if (!isset($_SESSION)) { session_start(); }
$_SESSION = array();
session_destroy();
header("Location: index.php");
?>
