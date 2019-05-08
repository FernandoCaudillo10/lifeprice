<?php
    function getConnection($dbname = 'LifePriceDb'){
        $host = "localhost";
        $user = "root";
        $pswrd = "";
        
        //creates connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pswrd);
        
        //displays errors
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
    }
?>