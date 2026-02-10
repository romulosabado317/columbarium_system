<?php
include('../includes/db.php');
session_start();
if($_SESSION['role'] != 'staff') { header('Location: ../index.php'); }
if(isset($_POST['update'])){
$id = $_POST['niche_id'];
$status = $_POST['status'];
$conn->query("UPDATE niches SET status='$status' WHERE id=$id");
echo "Updated";
}
?>
<form method='POST'>
<input type='text' name='niche_id' placeholder='Niche ID'>
<select name='status'>
<option value='available'>Available</option>
<option value='reserved'>Reserved</option>
<option value='occupied'>Occupied</option>
</select>
<button type='submit' name='update'>Update</button>
</form>
