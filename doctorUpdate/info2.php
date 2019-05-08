<?php 

    include 'getDB.php';
    
    require_once "../login/config.php";
    
     $conn = getConnection('LifePriceDb');
    
    
    if(isset($_SESSION['access_token']))
        $gClient->SetAccessToken($_SESSION['access_token']);
    
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    //ST JOSEPH HOSPITAL
    $_SESSION['email'] = $userData['email'];

    $email =  $_SESSION['email'];
    $sql ="SELECT * FROM doctors WHERE email = :email";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute( array (":email" => $email));
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo $records;
    $records = json_encode($records);
    echo $records;
    
    
?>