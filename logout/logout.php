<?php 
    require_once "../login/config.php";
    unset($_SESSION['access_token']);
    $gClient->revokeToken();
    session_destroy();
    header('Location: ../login/login.php');
    exit();
?>