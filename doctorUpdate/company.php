<!DOCTYPE html>
<html>
    <head>
        <title>Add company</title>
        <link rel="stylesheet" href="../static/main.css" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../static/main.css" type="text/css" />
       
    </head>
    
    <body>
          
          <header>
            <div id="pageTitle">
                <a href="index.php" class="removeLinkDecor"><h1>LifePrice</h1></a>
            </div>
             <div id="pageMenu">
                <a href="../logout/logout.php" class="pageMenuItem removeLinkDecor"><div>Logout</div></a>
             </div>
            
          </header>

    <form id="frm1">
      Enter company name: <input type="text" id = "company" name="company" value=""> 
      <br><br>
      Enter diagnosis: <input type="text" id = "diagnosis" name="diagnosis" value=""> 
      <input type="button" onclick="func2()" value="Submit">
    </form> 
       
    <div id="info">
        
    </div>
       
    <footer class="footer">
        <div>LifePrice &copy; 2019</div>
        <div>F. Caudillo | C. Aldrete | G. Cerna | A. Gonzalez</div>
    </footer>
    </body>
    
     <script>
    function func() {
    //console.log($('#company').val());
          $.ajax({
                type:"POST",
                url: "info.php",
                data: {
                    "company" : $('#company').val()
                },
                error: function(err) {
                    console.log("Houston, we have a problem!")
                    console.log(arguments);
                },
            });
    }
    
      function func2() {
     $.ajax({
                type:"GET",
                url: "info2.php",
                dataType: "json",
                data: {},
                success: function(data, status) {
                  if(data == false)
                  {
                      func();
                  }
                 
                 func3();
                },
                error: function(err) {
                    console.log("Houston, we have a problem!")
                    console.log(arguments);
                },
         
            });
    }
   
    function func3() {
    //console.log($('#company').val());
          $.ajax({
                type:"GET",
                url: "info3.php",
                dataType: "json",
                data: {"company" : $('#company').val(),
                       "diagnosis" : $('#diagnosis').val()
                },
                success: function(data, status) {
                    console.log(data);
                },
                error: function(err) {
                    console.log("Houston, we have a problem!")
                    console.log(arguments);
                },
         
            });
    }
    
    </script>
</html>

