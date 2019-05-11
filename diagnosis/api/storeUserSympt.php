<?php
session_start();
$name = $_SESSION['username'];
$name = "john";
include "dbConn.php";
$conn = getConnection();

$sql = "INSERT INTO userSymptoms (username,symptom) VALUES ( $name  ,'" . $_GET["url"] . "')";
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode();

?>