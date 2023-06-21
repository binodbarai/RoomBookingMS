<?php
include('../db/connection.php');
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css    ">
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
            <button><a href="addrooms.php" class="nav-link">Add rooms</a></button>
            <button><a href="index.php?showrooms" class="nav-link">Show All rooms</a></button>
            <button><a href="index.php?showalluser" class="nav-link">Show All users</a></button>
            <button><a href="index.php?gallery" class="nav-link">Gallery</a></button>
            <button><a href="" class="nav-link">Bookings</a></button>
            <button><a href="logout.php" class="nav-link">Logout</a></button>
        </div>
    </header>
    <div class="container">
        <?php 
        if(isset($_GET['showalluser'])){
            include 'showalluser.php';
        }
        if(isset($_GET['showrooms'])){
            include 'showallrooms.php';
        }
        if(isset($_GET['gallery'])){
            include 'gallery.php';
        }
        ?>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatableid').DataTable();
        });
    </script>
</body>
</html>