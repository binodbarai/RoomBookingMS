<?php
    include '../db/connection.php';
    session_start();
        if(isset($_POST['submit'])){
            
            $email= $_POST['email'];
            $password= $_POST['password'];
        
                if($password=='admin' && $email== 'admin'){
                    $_SESSION['userLoggedIn'] ='';
                    header('location:index.php');
                }
                else{
                    $error="Incorrect email or password.";  
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
    <link rel="stylesheet" href="./css/login.css">

</head>
<body>
    <div class="overlay"></div>
    <form action="" method="post">
        <div class="container">
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
                <input type="submit" value="Login" name="submit" class="green-buttons">
            </div>
            
        </div>
    </form>
</body>
</html>