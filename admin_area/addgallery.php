<?php
include('../db/connection.php');
session_start();
if(!isset($_SESSION['userLoggedIn'])){
    header('location:login.php');
}
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
        <h1>Add Images</h1>
        <form name="myForm" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="container"> 
                <div class="row">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="">
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

        if(isset($_FILES['image'])){
            $imgName     = $_FILES['image']['name'];
            $imgSize     = $_FILES['image']['size']; 
            $imgTempName = $_FILES['image']['tmp_name'];
            $imgType     = $_FILES['image']['type'];

            move_uploaded_file($imgTempName,"uploadedImages/".$imgName);
        }

        $query = "INSERT INTO galery_tbl (image) VALUES ('$imgName')";
        $result = mysqli_query($conn,$query);
        
        if($result){
            echo "<script> alert('Image added')</script>";
            header('location:index.php?gallery');
        }
        
    }
    //closing the connection
    mysqli_close($conn);
?>




    <script>
    function validateForm() {

        var fileInput = document.querySelector('input[type=file]');
        var file = fileInput.files[0];
        var fileSize = file.size / 1024 / 1024;
        var fileType = file.type.split('/')[1];

    
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