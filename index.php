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
    <title>Room Booking System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/script.js"></script>
    
</head>
<body>
    
    <!-- header and navbar -->
    <?php include 'templates/header.php'?>
   
    <div class="content">
        <!-- home section starts -->
        <div class="background-image">
                <div class="background-text">
                    <h1>Book Your Perfect Room<br>with Ease & Efficiency<br></h1><br>
                    <span>Experience hassle-free room booking today!</span>
                </div>
                <br>
                <div><a href="rooms.php" class="green-button">Explore rooms</a></div>
        </div>
        <!-- search availability starts -->
        <div class="check-availability">
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

        <!-- our services section starts -->
        <div class="our-services" id="about">
            <div class="our-services-text">
                <h1>Choose Your Excellent Choice<br>For Vacation</h1>
                <h6>Create Unforgettable Memories: Whether you're looking for adventure, relaxation, or a little bit of both, we've got you covered.<br>Choose from our range of activities and experiences to create your ideal vacation</h6>
            </div>

            <div class="services"> 
                <div class="services-box">
                    <div class="services-elements">
                        <img src="./images/icons/customer-service.png" alt="#">
                        <br>
                        <h4>Customer Service</h4><span>24hrs Customer Service</span>
                    </div>
                </div>
                <div class="services-box">
                    <div class="services-elements">
                        <img src="./images/icons/family-room.png" alt="#">
                        <br>
                        <h4>Family Size Room</h4><span>Available</span>
                    </div>
                </div>
                <div class="services-box">
                    <div class="services-elements">
                        <img src="./images/icons/man.png" alt="#">
                        <br>
                        <h4>Conference Room</h4><span>Conference Room Available</span>
                    </div>
                </div>
                <div class="services-box">
                    <div class="services-elements">
                        <img src="./images/icons/wifi.png" alt="#">
                        <br>
                        <h4>Free Wi-fi</h4><span>24hrs Wi-fi Zone</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="room-section-background" id="rooms">
            <div class="room-section-content">
                <div class="room-section-text">
                    <h1>Our Rooms & Suites</h1><h6>Book Your Room Today: Ready to experience the comfort and luxury of our rooms?<br>Book your stay today and get ready to enjoy all that Khumbila Hotel has to offer.</h6>
                </div>
                <div class="room-section-images">
                    <?php
                        $select_query="SELECT * from rooms_tbl order by rand()";
                        $result=mysqli_query($conn,$select_query);
                        
                    ?>
                    <?php $count=0;?>
                        <?php while($row=mysqli_fetch_assoc($result) ){?>
                            <div class="room-section-images-container">
                                <div class="rooms" style="background-image: linear-gradient(rgba(0, 0, 0, 0.0),rgba(0, 0, 0, 0.0),rgba(0, 0, 0, 0.9)) ,  url('./images/rooms/<?php echo $row["room_image"]?>');">
                                    <div class="room-type">
                                        <h3><?php echo $row["room_type"]?></h3><h6><?php echo $row["room_status"]?> room</h6>
                                    </div>
                                    <div class="room-price">
                                        <h3>NRP <?php echo $row["price"]?></h3><h6>per night</h6>
                                    </div>
                                    <div class="button-popup">
                                    <a href="book.php?roomid=<?php echo $row['room_number'];?>" class="green-button">Book Now</a>
                                    </div>
                                </div>
                            </div>
                            <?php $count++;?>
                            <?php
                                if($count>5){
                                    break;
                                }
                            ?>
                        <?php
                        }?>       
                </div>
                        
                
                <div class="rooms-button"><a href="rooms.php" class="green-buttons">View all rooms</a></div>
            </div>
        </div>
        <div class="gallery-section" id="gallery">
            <div class="gallery-section-text">
                <h1>Gallery</h1>
                <h6>Create Unforgettable Memories: Whether you're looking for adventure, relaxation, or a little bit of both, we've got you covered. <br>Choose from our range of activities and experiences to create your ideal vacation</h6>
            </div>
            <div class="gallery-section-images">
                <div class="gallery-wrapper" id="gallery-wrapper">
                    <?php 
                    $sql="SELECT * FROM galery_tbl";
                    $result=mysqli_query($conn,$sql)
                    ?>
                    <?php while($row=mysqli_fetch_assoc($result)){?>
                    <img src="./images/rooms/<?php echo $row['image']?>" alt="#">
                    <?php 
                    }?>
                </div>
            </div>
        </div>
    </div>

    <!-- footer section starts -->
    <?php include 'templates/footer.php';?>
</body>
</html>