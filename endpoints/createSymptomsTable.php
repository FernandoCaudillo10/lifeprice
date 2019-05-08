<?php
    require_once('./dbConn.php');
    
    $db = getConnection();
    
    $arr = $_GET["data"];
    foreach ($arr as $val){
        $sql ="SELECT name FROM symptoms WHERE name = :name";
       
        $stmt = $db->prepare($sql);
        $stmt->execute( array (":name" => $val));
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(count($records) == 0){
            $sql ="INSERT INTO symptoms (name) VALUES (:name)";
            $stmt = $db->prepare($sql);
            echo $val;
            $stmt->execute( array (":name" => $val) );
        } 
    }
?>