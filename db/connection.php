<?php
    // Create a connection object
    $conn = new mysqli('localhost', 'root', '', 'roombooking');
    
    // Check for connection errors
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>