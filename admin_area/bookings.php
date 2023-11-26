<?php
include('../db/connection.php');
if (!isset($_SESSION['userLoggedIn'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bookings</title>
    <style>
        .cancel-button {
            cursor: pointer;
        }
    </style>
</head>
<body>

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
            <th>Room Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select = "SELECT * FROM bookings";
        $result = mysqli_query($conn, $select);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <tr>
                    <td>' . $row['booking_id'] . '</td>
                    <td>' . $row['user_id'] . '</td>
                    <td>' . $row['fullname'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>' . $row['room_number'] . '</td>
                    <td>' . $row['price'] . '</td>
                    <td> <a href="remove_booking.php?removeid='.$row['room_number'].'"class="checkout-button" > Checkout </a> </td>

                </tr>
                ';
            }
        }
        // Closing the connection
        mysqli_close($conn);
        ?>
    </tbody>
</table>

</body>
</html>
