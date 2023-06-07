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
    <title>Rooms</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/script.js"></script>
</head>
<body>
    <!-- header section -->
    <?php include 'templates/header.php'?>
    
    <!-- check availability -->
    <div class="check-availability-after">
            <form action="#">
                <div class="top">
                    <div class="inputs">
                        <label for="check-in">Check In</label>
                        <input class="input-fields" type="date" name="check-in-date">
                    </div>
                    <div class="inputs">
                        <label for="Adults">Adults</label>
                        <select class="input-fields" name="no-of-adults">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>  
                    <div class="inputs">
                        <label for="room">Room</label>
                        <select class="input-fields" name="no-of-rooms" id="">
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <div class="down">
                    <div class="inputs">
                        <label for="check-out">Check Out</label>
                        <input class="input-fields" type="date" name="check-out-date">
                    </div>
                    <div class="inputs">
                        <label for="Adults">Children</label>
                        <select class="input-fields" name="no-of-adults">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="button-div">
                        <button class="check-availability-button">Check Availability</button>
                    </div>
                </div>
            </form>
        </div>
</body>
</html>