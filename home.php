<?php
require_once 'config.php';
require_once 'user.php';
require_once 'booking.php';

$user = new user($conn);
$booking = new booking($conn);

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($user->register($name, $email, $password)) {
        echo "User registered successfully!";
    } else {
        echo "Registration failed!";
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userData = $user->login($email, $password);
    if ($userData) {
        echo "Login successful!";
        // You can redirect to a dashboard here
    } else {
        echo "Invalid credentials!";
    }
}

if (isset($_POST['makeBooking'])) {
    $userId = $_POST['userId'];
    $bookingDate = $_POST['bookingDate'];
    $bookingTime = $_POST['bookingTime'];
    if ($booking->makeBooking($userId, $bookingDate, $bookingTime)) {
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
    <h2>Register</h2>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="register">Register</button>
    </form>

    <h2>Login</h2>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="login">Login</button>
    </form>
<!-- should be in booking.php -->
    <h2>Make Booking</h2>
    <form action="" method="post">
        <input type="number" name="userId" placeholder="User ID">
        <input type="date" name="bookingDate" placeholder="Booking Date">
        <input type="time" name="bookingTime" placeholder="Booking Time">
        <button type="submit" name="makeBooking">Make Booking</button>
    </form>
</body>
</html>
