<?php
    include '../db/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Data</title>
    <link rel="stylesheet" href="./CSS/adduser.css">
</head>

<body>

    <?php
        $id = $_GET['updateid'];
        $query = "SELECT * FROM rooms_tbl WHERE room_number = $id";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
    ?>


    <div class="wrapper">
        <h1>Update User</h1>
        <form name="myForm" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="row">
                <label for="name">Room Number</label>
                <input class="inputField" type="text" name="room_number" value="<?php echo $row['room_number']; ?>">
            </div>

            <div class="row">
                <label for="image">Room Image</label>
                <input type="file" name="image" path="<?php echo $row['room_image']; ?>" id="">
            </div>

            <div class="row">
                <label for="mobile">Room Type</label>
                <input class="inputField" type="text" name="room_type" value="<?php echo $row['room_type']; ?>">
            </div>

            <div class="row">
                <label for="email">Capacity</label>
                <input class="inputField" type="text" name="capacity" value="<?php echo $row['capacity']; ?>">
            </div>

            <div class="row">
                <label for="dob">Price</label>
                <input class="inputField" type="text" value="<?php echo $row['price']; ?>" name="price">
            </div>


            <div class="row">
                <label for="password">Room Status</label>
                <input class="inputField" type="text" name="room_status" value="<?php echo $row['room_status']; ?>">
            </div>

            <input type="submit" name="submit" value="UPDATE">

        </form>
    </div>


    <?php
    if(isset($_POST['submit'])){
        $room_number = $_POST['room_number'];
        $room_type   = $_POST['room_type'];
        $capacity    = $_POST['capacity'];
        $price      = $_POST['price'];
        $room_status = $_POST['room_status'];

        if(isset($_FILES['image'])){
            $imgName     = $_FILES['image']['name'];
            $imgSize     = $_FILES['image']['size']; 
            $imgTempName = $_FILES['image']['tmp_name'];
            $imgType     = $_FILES['image']['type'];

            move_uploaded_file($imgTempName,"uploadedImages/".$imgName);
        }

        $query = "UPDATE rooms_tbl SET room_number='$room_number', room_image='$imgName', room_type='$room_type', capacity='$capacity', price='$price', room_status='$room_status' WHERE room_number='$id'";
        $result = mysqli_query($conn,$query);
        
        header('location:index.php?showrooms');
    }
?>




    <script>
    function validateForm() {
        var fullname = document.forms["myForm"]["room_number"].value;
        var room_type = document.forms["myForm"]["room_type"].value;
        var capacity = document.forms["myForm"]["capacity"].value;
        var price = document.forms["myForm"]["price"].value;
        var room_status = document.forms["myForm"]["room_status"].value;

        var fileInput = document.querySelector('input[type=file]');
        var file = fileInput.files[0];
        var fileSize = file.size / 1024 / 1024;
        var fileType = file.type.split('/')[1];

        if (fullname == "") {
            alert("Please enter Room Number.");
            return false;
        }
        if (room_type == "") {
            alert("Please enter Room type.");
            return false;
        }
        if (capacity == "") {
            alert("Please enter capacity of room");
            return false;
        }
        if (price == "") {
            alert("Please enter price.");
            return false;
        }
        if (room_status == "") {
            alert("Please enter Room Status.");
            return false;
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