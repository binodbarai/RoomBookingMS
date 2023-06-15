<?php
    include '../db/connection.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rooms</title>
    <link rel="stylesheet" href="./CSS/adduser.css">
</head>

<body>
    <div class="wrapper">
        <h1>Add Rooms</h1>
        <form name="myForm" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="container">
                <div class="row">
                    <label for="name">Room Number</label>
                    <input class="inputField" type="number" name="room_number" placeholder="Enter Room Number">
                </div>
                
                <div class="row">
                    <label for="image">Room Photo</label>
                    <input type="file" name="image" id="">
                </div>

                <div class="row">
                    <label for="mobile">Room Type</label>
                    <input class="inputField" type="text" name="room_type" placeholder="Enter Room Type">
                </div>

                <div class="row">
                    <label for="dob">Capacity</label>
                    <input class="inputField" type="number" name="capacity">
                </div>

                <div class="row">
                    <label for="password">Price</label>
                    <input class="inputField" type="number" name="price" placeholder="Enter Price of Room">
                </div>

                <div class="row">
                    <label for="password">Room Status</label>
                    <input class="inputField" type="text" name="room_status" placeholder="Enter Room Status">
                </div>
            </div>

            <div class="anchor">
                <a href="index.php">Back To Home</a>
            </div>

            <input type="submit" name="submit" value="SUBMIT">

        </form>
    </div>


    <?php
    if(isset($_POST['submit'])){    
        $room_number = $_POST['room_number'];
        $room_type   = $_POST['room_type'];
        $capacity      = $_POST['capacity'];
        $price = $_POST['price'];
        $room_status = $_POST['room_status'];

        if(isset($_FILES['image'])){
            $imgName     = $_FILES['image']['name'];
            $imgSize     = $_FILES['image']['size']; 
            $imgTempName = $_FILES['image']['tmp_name'];
            $imgType     = $_FILES['image']['type'];

            move_uploaded_file($imgTempName,"uploadedImages/".$imgName);
        }

        $query = "INSERT INTO rooms_tbl (room_number, room_image, room_type, capacity, price, room_status) VALUES ('$room_number', '$imgName', '$room_type', '$capacity', '$price', '$room_status')";
        $result = mysqli_query($conn,$query);

        unset($_SESSION["email"]);
        
        if($result){
            echo "<script> alert('Room successfully added')</script>";
            header('location:index.php');
        }
        
    }
?>




    <script>
    function validateForm() {
        var fullname = document.forms["myForm"]["fullname"].value;
        var mobile = document.forms["myForm"]["mobile"].value;
        var email = document.forms["myForm"]["email"].value;
        var gender = document.forms["myForm"]["gender[]"].value;
        var dob = document.forms["myForm"]["dob"].value;
        var password = document.forms["myForm"]["password"].value;

        var fileInput = document.querySelector('input[type=file]');
        var file = fileInput.files[0];
        var fileSize = file.size / 1024 / 1024;
        var fileType = file.type.split('/')[1];

        if (fullname == "") {
            alert("Please enter your name.");
            return false;
        }
        if (mobile == "") {
            alert("Please enter your mobile number.");
            return false;
        }
        if (email == "") {
            alert("Please enter your email.");
            return false;
        }
        if (gender == "") {
            alert("Please select your gender.");
            return false;
        }
        if (dob == "") {
            alert("Please select your date of birth.");
            return false;
        }
        if (password == "") {
            alert("Please enter your password.");
            return false;
        }

        var mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(mobile)) {
            alert("Please enter a valid 10-digit mobile number.");
            return false;
        }

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        if (!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/)) {
            alert(
                'Password should be 8 to 15 characters long and should contain at least one lowercase letter,   one uppercase letter, one number, and one special character.'
            );
            return;
        }

        if (fileInput.files.length > 0) {
            var file = fileInput.files[0];
            var fileSize = file.size / 1024 / 1024;
            var fileType = file.type.split('/')[1];

            if (fileSize > 10) {
                alert("File size should be less than 10MB.");
                return false;
            }

            if (fileType != "jpeg" && fileType != "jpg" && fileType != "png") {
                alert("Only JPEG, JPG, and PNG files are allowed.");
                return false;
            }
        }


        return true;
    }
    </script>
</body>

</html>