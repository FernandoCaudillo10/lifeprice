<?php
include "../getDbconnect.php";
if(isset($_POST["logOut"])){
    session_start();
    session_destroy();
    header("Location: ../index.php");
}
?>