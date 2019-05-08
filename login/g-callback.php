<?php
    require_once "config.php";
    
    
    
    if(isset($_SESSION['access_token']))
        $gClient->SetAccessToken($_SESSION['access_token']);
    else if(isset($_GET['code'])){
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
    }else{
        //relocate
        header('Location: login/login.php'); 
        exit();

    }
    
    
    
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    
   // echo"<pre>"; can be pushed to data base
    //var_dump($userData);
    $_SESSION['id'] = $userData['id'];
    $_SESSION['email'] = $userData['email'];
    $_SESSION['gender'] = $userData['gender'];
    $_SESSION['picture'] = $userData['picture'];
    $_SESSION['familyName'] = $userData['familyName'];
    $_SESSION['givenName'] = $userData['givenName'];
     
    //relocate
    header('Location: index.html'); 
    exit();

?>