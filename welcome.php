<?php

print <<< _html_form_

<!DOCTYPE html>
<html lang="en" class="entire">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>
    <link
      rel="stylesheet"
      href="http://localhost:81/php/logsys/loginSystems/css/style.css"
    />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
  <body class="welcome__body">
    <header class="header welcome__header">
      <h1>Thank you for your visit!</h1>
    </header>
    <main class="welcome__main">
    <div class="welcome__message">
    <span>$_SESSION[id]! <br/>I'm happy to meet you.<br/>This page is sample..but i'll make a new one!</span>
    </div>
    </main>
     <footer class="welcome__logout">
     <form action="http://localhost:81/php/logsys/loginSystems/main.php" method="POST">
    <input type="submit" class="welcome__button" name="logout" value="Log Out">
    </form>
    </footer>
   </body>
</html>
_html_form_;
