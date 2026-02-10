<?php
include('../includes/db.php');
// Placeholder for marking cash payment
if(isset($_GET['reservation_id'])){
$reservation_id = $_GET['reservation_id'];
$conn->query("UPDATE reservations SET payment_status='cash' WHERE id=$reservation_id");
echo "Cash payment recorded.";
}
?>
