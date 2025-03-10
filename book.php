<?php
require_once 'config.php';
require_once 'user.php';
require_once 'booking.php';

$user = new user($conn);
$booking = new booking($conn);

if (isset($_POST['makeBooking'])) {
    $bookingDate = $_POST['bookingDate'];
    $bookingTime = $_POST['bookingTime'];
    if ($booking->makeBooking( $bookingDate, $bookingTime)) {
        echo "Booking made successfully!";
    } else {
        echo "Booking failed!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System</title>
</head>
<body>
<h2>Make Booking</h2>
    <form action="" method="post">
        <input type="date" name="bookingDate" placeholder="Booking Date"><br><br>
        <input type="time" name="bookingTime" placeholder="Booking Time"><br><br>
        <button type="submit" name="makeBooking">Make Booking</button>
    </form>
</body>
</html>
