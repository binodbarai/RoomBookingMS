<?php
include 'db/connection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/script.js"></script>
</head>
<body>
    <!-- header -->
    <?php include 'templates/header.php'?>

    <div class="booking-details">
        <div class="booking-details-left">
            <h2>Enter your details</h2>
            <br>
            <h6>We will use this information to book your room</h6>
            <form action="" class="booking-details-form">
                <div class="left">
                    <div>
                        <label for="fullname">Fullname</label>
                        <input type="text">
                    </div>
                    <div>
                        <label for="phonenumber">Phone Number</label>
                        <input type="number">
                    </div>
                </div>
                <div class="right">
                    <div>
                        <label for="email">E-mail</label>
                        <input type="email">
                    </div>
                    <div>
                        <br>
                        <label for="phonenumber"></label>
                        <input type="submit" value="Continue">
                    </div>
                </div>
            </form>
        </div>
        <?php 
        if(isset($_GET['room_numberid'])){
            $id = $_GET['room_numberid'];
            $sql="SELECT * from rooms_tbl where room_number=$id";
            $result=mysqli_query($conn,$sql);

        }
        ?>
        <?php while($row=mysqli_fetch_assoc($result)){?>
        <div class="booking-details-right">
            <img src="./images/rooms/<?php echo $row['room_image'];?>" alt=""><br>
            <h2><?php echo $row['room_type'];?></h2>
            <div class="services-box">
                <div class="service-box-icons"><img src="./images/icons/tv-monitor.png" alt=""><span>TV</span></div>
                <div class="service-box-icons"><img src="./images/icons/parking.png" alt=""><span>Parking Available</span><br></div>
                <div class="service-box-icons"><img src="./images/icons/wifi-signal.png" alt=""><span>Free Wi-fi</span></div>
            </div>
            <div class="price-box"> 
                <h3>Payable Amount</h3>
                <div>
                <h2>Rs.<?php echo $row['price'];?></h2><span>per night</span>
                </div>
            </div>
        </div>
        <?php 
        }?>
    </div>

    <!-- footer -->
    <?php include 'templates/footer.php'?>
</body>
</html>