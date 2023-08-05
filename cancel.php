<?php
include 'db/connection.php';

if (isset($_GET['booking_id']) && isset($_GET['userid'])) {
    $booking_id = $_GET['booking_id'];
    $userid = $_GET['userid'];

    // Escape the booking_id and userid to prevent SQL injection
    $booking_id = mysqli_real_escape_string($conn, $booking_id);
    $userid = mysqli_real_escape_string($conn, $userid);

    // Delete the booking from the database
    $delete_query = "DELETE FROM bookings WHERE booking_id = '$booking_id'";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        // Redirect the user back to the yourbookings.php page after the booking is successfully cancelled
        header("Location: yourbookings.php?userid=$userid");
        exit();
    } else {
        // Handle the error if the deletion fails
        echo "Failed to cancel the booking.";
    }
}
?>
