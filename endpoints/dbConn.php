<?php
    function getConnection($dbname = 'lifePriceDb'){
        $host = "localhost";
        $username = "root";
        $password = "";
        
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
        
        //creates connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        
        //displays errors
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
    }
?>