<?php 
    
    session_start();
    require_once "GoogleApi/vendor/autoload.php";
    //var
    $gClient = new Google_Client();
    
    $gClient->setClientId("611897826857-lqmhtgq853bpgom887bjpcidqkjo494v.apps.googleusercontent.com");
    $gClient->setClientSecret("L5hirdDAqGkSaOpDRFDJ4E6R");
    $gClient->setApplicationName("DR Login");
   $gClient->setRedirectUri("https://lifeprice.herokuapp.com/login/g-callback.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
    

?>