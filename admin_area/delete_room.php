<?php
    include '../db/connection.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $query = "DELETE FROM rooms_tbl WHERE room_number = $id";
        $result = mysqli_query($conn,$query);

        if($result){
            echo "<script>
                    alert('Room Deleted Successfully');
                </script>";
            header('location:index.php?showrooms');
        }
        
    }
?>