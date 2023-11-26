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
    <?php include 'templates/header.php' ?>

<?php
if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];
    $price=$_GET['price'];
    $query = "SELECT * FROM user_tbl where id=$userid";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];
    $email = $row['email'];
    $phone = $row['phone'];
}

if (isset($_GET['roomid'])) {
    $roomid = $_GET['roomid'];
    $room_query = "SELECT * from rooms_tbl where room_number=$roomid";
    $room_result = mysqli_query($conn, $room_query);
    
    
}
?>

<div class="booking-details">
    <div class="booking-details-left">
        <h2>Your details</h2>
        <br>
        <h6>We will use this information to book your room</h6>
        <form action="payment.php" class="booking-details-form" method="get">
            <div class="left">
                <div>
                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" value="<?php echo $name; ?>">
                </div>
                <div>
                    <label for="phonenumber">Phone Number</label>
                    <input type="number" name="phonenumber" value="<?php echo $phone; ?>">
                </div>
                <input type="hidden" name="room_number" value="<?php echo $roomid; ?>">
                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
            </div>
            <div class="right">
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div>
                    <br>
                    <label for="phonenumber"></label>
                    <input type="submit" value="Continue">
                </div>
            </div>
        </form>
    </div>

    <?php while ($room_row = mysqli_fetch_assoc($room_result)) { ?>
        <div class="booking-details-right">
            <img src="./admin_area/uploadedImages/<?php echo $room_row['room_image']; ?>" alt=""><br>
            <h2><?php echo $room_row['room_type']; ?></h2>
            <div class="services-box">
                <div class="service-box-icons"><img src="./images/icons/tv-monitor.png" alt=""><span>TV</span></div>
                <div class="service-box-icons"><img src="./images/icons/parking.png" alt=""><span>Parking Available</span><br></div>
                <div class="service-box-icons"><img src="./images/icons/wifi-signal.png" alt=""><span>Free Wi-fi</span></div>
            </div>
            <div class="price-box">
                <h3>Payable Amount</h3>
                <div>
                    <h2>Rs.<?php echo $room_row['price']; ?></h2><span>per night</span>
                </div>
            </div>
        </div>
    <?php }
    //closing the connection
    mysqli_close($conn);
    ?>
</div>


    <!-- footer -->
    <?php include 'templates/footer.php'?>
</body>
</html>