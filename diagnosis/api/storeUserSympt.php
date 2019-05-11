<?php
    session_start();
    $name = $_SESSION['username'];
    //$name = "john";
    include "dbConn.php";
    
    $conn = getConnection();
    $sy = $_GET["sy"];
    
    $sql = "INSERT INTO userSymptoms (username,symptom) VALUES ( '$name'  ,'$sy')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>