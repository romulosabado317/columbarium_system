<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('admin');
include('../includes/header.php');
if(isset($_POST['add'])){
$floor = sanitize($_POST['floor']);
$section = sanitize($_POST['section']);
$number = sanitize($_POST['number']);
$stmt = $conn->prepare("INSERT INTO niches (floor,section,number,status) VALUES (?,?,?, 'available')");
$stmt->bind_param("iss", $floor,$section,$number);
$stmt->execute();
echo "Niche added successfully.";
}
?>
<h2>Add Niche</h2>
<form method='POST'>
<input type='number' name='floor' placeholder='Floor' required>
<input type='text' name='section' placeholder='Section' required>
<input type='text' name='number' placeholder='Number' required>
<button type='submit' name='add'>Add Niche</button>
</form>
<?php include('../includes/footer.php'); ?>
