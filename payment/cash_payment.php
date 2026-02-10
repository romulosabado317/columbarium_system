<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('staff');

if(isset($_GET['reservation_id'])){
    $reservation_id = $_GET['reservation_id'];

    $conn->query("UPDATE reservations SET payment_status='cash' WHERE id=$reservation_id");
    echo "<p>Cash payment recorded for reservation ID $reservation_id</p>";
} else {
    echo "<p>No reservation selected.</p>";
}
?>
