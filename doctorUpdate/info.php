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
    $_SESSION['familyName'] = $userData['familyName'];
    $_SESSION['givenName'] = $userData['givenName'];
    $company = $_POST['company'];
    
    $name = $_SESSION['givenName'].' '.$_SESSION['familyName'];
   
    $email =  $_SESSION['email'];
    $sql ="INSERT INTO doctors (name, email, company) VALUES (:name, :email, :company)";
    //relocate
    $stmt = $conn->prepare($sql);
    $stmt->execute( array (":name" => $name,":email" => $email,":company" => $company));
    
?>