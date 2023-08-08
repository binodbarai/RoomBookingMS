
<?php
include('../db/connection.php');
if(!isset($_SESSION['userLoggedIn'])){
    header('location:login.php');
}
?>
<h1>All Bookings</h1>
<table id="datatableid" border="1" rules="all">
    <thead>
        <tr>
            <th>Booking Id</th>
            <th>User Id</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Room Number</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
           
            $select = "SELECT * FROM bookings";
            $result = mysqli_query($conn, $select);
        
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    echo '
                    <tr>
                        <td>'.$row['booking_id'].'</td>
                        <td>'.$row['user_id'].'</td>
                        <td>'.$row['fullname'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['phone'].'</td>
                        <td>'.$row['room_number'].'</td>
                        <td>'.$row['price'].'</td>
                    </tr>
                    ';
                }
            }
            //closing the connection
            mysqli_close($conn);
        ?>
    </tbody>
    </table>