<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('staff');
include('../includes/header.php');

if(isset($_POST['update'])){
    $niche_id = $_POST['niche_id'];
    $status = $_POST['status'];
    $stmt = $conn->prepare("UPDATE niches SET status=? WHERE id=?");
    $stmt->bind_param("si", $status, $niche_id);
    $stmt->execute();
    echo "<p>Niche status updated successfully.</p>";
}

?>

<h2>Update Niche Status</h2>
<form method="POST">
<input type="number" name="niche_id" placeholder="Niche ID" required>
<select name="status">
<option value="available">Available</option>
<option value="reserved">Reserved</option>
<option value="occupied">Occupied</option>
</select>
<button type="submit" name="update">Update</button>
</form>

<?php include('../includes/footer.php'); ?>
