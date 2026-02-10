<?php
include('../includes/db.php');
session_start();
if($_SESSION['role'] != 'family') { header('Location: ../index.php'); }
$niche_id = $_GET['niche_id'];
if(isset($_POST['reserve'])){
$user_id = $_SESSION['user_id'];
$payment_method = $_POST['payment_method'];
$expires_at = date('Y-m-d H:i:s', strtotime('+1 day'));
$conn->query("INSERT INTO reservations (user_id, niche_id, payment_status, expires_at) VALUES ($user_id, $niche_id, '$payment_method', '$expires_at')");
$conn->query("UPDATE niches SET status='reserved' WHERE id=$niche_id");
echo "Reservation successful!";
}
?>
<h2>Reserve Niche <?php echo $niche_id; ?></h2>
<form method='POST'>
<select name='payment_method'>
<option value='gcash'>GCash</option>
<option value='cash'>Cash</option>
</select>
<button type='submit' name='reserve'>Reserve</button>
</form>
