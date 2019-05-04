<?php
//echo "pew";
include "../getDbconnect.php";

if(isset($_POST["signUp-submit"])){
    $conn = getDataBaseConnection("lifePriceData");
    $username = $_POST["email"];
    $password = $_POST["passwordU"];
    if(empty($username) || empty($password)){
        header("Location: ../signup.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT email FROM userLoginInfo WHERE email=:username";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array (":username" => $username));
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $records;
        $records = json_encode($records);
       // echo $records;
        $stuff = json_decode($records, true);
        //$usernamecheck = mysql_query($sql, $conn);
        if(!empty($stuff)){
            header("Location: ../signup.php?error=emailTaken");
            exit();
         }
    }
    
    $options = [
    'cost' => 11,
    //'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    //'salt' => generateBase62String(22),
    ];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

   
    $sql = "INSERT INTO userLoginInfo (email, password) " .
    "VALUES (:email, :password)";
 
    $stmt = $conn->prepare($sql);
    $stmt->execute( array (":email" => $username,
    ":password" => $hashed_password));
    header("Location: ../index.php?signup=success");
    exit();
    
}



?>