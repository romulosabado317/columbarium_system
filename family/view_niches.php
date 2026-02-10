<?php
include('../includes/db.php');
include('../includes/auth.php');
check_login('family');
include('../includes/header.php');

$niches = $conn->query("SELECT * FROM niches ORDER BY floor, section, number");
?>

<h2>Available Niches</h2>
<p>Click a niche to reserve it.</p>
<div style="display:flex; flex-wrap:wrap;">
<?php while($row = $niches->fetch_assoc()){ 
    $color = $row['status'] == 'available' ? 'green' : ($row['status'] == 'reserved' ? 'yellow' : 'red');
?>
<div class="niche" id="niche-<?php echo $row['id']; ?>" style="background-color:<?php echo $color; ?>;"
     onclick="<?php if($row['status']=='available'){ echo 'window.location=\'reserve_niche.php?niche_id='.$row['id'].'\''; } ?>">
<?php echo $row['section'] . $row['number']; ?>
</div>
<?php } ?>
</div>

<script src="../assets/js/niche_map.js"></script>
<?php include('../includes/footer.php'); ?>
