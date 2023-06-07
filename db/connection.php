<?php
    // Create a connection object
    $conn = mysqli_connect('localhost','root','','roombooking');
    
    // Check for connection errors
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>