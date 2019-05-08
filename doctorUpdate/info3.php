<?php 

    include 'getDB.php';
    
    $conn = getConnection('LifePriceDb');
    $diagnosis = $_GET['diagnosis'];
    $company = $_GET['company'];

     $sql = 'SELECT diagnosis, facility, address, cost, region 
            FROM diagnosisToFacility as df 
            INNER JOIN diagnosis_table as dt 
            ON df.diag_id = dt.diag_id 
            INNER JOIN facility_table as ft ON ft.name = df.facility 
            WHERE diagnosis LIKE "%'.$diagnosis.'%" AND facility LIKE "%'.$company.'%"';
   
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo $records;
    $records = json_encode($records);
    echo $records;
    
    
?>