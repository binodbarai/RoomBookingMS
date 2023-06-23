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
    <title>Update User Data</title>
    <link rel="stylesheet" href="./css/adduser.css">
</head>

<body>

    <?php
        $id = $_GET['updateid'];
        $query = "SELECT * FROM user_tbl WHERE id = $id";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);

    ?>


    <div class="wrapper">
        <h1>Update User</h1>
        <form name="myForm" action="" method="POST" onsubmit="return validateForm();">
            <div class="row">
                <label for="name">Fullname</label>
                <input class="inputField" type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Enter Your Fullname">
            </div>

            <div class="row">
                <label for="mobile">Phone</label>
                <input class="inputField" type="tel" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Enter Your Phone Number">
            </div>
 
            <div class="row">
                <label for="email">Email</label>
                <input class="inputField" type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter Your Email">
            </div>
            <input type="submit" name="submit" value="UPDATE">

        </form>
    </div>


    <?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $phone   = $_POST['phone'];
        $email    = $_POST['email'];
        

        $query = "UPDATE user_tbl SET username='$username', phone='$phone', email='$email' WHERE id='$id'";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<script>
                    alert('Data Updated Successfully')
                </script>";
            header('location:index.php');
        }
    }
?>
    <script>
    function validateForm() {
        var fullname = document.forms["myForm"]["username"].value;
        var mobile = document.forms["myForm"]["phone"].value;
        var email = document.forms["myForm"]["email"].value;


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



        return true;
    }
    </script>
</body>

</html>