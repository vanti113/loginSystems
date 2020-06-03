<?php
session_start();

function logout(){

  print <<<_html_
  <!DOCTYPE html>
  <html lang="en" class="entire">
  <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="refresh" content="3;url=http://localhost:81/php/logsys/loginSystems/index.php">
  <title>Good bye</title>
  <link
  rel="stylesheet"
  href="http://localhost:81/php/logsys/loginSystems/css/style.css"/>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  </head>
  <body class="welcome__body">
  <header class="header welcome__header">
  <h1>I had a great time meeting you!</h1>
  </header>
  <main class="welcome__main">
  <div class="welcome__message">
  <span>Good bye! $_SESSION[id]!</span>
  </div>
  </main>
  <footer class="welcome__logout">
  </footer>
  </body>
  </html>
  _html_;

}
if(is_null($_SESSION['id'])){
   echo "<script>window.location.assign('http://localhost:81/php/logsys/loginSystems')</script>";
}else{
  logout();
}
  
  ?>