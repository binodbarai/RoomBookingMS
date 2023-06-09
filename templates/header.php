
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/script.js"></script>
</head>
<body>
    <!-- header section starts -->
    <header>
        <ul>
            <div class="header-description">
                <li><img class= "header-icons" src="./images/icons/phone-call.png" alt="#"></li>
                <li>01-4470617</li>
            </div>
            <div class="vertical"></div>
            <div class="header-description">
                <li><img class= "header-icons" src="./images/icons/email.png" alt="#"></li>
                <li>khumbilahotel@gmail.com</li>
            </div>
            <div class="vertical"></div>
            <div class="header-description">
                <li><img class= "header-icons" src="./images/icons/location.png" alt="#"></li>
                <li>Kulekhani, Makwanpur</li>
            </div>
        </ul>
    </header>

    <!-- Navigation bar -->
    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><img src="./images/icons/resort.png" alt=""><a href="index.php">Khumbila Hotel</a></div>
            <ul class="menu">
                <li><a class="nav-buttons"href="index.php?userid=<?php  if(isset($_SESSION['id'])){echo $_SESSION['id'];}?>">Home</a></li>
                <li><div class="nav-vertical"></div></li>
                <li><a class="nav-buttons"href="index.php?userid=<?php  if(isset($_SESSION['id'])){echo $_SESSION['id'];}?>#about">About</a></li>
                <li><div class="nav-vertical"></div></li>
                <li><a class="nav-buttons"href="index.php?userid=<?php  if(isset($_SESSION['id'])){echo $_SESSION['id'];}?>#rooms">Rooms</a></li>
                <li><div class="nav-vertical"></div></li>
                <li><a class="nav-buttons"href="index.php?userid=<?php  if(isset($_SESSION['id'])){echo $_SESSION['id'];}?>#gallery">Gallery</a></li>
                <?php
                 
                    if(isset($_SESSION['email'])){
                        if(isset($_SESSION['id'])){
                        echo '
                        <li><div><img width="35px" src="./images/icons/profile.png" alt="" onclick="toggleMenu()"></div></li>
                        <li><a href="../project/yourbookings.php?userid='.$_SESSION['id'].'" class="green-button">Your Bookings</a></li>';
                        }
                        else{
                            echo '<li><div><button id="login-button" onclick="toggleLogin()" class="green-button">Login</button></div></li>
                            <li><a href="../project/rooms.php" class="green-button">Book now</a></li>';
                        }
                    }
                    else{
                        echo '<li><div><button id="login-button" onclick="toggleLogin()" class="green-button">Login</button></div></li>
                        <li><a href="../project/rooms.php" class="green-button">Book now</a></li>';
                    }
                ?>
                
                
            </ul>
        </div>
        <?php
            include 'login.php';
        ?>
        
        <?php if(isset($_SESSION['id'])){?>
            <?php 
            include 'db/connection.php';
            $userid = $_SESSION['id'];
            $query = "SELECT * FROM user_tbl WHERE id=$userid";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            
            ?>

            <div class="profile-menu-wrap">
                <div class="profile-menu">
                    <div class="user-info">
                        <img width="35px" src="./images/icons/profile.png" alt="">
                        <h3><?php echo $row['username'];?></h3>
                    </div>
                    <hr>
                    <a href="logout.php">
                        <img src="./images/icons/logout.png" alt="">
                        <p>Logout</p>
                    </a>
                    

                </div>
            </div>
        <?php 
    }?>
    </nav>
</body>
</html>