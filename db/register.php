<?php
    include 'connection.php';
    session_start();
    
    if(isset($_POST('submit'))){
        echo "Im here";
        $username = $_POST['username'];
        $email = $_POST['email'];      
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        
        //password encryption using ciphering method
        $ciphering_value="bf";
        $encrypt_key="anything";
        $encrypted_password=openssl_encrypt($password,$ciphering_value,$encrypt_key);

        $sql = "INSERT INTO `user_tbl` (`id`, `username`, `email`, `phone`, `password`) VALUES (NULL, '$username', '$email', '$phone', '$encrypted_ password')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>
                alert('Data inserted successfully! Now you can login.');
                window.location.href='index.php';
                </script>";
            unset($_SESSION['email']);
        }
    }
?>