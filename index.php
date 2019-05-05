<?php
    session_start();
    if(!isset($_SESSION['access_token'])){
        header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login with google</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        test success<br>
        <form>
            <input type="button" onclick="myFunction()" value="Logout"/>
        </form>

        <div class ="container" style="margin-top: 100px">
            <div class="row justify-content-center">
                <div class="col-md-3" align="center">
                  
                </div>
             
                </div>
                
            </div>
        </div>
    <script>
    function myFunction() {
      window.location.replace("logout.php");
    }
  
    </script>
    </body>
</html>