<?php
include('../db/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav>
        <div class="navbar">
            <h3>Khumbila Resort</h3>
            <h3>Welcome Admin!</h3>
        </div>
    </nav>
    <header>
        <div class="header-links">
            <button><a href="" class="nav-link">Add rooms</a></button>
            <button><a href="" class="nav-link">Show All rooms</a></button>
            <button><a href="" class="nav-link">Add Users</a></button>
            <button><a href="index.php?showalluser" class="nav-link">Show All users</a></button>
            <button><a href="" class="nav-link">Bookings</a></button>
            <button><a href="" class="nav-link">Logout</a></button>
        </div>
    </header>
    <div class="container">
        <?php 
        if(isset($_GET['showalluser'])){
            include 'showalluser.php';
        }
        ?>
        
    </div>
</body>
</html>