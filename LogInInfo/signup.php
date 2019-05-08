<?php
include "index.html";
//colors = iris blue,black,red
?>

<!DOCTYPE html>
<html>
    <h1>Signup</h1>
     
    <div class="menu">
        <form class="newAccount" action="includesphp/sign.php" method="post">
            Username: <input type="text" name="email" placeholder="enter new username"/><br/><br/>
            Password: <input type="password" name="passwordU" placeholder="enter password" /><br/><br/>
           <button class="sub" name="signUp-submit" type="submit">Sign Up</button>
        </form>
        <style type="text/css">
                .sub{
                    color: #FFF !important;
                    text-transform: uppercase;
                    background: #60a3bc;
                    padding: 20px;
                    border-radius: 50px;
                    display: inline-block;
                    border: none;
                }
                .sub:hover {
                    text-shadow: 0px 0px 6px rgba(255, 255, 255, 1);
                    -webkit-box-shadow: 0px 5px 40px -10px rgba(0, 181, 204, 1);
                    -moz-box-shadow: 0px 5px 40px -10px rgba(0, 181, 204, 1);
                    transition: all 0.4s ease 0s;
                }
        </style>
    </div>
</html>