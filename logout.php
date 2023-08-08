<?php
session_start(); 
session_destroy();
//closing the connection
mysqli_close($conn);

// Redirect the user to the index page
header("Location: index.php");
exit;
?>