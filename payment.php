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

    <!-- container section -->
    <div class="payment-details">
        <div class="payment-details-left">
            <div class="payment-details-left-top">
                <h2>Your Details</h2>
            <ul>
                <div class="">
                    <li>Binod</li>
                </div>
                <div class="vertical"></div>
                <div class="">
                    <li>abc@gmail.com</li>
                </div>
                <div class="vertical"></div>
                <div class="">
                    <li>9827842388</li>
                </div>
            </ul>
            </div>
            <div class="payment-details-left-bottom">
                <h2>Choose your payment option</h2>
                <div class="payment-section">
                    <div class="payment-option">
                        <a href=""class="payment-option-buttons">PAY WITH ESEWA</a>
                        <a href=""class="payment-option-buttons">PAY AT HOTEL</a>
                        </div>
                    <div class="payment-button">
                        <div class="safe-message"><img src="./images/icons/secure-payment.png" alt=""><span>100% safe and secure payment</span></div>
                        <a href="">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="booking-details-right">
            <img src="./images/rooms/room3.jpg" alt=""><br>
            <h2>Family Room</h2>
            <div class="services-box">
                <div class="service-box-icons"><img src="./images/icons/tv-monitor.png" alt=""><span>TV</span></div>
                <div class="service-box-icons"><img src="./images/icons/parking.png" alt=""><span>Parking Available</span><br></div>
                <div class="service-box-icons"><img src="./images/icons/wifi-signal.png" alt=""><span>Free Wi-fi</span></div>
            </div>
            <div class="price-box"> 
                <h3>Payable Amount</h3>
                <div>
                <h2>Rs. 1600</h2><span>per night</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>