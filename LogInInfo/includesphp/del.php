<?php
include "../getDbconnect.php";

if(isset($_POST["signDel"])){
    $conn = getDataBaseConnection("lifePriceData");
    $username = $_POST["email"];
    $password = $_POST["passwordU"];
    if(empty($username) || empty($password)){
        header("Location: ../deleteAccount.php?error=emptyfields");
        exit();
    }
    
    $options = [
    'cost' => 11,
    //'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    //'salt' => generateBase62String(22),
    ];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

    $sql = "SELECT * FROM userLoginInfo " .
       "WHERE email = :username ";

    $stmt = $conn->prepare($sql);
    $stmt->execute(array (":username" => $username));
    $record = $stmt->fetch();
    $isAuthenticated = password_verify($password, $record["password"]);

    $use = json_encode($record);
    
    $someArray = json_decode($use, true);
    if($isAuthenticated){
        $id = $someArray[0];
        
        $sql = "DELETE FROM userLoginInfo WHERE Id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        header("Location: ../index.php?delete=success");
        exit();
    }
    else{
        header("Location: ./index.php?error=noAcc");
        session_destroy();
        exit();
    }
    

    
}


?>