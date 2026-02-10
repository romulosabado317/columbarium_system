<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('family');

// Placeholder for GCash API integration
if(isset($_GET['reservation_id'])){
    $reservation_id = $_GET['reservation_id'];

    // Simulate GCash payment verification
    $conn->query("UPDATE reservations SET payment_status='gcash' WHERE id=$reservation_id");
    echo "<p>GCash payment verified for reservation ID $reservation_id</p>";
} else {
    echo "<p>No reservation selected.</p>";
}
?>
