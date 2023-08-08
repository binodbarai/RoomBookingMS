<?php
include '../db/connection.php';

session_start(); 
session_destroy();

mysqli_close($conn);

// Redirect the user to the index page
header("Location: index.php");
exit;
?>