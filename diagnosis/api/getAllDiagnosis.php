<?php
    require_once('../../enpoints/dbConn.php');
    
    $db = getConnection();
    
    $sql ="SELECT diagnosis FROM diagnosis_table";
   
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>