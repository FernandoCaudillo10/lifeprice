<!DOCTYPE html>
<html>
    <head>
        <title>LifePrice</title>
        <link rel="stylesheet" href="../static/stylesLog.css" type="text/css" />
        
    </head>
    <body>
        <header>
            <div id="pageTitle">
                <a href="/" class="removeLinkDecor"><h1>LifePrice</h1></a>
            </div>
        
            <div id="pageMenu">
               <a href="../symptoms/index.html" class="pageMenuItem removeLinkDecor"> <div>Symptoms</div></a>
                <a href="../diagnosis/index.html" class="pageMenuItem removeLinkDecor"><div>Diagnostics</div></a>
                <a href="../login/login.php" class="pageMenuItem removeLinkDecor"><div>Doctor - Log In</div></a>
               
                <form action="includesphp/logOut.php" method="post">
                <button class="doc" name="logOut">Logout</button>
                </form>
            </div>
            
        </header>
        <main>
            <style type="text/css">
                .doc{
                    color: #fff !important;
                    text-transform: uppercase;
                    background: #60a3bc;
                    padding: 20px;
                    border-radius: 50px;
                    display: inline-block;
                    border: none;
                }
                .doc:hover {
                    text-shadow: 0px 0px 6px rgba(255, 255, 255, 1);
                    -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
                    -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
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