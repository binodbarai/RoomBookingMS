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
    <title>Payment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/script.js"></script>
</head>
<body>
    <!-- header section -->
    <?php include 'templates/header.php';?>
    <?php if(isset($_GET['fullname'])){
        $fullname=$_GET['fullname'];
        $phonenumber=$_GET['phonenumber'];
        $email=$_GET['email'];
        $roomNumber=$_GET['room_number'];
        $userid=$_GET['userid'];
        $price=$_GET['price'];
    }?>
    

    <!-- container section -->
    <div class="payment-details">
        <div class="payment-details-left">
            <div class="payment-details-left-top">
                <h2>Your Details</h2>
            <ul>
                <div class="">
                    <li><?php echo $fullname?></li>
                </div>
                <div class="vertical"></div>
                <div class="">
                    <li><?php echo $email?></li>
                </div>
                <div class="vertical"></div>
                <div class="">
                    <li><?php echo $phonenumber?></li>
                </div>
            </ul>
            </div>
            
            <div class="payment-details-left-bottom">
                <h2>Choose your payment option</h2>
                <div class="payment-section">
                    <div class="payment-option">
                        <a href=""class="payment-option-buttons">PAY WITH ESEWA</a><br>
                        <a href=""class="payment-option-buttons">PAY AT HOTEL</a>
                        </div>
                    <div class="payment-button">
                        <div class="safe-message"><img src="./images/icons/secure-payment.png" alt=""><span>100% safe and secure payment</span></div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="fullname" value="<?php echo $fullname; ?>">
                            <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <input type="hidden" name="phonenumber" value="<?php echo $phonenumber; ?>">
                            <input type="hidden" name="room_number" value="<?php echo $roomNumber; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input class="booknow-payment" type="submit" value="Book Now">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fullname=$_POST['fullname'];
                $phonenumber=$_POST['phonenumber'];
                $email=$_POST['email'];
                $roomNumber = $_POST['room_number'];
                $userid=$_POST['userid'];
                $price=$_POST['price'];
                
                // Generate a random booking ID
                $bookingId = random_generator();
                
            
                // Insert the booking details into the database
                $query = "INSERT INTO bookings (booking_id, user_id, fullname, email, phone, room_number, price) VALUES ('$bookingId', '$userid', '$fullname', '$email', '$phonenumber', '$roomNumber', '$price')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    // Update the room status to "Booked"
                    $updateQuery = "UPDATE rooms_tbl SET room_status = 'Booked' WHERE room_number = '$roomNumber'";
                    $updateResult = mysqli_query($conn, $updateQuery);

                    if ($updateResult) {
                        echo "<script>
                            alert('Your booking has been placed with booking id=".$bookingId.".');
                            window.location.href='index.php?userid=" . $userid . "';
                        </script>";
                    } else {
                        echo "<script>
                            alert('Cannot update room status.');
                            window.location.href='payment.php';
                        </script>";
                    }
                } else {
                    echo "<script>
                        alert('Cannot insert data.');
                        window.location.href='payment.php';
                    </script>";
                }
            }
            
            // Function to generate a random booking ID
            function random_generator(){
                srand ((double) microtime() * 10000000);
                //Array of alphabets
                $input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
                "R","S","T","U","V","W","X","Y","Z");
                
                $random_generator="";// Initialize the string to store random numbers
                for($i=1;$i<10+1;$i++){ // Loop the number of times of required digits
                
                if(rand(1,2) == 1){// to decide the digit should be numeric or alphabet
                // Add one random alphabet 
                $rand_index = array_rand($input);
                $random_generator .=$input[$rand_index]; // One char is added
                
                }else{
                
                // Add one numeric digit between 1 and 10
                $random_generator .=rand(1,10); // one number is added
                } // end of if else
                
                } // end of for loop 
                
                
                return $random_generator;
            } // end of function
                
                
        ?>
        <?php
        if (isset($_GET['room_number'])) {
            $roomid = $_GET['room_number'];
            $room_query = "SELECT * from rooms_tbl where room_number=$roomid";
            $room_result = mysqli_query($conn, $room_query);
        }
        ?>

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
    <?php } ?>
    </div>
</body>
</html>