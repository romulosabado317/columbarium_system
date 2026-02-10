<?php
include('includes/db.php');
header('Content-Type: application/json');

$result = $conn->query("SELECT id,floor,section,number,status FROM niches ORDER BY floor, section, number");
$niches = [];

while($row = $result->fetch_assoc()){
    $niches[] = $row;
}

echo json_encode($niches);
?>
