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
    <script src="./js/script.js"></script>  
</head>
<body>
    <div class="overlay"></div>
    <form action="db/register.php" name="myForm" method="POST" onsubmit="return validateForm();" >
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
                <input type="number" name="phone" required>
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
            <input type="submit" name="submit" value="Register" class="green-buttons">
        </div>
    </form>
</body>
</html>