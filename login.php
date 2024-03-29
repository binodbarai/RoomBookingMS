<?php
    include 'db/connection.php';
        if(isset($_POST['submit'])){
            
            $email= $_POST['email'];
            $password= $_POST['password'];
            $error="";

            $sql="SELECT * FROM user_tbl WHERE email='$email'"; 
            $result=mysqli_query($conn,$sql);
            if($row= mysqli_fetch_assoc($result)){
                $ciphering_value="bf";
                $encrypt_key="anything";
                $decrypted_password=openssl_decrypt($row['password'],$ciphering_value,$encrypt_key);

                if($password==$decrypted_password){ 
                    header("location:index.php?userid=".$row['id']."");
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];

                    $userId = $row['id']; 
                    $loginDate = date("Y-m-d H:i:s"); // Current login date and time

                    // Insert login details into loginHistory_table
                    $insertQuery = "INSERT INTO loginHistory_tbl (login_date, user_id)
                                    VALUES ('$loginDate', '$userId')";
                    $result = mysqli_query($conn, $insertQuery);

                    //closing the connection
                    mysqli_close($conn);
                }
                else{
                    $error="Incorrect password.";  
                }
            }
            else{
                $error="Incorrect email.";  
            }
        }
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
    <div class="overlay <?php if($error){echo "active";}?>" onclick="toggleLogin()"></div>
    <form action="" method="post">
        <div class="container <?php if($error){echo "active";}?>">
            <span class="cross" onclick="toggleLogin()">&times;</span>
            <h1>Login</h1>
            <div class="inputbox">
                <?php if(isset($error)) {?>
                    <p class = "error"><?php echo $error;?></p>
                <?php }?>
            </div>
            <div class="inputbox">
                <input type="text" name="email" required>
                <span>Email/Phone</span>
                <i></i>
            </div>
            <div class="inputbox" >
                <input type="password" name="password" required>
                <span>Password</span>
                <i></i>
            </div>
            <div class="login-button-section">
                <input type="submit" value="Login" name="submit" class="green-buttons"><a href="@">Forgot password?</a>
            </div>
            <div><p>Don't have an account?</p></div>
            <a href="register.php" class="green-buttons" name="register">Register</a>
        </div>
    </form>
</body>
</html>