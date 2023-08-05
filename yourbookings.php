<?php
include 'db/connection.php';
session_start();

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
        <?php 
        if (isset($_GET['userid'])) {
            $userid = $_GET['userid'];
            $query = "SELECT r.*, b.* FROM rooms_tbl AS r JOIN bookings AS b ON r.room_number = b.room_number WHERE b.user_id = $userid";
            $result = mysqli_query($conn, $query); 
        }
        ?>
        <?php if($result && mysqli_num_rows($result) > 0){  while ($row=mysqli_fetch_assoc($result)){?>
        <div class="room-card">
            <div class="room-card-image">
                <div class="image">
                    <a href=""><img src="./images/rooms/<?php echo $row['room_image'];?>" alt=""></a>
                </div>
                <div class="room-card-details">
                <h2><?php echo $row['room_type']?></h2>
                <div class="services-box">
                    <div class="service-box-icons"><img src="./images/icons/tv-monitor.png" alt=""><span>TV</span></div>
                    <div class="service-box-icons"><img src="./images/icons/parking.png" alt=""><span>Parking Available</span><br></div>
                    <div class="service-box-icons"><img src="./images/icons/wifi-signal.png" alt=""><span>Free Wi-fi</span></div>
                </div>
            </div>
            </div>
            <div class="room-card-price">
                <div class="price">
                    <h2>Rs. <?php echo $row['price'];?></h2>
                    <h6>per night</h6>
                </div>
                <div class="book-cancel-buttons">
                    <div class="book-now">
                        <a href="" class="book-now-button">Booked</a>
                    </div>
                    <div class="book-now">
                    <a href="cancel.php?booking_id=<?php echo $row['booking_id']; ?>&userid=<?php echo $userid; ?>" class="cancel-button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <hr width="1040px" style="margin: 50px 10px;">
        <?php }?>
        <?php }else { ?>
    <div class="no-bookings-message">
        <h1>You have no bookings yet.</h1>
    </div>
<?php } ?>
        
    </div>
    <!-- footer section -->
    <?php include 'templates/footer.php'?>
    
</body>
</html>