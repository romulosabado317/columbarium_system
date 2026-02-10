<?php
include('../includes/db.php');
session_start();
if($_SESSION['role'] != 'admin') { header('Location: ../index.php'); }
$niches = $conn->query("SELECT * FROM niches");
?>
<h2>Manage Niches</h2>
<table border='1'><tr><th>ID</th><th>Floor</th><th>Section</th><th>Number</th><th>Status</th></tr>
<?php while($row = $niches->fetch_assoc()) { ?>
<tr><td><?php echo $row['id']; ?></td><td><?php echo $row['floor']; ?></td><td><?php echo $row['section']; ?></td><td><?php echo $row['number']; ?></td><td><?php echo $row['status']; ?></td></tr>
<?php } ?></table>
