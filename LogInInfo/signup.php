<?php
include "index.html";
?>

<!DOCTYPE html>
<html>
    <h1>Signup</h1>
     
    <div class="menu">
        <form class="newAccount" action="includesphp/sign.php" method="post">
            Username: <input type="text" name="email" placeholder="enter new username"/><br/><br/>
            Password: <input type="password" name="passwordU" placeholder="enter password" /><br/><br/>
           <button name="signUp-submit" type="submit">Sign Up</button>
        </form>
    </div>
</html>