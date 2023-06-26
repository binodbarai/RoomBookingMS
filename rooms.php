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
    <!-- all rooms section started -->
    <div class="all-rooms">
        <div class="all-rooms-heading">
            <h1>All Rooms</h1>
        </div>
        <div class="all-rooms-container">
            <?php
                $sql = "SELECT * FROM rooms_tbl order by rand()";
                $result = mysqli_query($conn, $sql);
                
            ?>
            <?php while($row = mysqli_fetch_assoc($result)){?>
            <div class="room-card">
                <div class="room-card-image">
                    <div class="image">
                        <a href=""><img src="./images/rooms/<?php echo $row['room_image'];?>" alt=""></a>
                    </div>
                    <div class="room-card-details">
                    <h2><?php echo $row['room_type'];?></h2>
                    <div class="services-box">
                        <div class="service-box-icons"><img src="./images/icons/tv-monitor.png" alt=""><span>TV</span></div>
                        <div class="service-box-icons"><img src="./images/icons/parking.png" alt=""><span>Parking Available</span><br></div>
                        <div class="service-box-icons"><img src="./images/icons/wifi-signal.png" alt=""><span>Free Wi-fi</span></div>
                    </div>
                </div>
                </div>
                <div class="room-card-price">
                    <div class="price">
                        <h2>Rs.<?php echo $row['price'];?></h2>
                        <h6>per night</h6>
                    </div>
                    <div class="book-now">
                    <button onclick="toggleLogin()" class="green-button">Book Now</button>
                    </div>
                </div>
            </div>
            <hr>
            <?php 
            }?>
        </div>
    </div>
    <a href="" class="next-page-button">Next Page &raquo;</a>
    <!-- footer section -->
    <?php include 'templates/footer.php'?>
</body>
</html>
