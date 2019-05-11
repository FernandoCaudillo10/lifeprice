<?php
    require_once('../dbConnec.php');
    
    $conn = getConnection();
    $city = $_GET["city"];
    $diagnosis = $_GET["diagnosis"];
    
    $sql = 'SELECT df.diagnosis, facility, address, cost, region 
            FROM diagnosistofacility as df 
            INNER JOIN diagnosis_table as dt 
            ON df.diagnosis = dt.diagnosis 
            INNER JOIN facility_table as ft ON ft.name = df.facility 
            WHERE df.diagnosis LIKE "%'.$diagnosis.'%" AND region LIKE "%'.$city.'%"';
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>