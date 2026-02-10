<?php
include('../includes/db.php');
session_start();
if($_SESSION['role'] != 'family') { header('Location: ../index.php'); }
$niches = $conn->query("SELECT * FROM niches");
?>
<h2>Available Niches</h2>
<div style='display:flex; flex-wrap:wrap;'>
<?php while($row = $niches->fetch_assoc()) { ?>
<div class='niche' id='niche-<?php echo $row['id']; ?>' onclick="window.location='reserve_niche.php?niche_id=<?php echo $row['id']; ?>';">
<?php echo $row['section'] . $row['number']; ?>
</div>
<?php } ?>
</div>
<script src='../assets/js/niche_map.js'></script>
