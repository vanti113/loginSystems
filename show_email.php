<?php
function show_email($email)
{
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
  <h1>Here is your Information!</h1>
  </header>
  <main class="show_main">
  <div class="show_email">
  <span>Your e-mail : </span><br/><br/>
  _html_form_;
    foreach ($email as $key => $value) {
        print "<span>No.".($key+1)." : "."{$value}<br/>";
    }
    print <<< _html_
  </div>
  </main>
  </body>
  </html>
  _html_;
}
