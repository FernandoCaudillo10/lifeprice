<?php
session_start();
echo $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LifePrice</title>
        <link rel="stylesheet" href="../static/stylesLog.css" type="text/css" />
        
    </head>
    <body>
        <header>
            <div id="pageTitle">
                <a href="../index.php" class="removeLinkDecor"><h1>LifePrice</h1></a>
            </div>
        
            <div id="pageMenu">
               <a href="../symptoms/index.php" class="pageMenuItem removeLinkDecor"> <div>Symptoms</div></a>
                <a href="../diagnosis/index.php" class="pageMenuItem removeLinkDecor"><div>Diagnostics</div></a>
                <a href="../login/login.php" class="pageMenuItem removeLinkDecor"><div>Doctor - Log In</div></a>
               
                <form action="includesphp/logOut.php" method="post">
                <button class="doc" name="logOut">Logout</button>
                </form>
            </div>
            
        </header>
        <main>
            <style type="text/css">
                .doc{
                    color: #FFF !important;
                    text-transform: uppercase;
                    background: #990000;
                    padding: 20px;
                    border-radius: 50px;
                    display: inline-block;
                    border: none;
                }
                .doc:hover {
                    text-shadow: 0px 0px 6px rgba(255, 255, 255, 1);
                    -webkit-box-shadow: 0px 5px 40px -10px rgba(219, 10, 91, 1);
                    -moz-box-shadow: 0px 5px 40px -10px rgba(219, 10, 91, 1);
                    transition: all 0.4s ease 0s;
                }
            </style>
        </main>
        <footer class="footer">
            <div>LifePrice &copy; 2019</div>
            <div>F. Caudillo | C. Aldrete | G. Cerna | A. Gonzalez</div>
        </footer>
    </body>
</html>