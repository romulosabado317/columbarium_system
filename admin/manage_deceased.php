<?php
include('../includes/db.php');
session_start();
if($_SESSION['role'] != 'admin') { header('Location: ../index.php'); }
$deceased = $conn->query("SELECT * FROM deceased");
?>
<h2>Manage Deceased Records</h2>
<table border='1'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>DOD</th><th>Photo</th></tr>
<?php while($row = $deceased->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fname']; ?></td>
<td><?php echo $row['lname']; ?></td>
<td><?php echo $row['dob']; ?></td>
<td><?php echo $row['dod']; ?></td>
<td><img src='../assets/photos/<?php echo $row['photo']; ?>' width='50'></td>
</tr>
<?php } ?></table>
