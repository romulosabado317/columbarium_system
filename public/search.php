<?php
include('../includes/db.php');
include('../includes/header.php');

$query = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';
if($query){
    $results = $conn->query("SELECT * FROM niches WHERE floor LIKE '%$query%' OR section LIKE '%$query%' OR number LIKE '%$query%' ORDER BY floor, section, number");
}
?>

<h2>Search Results for "<?php echo htmlspecialchars($query); ?>"</h2>

<?php if(isset($results) && $results->num_rows > 0){ ?>
<div style="display:flex; flex-wrap:wrap; justify-content:center;">
    <?php while($row = $results->fetch_assoc()){ 
        $color = ($row['status']=='available')?'green':(($row['status']=='reserved')?'yellow':'red');
    ?>
    <div class="niche" style="background-color:<?php echo $color; ?>;">
        <?php echo $row['section'].$row['number']; ?>
    </div>
    <?php } ?>
</div>
<?php } else { ?>
<p style="text-align:center;">No niches found.</p>
<?php } ?>

<?php include('../includes/footer.php'); ?>
