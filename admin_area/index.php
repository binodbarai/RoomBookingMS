<?php
include('../db/connection.php');
session_start();
if(!isset($_SESSION['userLoggedIn'])){
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
            <a href="addrooms.php" class="nav-link"><button>Add rooms</button></a>
            <a href="index.php?showrooms" class="nav-link"><button>Show all rooms</button></a>
            <a href="index.php?showalluser" class="nav-link"><button>Show all users</button></a>
            <a href="index.php?gallery" class="nav-link"><button>Gallery</button></a>
            <a href="index.php?bookings" class="nav-link"><button>Bookings</button></a>
            <a href="logout.php" class="nav-link"><button>Logout</button></a>
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
        if(isset($_GET['bookings'])){
            include 'bookings.php';
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
    <style>
        #datatableid{
            padding-top:20px !important;
            border:0px;
        }
    </style>
</body>
</html>