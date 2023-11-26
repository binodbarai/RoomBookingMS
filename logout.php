<?php
session_start(); 
session_destroy();


// Redirect the user to the index page
header("Location: index.php");
exit;
?>