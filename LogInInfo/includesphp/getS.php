<?php

session_start();
include "../getDbconnect.php";
$conn = getDataBaseConnection("lifePriceData");

$name = $_SESSION['username'];

$sql = "SELECT * FROM userSymptoms WHERE username='$name'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
echo json_encode($records);

?>