<?php
session_start();
include "include/database.php";

$obj = new Database();

// Set session message
$_SESSION['incorrect'] = "You have been logged out.";

// Destroy the session
session_unset();
session_destroy();

// Redirect to the login page
header("location: login.php");
exit();
