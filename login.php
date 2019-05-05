<?php 
    require_once "config.php";
       if(isset($_SESSION['access_token'])){
        header('Location: index.php');
    }

    $loginURL = $gClient->createAuthUrl();
    
    
      /*
                <img src="<?php //echo $_SESSION['pitcure']?>">
               <div class="col-md-9" align="center">
                   <table class="table table-hover table-bordered">
                      <tbody>
                          <tr>
                              <td>ID</td>
                              <td><?php echo $_SESSION['id']?></td>
                          </tr>
                           <tr>
                              <td>First Name</td>
                              <td><?php echo $_SESSION['givenName']?></td>
                          </tr>
                           <tr>
                              <td>Last Name</td>
                              <td><?php echo $_SESSION['familyName']?></td>
                          </tr>
                           <tr>
                              <td>Email</td>
                              <td><?php echo $_SESSION['email']?></td>
                          </tr>
                           <tr>
                              <td>Gender</td>
                              <td><?php echo $_SESSION['gender']?></td>
                          </tr>
                      </tbody>
                   </table>
    
    */
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login with google</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class ="container" style="margin-top: 100px">
            <div class="row justify-content-center">
                <div class="col-md-6 col-offset-3" align="center">
                    <form>
                        <input placeholder="Email" name="email" class="form-control"/><br>
                        <input type="password" placeholder="Password" name="password" class="form-control"/><br>
                        <input type="submit" value="Log In" class="btn btn-primary"/>
                        <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" class="btn btn-danger"/>
                    </form>
                </div>
                
            </div>
        </div>

    </body>
</html>