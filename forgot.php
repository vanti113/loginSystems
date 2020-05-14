<?php

print <<< _html_form_

<!DOCTYPE html>
<html lang="en" class="entire">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>informations</title>
    <link
      rel="stylesheet"
      href="http://localhost:81/php/logsys/loginSystems/css/style.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
  <body class="welcome__body">
    <header class="header welcome__header forgot">
      <h1>Please insert your name!</h1>
    </header>
    <main class="forgot__main">
    <form action="http://localhost:81/php/logsys/loginSystems/main.php" method="POST" class="forgot__form">
    <div class="forgot__input">
    <label class="forgot__form_label">First Name</label>
    <input class="forgot__form_input" type="text" name="first_name"  minlength="2">
    </div>
    <div class="forgot__input">
    <label class="forgot__form_label">Last Name</label>
    <input class="forgot__form_input" type="text" name="last_name"  minlength="2">
    </div>
    <div class="forgot__input__button"><input type="submit" name="forgot" value="Find"><input type="reset" value="RESET"></div>
    </form>
    </main>

   </body>
</html>
_html_form_;
?>

