
<?php
include('../db/connection.php');
session_start();
if(!isset($_SESSION['userLoggedIn'])){
    header('location:login.php');
}
?>
<?php
    include '../db/connection.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $query = "DELETE FROM galery_tbl WHERE id = $id";
        $result = mysqli_query($conn,$query);

        if($result){
            echo "<script>
                    alert('Image Deleted Successfully');
                </script>";
            header('location:index.php?gallery');
        }
        
    }
?>