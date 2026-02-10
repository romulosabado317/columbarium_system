<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('family');
include('../includes/header.php');

$niche_id = $_GET['niche_id'];

if(isset($_POST['reserve'])){
    $user_id = $_SESSION['user_id'];
    $payment_method = $_POST['payment_method'];
    $expires_at = date('Y-m-d H:i:s', strtotime('+1 day')); // reservation expires in 1 day if not paid
    $stmt = $conn->prepare("INSERT INTO reservations (user_id, niche_id, payment_status, expires_at) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $user_id, $niche_id, $payment_method, $expires_at);
    $stmt->execute();
    $conn->query("UPDATE niches SET status='reserved' WHERE id=$niche_id");
    echo "<p>Reservation successful! Payment method: $payment_method</p>";
}
?>

<h2>Reserve Niche <?php echo $niche_id; ?></h2>
<form method="POST">
<select name="payment_method">
<option value="gcash">GCash</option>
<option value="cash">Cash</option>
</select>
<button type="submit" name="reserve">Reserve</button>
</form>

<?php include('../includes/footer.php'); ?>
