<?php
include('../db/connection.php');
session_start();
if(!isset($_SESSION['userLoggedIn'])){
    header('location:login.php');
}
?>
<?php
    include '../db/connection.php';

    if(isset($_GET['removeid'])){
        $id = $_GET['removeid'];

        // Retrieve the room number before deleting the booking
        $getRoomNumberQuery = "SELECT room_number FROM bookings WHERE room_number = $id";
        $roomResult = mysqli_query($conn, $getRoomNumberQuery);
        
        if($roomResult && $row = mysqli_fetch_assoc($roomResult)){
            $roomNumber = $row['room_number'];

            // Delete the booking
            $deleteQuery = "DELETE FROM bookings WHERE room_number = $id";
            $deleteResult = mysqli_query($conn, $deleteQuery);

            // Update the room status to 'Available'
            $updateRoomStatusQuery = "UPDATE rooms_tbl SET room_status = 'Available' WHERE room_number = $roomNumber";
            $updateResult = mysqli_query($conn, $updateRoomStatusQuery);

            if($deleteResult && $updateResult){
                echo "<script>
                        alert('Guest checked out Successfully');
                    </script>";
                header('location:index.php?bookings');
            } else {
                echo "<script>
                        alert('Error checking out guest');
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Error retrieving room number');
                </script>";
        }
    }

    //closing the connection
    mysqli_close($conn);
?>

