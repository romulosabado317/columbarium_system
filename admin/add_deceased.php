<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('admin');
include('../includes/header.php');
if(isset($_POST['add'])){
$fname = sanitize($_POST['fname']);
$lname = sanitize($_POST['lname']);
$dob = $_POST['dob'];
$dod = $_POST['dod'];
$photo = $_FILES['photo']['name'];
$target = '../assets/photos/'.basename($photo);
move_uploaded_file($_FILES['photo']['tmp_name'], $target);
$stmt = $conn->prepare("INSERT INTO deceased (fname,lname,dob,dod,photo) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss", $fname,$lname,$dob,$dod,$photo);
$stmt->execute();
echo "Deceased record added successfully.";
}
?>
<h2>Add Deceased</h2>
<form method='POST' enctype='multipart/form-data'>
<input type='text' name='fname' placeholder='First Name' required>
<input type='text' name='lname' placeholder='Last Name' required>
<input type='date' name='dob' placeholder='Date of Birth' required>
<input type='date' name='dod' placeholder='Date of Death' required>
<input type='file' name='photo' required>
<button type='submit' name='add'>Add Deceased</button>
</form>
<?php include('../includes/footer.php'); ?>
