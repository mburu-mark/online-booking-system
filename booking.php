<?php
class booking {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function makeBooking($bookingDate, $bookingTime) {
        $query = "INSERT INTO bookings (user_id, booking_date, booking_time, status) VALUES (:booking_date, :booking_time, 'pending')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':booking_date', $bookingDate);
        $stmt->bindParam(':booking_time', $bookingTime);
        return $stmt->execute();
    }

    public function getBookings($userId) {
        $query = "SELECT * FROM bookings WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>