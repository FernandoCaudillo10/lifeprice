<?php
    session_start();
    session_destroy();
    // echo $_SESSION['username'];
    include "index.html";
    require_once "config.php";
       if(isset($_SESSION['access_token'])){
        header('Location: ../index.html');
    }

    $loginURL = $gClient->createAuthUrl();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login with google</title>
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    
    </head>
    <body>
        
        <div class ="container" style="margin-top: 100px">
            <div class="row justify-content-center">
                <div class="col-md-6 col-offset-3" align="center">
                    <form>
                        <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" class="btn btn-danger"/>
                    </form>
                </div>
                
            </div>
        </div>

    </body>
</html>