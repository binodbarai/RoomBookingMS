<?php
    include 'db/connection.php';
    session_start();
    
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];      
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
        //password encryption using ciphering method
        $ciphering_value="bf";
        $encrypt_key="anything";
        $encrypted_password=openssl_encrypt($password,$ciphering_value,$encrypt_key);

        //selecting email
        $insert_sql = "SELECT * FROM user_tbl WHERE email='$email'";
        $select_result = mysqli_query($conn, $insert_sql);
        $row = mysqli_fetch_assoc($select_result);
        if($row>0){
            echo "<script>
                alert('Email already exists!');
                window.location.href='index.php';
                </script>";
        }
        else{
            $sql = "INSERT INTO `user_tbl` (`id`, `username`, `email`, `phone`, `password`) VALUES (NULL, '$username', '$email', '$phone', '$encrypted_password')";
            $result = mysqli_query($conn, $sql);
            if($result){
            echo "<script>
                alert('Data inserted successfully! Now you can login.');
                window.location.href='index.php';
                </script>";
            unset($_SESSION['email']);
        }
        }

        
    }
    //closing the connection
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/login-register.css">
</head>
<body>
    <div class="overlay"></div>
    <form  name="myForm" method="POST" onsubmit="return validateForm();" action="">
        <div class="register-container">
            
            <span class="cross"><a href="index.php">&times;</a></span>
            <h1>Register</h1>
            <div class="inputbox">
                <input type="text" name="username"  required>
                <span>Full Name</span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="email" name="email" required>
                <span>E-mail</span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="tel" name="phone" required>
                <span>Phone Number</span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="password" name="password" id="password" required>
                <span>Password</span>
                <i></i>
            </div>
            <div class="inputbox" >
                <input type="password" name="confirm_password" id="confirm_password" required>
                <span>Confirm Password</span>
                <i></i>
            </div>
            <input type="submit" name="submit" value="SUBMIT" class="green-buttons">
        </div>
    </form>
    <script>
    function validateForm() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;
    var username = document.forms["myForm"]['username'].value;
    var phone = document.forms["myForm"]["phone"].value;
    var email = document.forms["myForm"]["email"].value;


    if (password !== confirmPassword) {
        alert("Error: Passwords do not match!");
        return false; // Prevent form submission
    }

    if (username == "") {
        alert("Please enter your name.");
        return false;
    }
    if (phone == "") {
        alert("Please enter your mobile number.");
        return false;
    }
    if (email == "") {
        alert("Please enter your email.");
        return false;
    }
    if (password == "") {
        alert("Please enter your password.");
        return false;
    }

    var phoneRegex = /^[0-9]{10}$/;
    if (!phoneRegex.test(phone)) {
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
        return false;
    }
    
    // Form is valid, allow submission
    return true;
}
    </script>
</body>
</html>