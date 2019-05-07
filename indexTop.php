<?php
 session_start();

// if (!isset($_SESSION['username'])){
//   header("Location: index.php");
// }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LifePrice</title>
        <style rel="stylesheet" href="css/styles.css"></style>
    </head>
<body>
    
    
    <div class="menu">
        <form class="signinArea" action="includesphp/login.php" method="post">
          Username: <input type="text" name="email" placeholder="enter email"/> 
          Password: <input type="password" name="password" placeholder="enter password" />
          <button name="signIn">Sign in</button>
          <a href="signup.php">Sign Up</a>
        </form>
        
        
        
        <form action="includesphp/logOut.php" method="post">
           <button name="logOut">logout</button>
        </form>
    </div>    

    </body>
    <script type="text/javascript"></script>
</html>