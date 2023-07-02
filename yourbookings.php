<?php
include 'db/connection.php';
session_start();
if(isset($_GET['userid'])){
    $userid=$_GET['userid'];
    $query="SELECT * from user_tbl where id=$userid";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/script.js"></script>
</head>
<body>
    <!-- header  -->
        <?php
        include 'templates/header.php';
        ?>
    <!-- container  -->
    <div class="your-bookings-container">
        <div class="your-bookings-title">
            <h2>Your Bookings</h2>
        </div>
        <div class="room-card">
            <div class="room-card-image">
                <div class="image">
                    <a href=""><img src="./images/rooms/room1.jpg" alt=""></a>
                </div>
                <div class="room-card-details">
                <h2>Family Room</h2>
                <div class="services-box">
                    <div class="service-box-icons"><img src="./images/icons/tv-monitor.png" alt=""><span>TV</span></div>
                    <div class="service-box-icons"><img src="./images/icons/parking.png" alt=""><span>Parking Available</span><br></div>
                    <div class="service-box-icons"><img src="./images/icons/wifi-signal.png" alt=""><span>Free Wi-fi</span></div>
                </div>
            </div>
            </div>
            <div class="room-card-price">
                <div class="price">
                    <h2>Rs. 1600</h2>
                    <h6>per night</h6>
                </div>
                <div class="book-cancel-buttons">
                    <div class="book-now">
                        <a href="" class="book-now-button">Booked</a>
                    </div>
                    <div class="book-now">
                        <a href="" class="cancel-button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <hr width="1040px" style="margin: 50px 10px;">
    </div>
    <!-- footer section -->
    <?php include 'templates/footer.php'?>
    
</body>
</html>