<?php

print <<< _html_form_

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logging System</title>
    <link
      rel="stylesheet"
      href="http://localhost:81/php/logsys/loginSystems/css/style.css"
    />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script>
      function openScreen(evt, Func) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(Func).style.display = "block";
        evt.currentTarget.className += " active";
      }
      window.onload = function () {
        openScreen(event, "Log");
      };
    </script>
  </head>
  <body>
    <header class="header">
      <h1>LogSystem&Admin</h1>
    </header>
    <main class="contents">
      <div class="tab">
        <button class="tablinks" onclick="openScreen(event, 'Sign')">
          Signin
        </button>
        <button class="tablinks" onclick="openScreen(event, 'Log')">
          Login
        </button>
        <button class="tablinks" onclick="openScreen(event, 'Adm')">
          Admin
        </button>
      </div>
      <div class="contents__sub">
        <div id="Sign" class="tabcontent Signin">
          <form action="http://localhost:81/php/logsys/loginSystems/main.php" method="POST" class="sign">
            <ul class="sign__list">
              <li class="sign__items form_items">
                <span class="sign__title">First Name</span>
                <input type="text" name="first_name" minlength="2"/>
              </li>
              <li class="sign__items form_items">
                <span class="sign__title">Last Name</span>
                <input type="text" name="last_name" minlength="2"/>
              </li>
              <li class="sign__items form_items">
                <span class="sign__title">E-mail</span>
                <input type="email" name="email" minlength="4"/>
              </li>
              <li class="sign__items form_items">
                <span class="sign__title">Password</span>
                <input type="password" name="password" minlength="4">
              </li>
              <li class="sign__items form_items">
                <span class="sign__title">Contact Number</span>
                <input type="text" name="contact" minlength="10"/>
              </li>
              <li class="sign__items__buttons">
                <input type="submit" name="signin" value="Sign up" />
                <input type="reset" value="RESET" />
              </li>
            </ul>
          </form>
        </div>
        <div id="Log" class="tabcontent Signin Login">
          <form action="http://localhost:81/php/logsys/loginSystems/main.php" method="POST" class="sign">
            <ul class="sign__list">
              <li class="sign__items form_items">
                <span class="sign__title">Your email</span>
                <input type="email" name="email" />
              </li>
              <li class="sign__items form_items">
                <span class="sign__title">Password</span>
                <input type="password" name="password" />
              </li>
              <li class="sign__items__buttons">
                <input type="submit" name="login" value="Log in" />
                <input type="reset" value="RESET" />
              </li>
              <li class="sign__items log__reset">
                <a href="http://localhost:81/php/logsys/loginSystems/forgot.php">
                <span class="sign__title">forgot email</span></a>
                <span class="sign__title">|</span>
                <span class="sign__title">forgot Password</span>
              </li>
            </ul>
          </form>
        </div>
        <div id="Adm" class="tabcontent Signin Admin">
         <form action="http://localhost:81/php/logsys/loginSystems/admin/main.php" method="POST" class="sign">
            <ul class="sign__list">
              <li class="sign__items form_items">
                <span class="sign__title">Adminstrator</span>
                <input type="text" name="admin_id" minlength="2"/>
              </li>
              <li class="sign__items form_items">
                <span class="sign__title">Password</span>
                <input type="password" name="admin_password" minlength="2"/>
              </li>
              <li class="sign__items__buttons">
                <input type="submit" name="admin_login" value="Log in" />
                <input type="reset" value="RESET" />
              </li>

            </ul>
          </form> 
        </div>
      </div>
    </main>
  </body>
</html>


_html_form_;
