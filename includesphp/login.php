<?php
include "../getDbconnect.php";
if(isset($_POST["signIn"])){
    $conn = getDataBaseConnection("lifePriceData");
    $username = $_POST["email"];
    $password = $_POST["password"];
    if(empty($username) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    session_start();
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

    
    if($isAuthenticated){
        $_SESSION['username'] = $record['username'];
        header("Location: ../members.php?succezs=logged");
        exit();
    }
    else{
        header("Location: ../index.php?error=failedLogin");
        exit();
    }
}

?>