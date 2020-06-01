<?php
   if($_SERVER['REQUEST_METHOD'] =="POST"){
       var_dump($_POST['test']);
       var_dump($_POST['id']);
       if($_POST['test'] == ""){
           print "fuck";
       }
   }
    else{
        print <<< _html_
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link
            rel="stylesheet"
            href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
            crossorigin="anonymous"/>
            </head>
            <body>
            <form id="form1" action="http://localhost:81/php/logsys/loginSystems/admin/test.php" method="POST">
            <input type="hidden" name="test">
            <input type="hidden" name="id" value="01">
            </form>
            <button form="form1" type="submit"><i class="fas fa-pencil-alt icon1"></i></button>
            </body>
            </html>
        _html_ ;
    }
  


?>
