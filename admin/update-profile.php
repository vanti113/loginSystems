<?php

function show_page($user_info)
{   
    print <<<_html_
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="http://localhost:81/php/logsys/loginSystems/admin/css/style.css"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <style></style>
    </head>
    <body>
    <header class="dashboard">
      <div class="dashboard__contents left">
        <i class="fas fa-bars toggle-bar"></i>
        <span class="dashboard__title">ADMIN DASHBOARD</span>
      </div>
      <div class="dashboard__contents right">
        <input type="submit" name="" value="Logout" />
      </div>
    </header>
    <main class="manage">
      <div class="manage__contents left">
        <div class="manage__profile">
          <div class="manage__icon">
            <i class="fas fa-tools"></i>
          </div>
          <div class="manage__title">admin</div>
        </div>
        <div class="manage__menu">
          <ul class="menu__list">
            <a
              href="http://localhost:81/php/logsys/loginSystems/admin/change-password.php"
            >
              <li class="menu__list__sub">
                <i class="fas fa-file"></i>
                Change Password
              </li>
            </a>
            <a
              href="http://localhost:81/php/logsys/loginSystems/admin/manage-user.php"
            >
              <li class="menu__list__sub">
                <i class="fas fa-users"></i>
                Manage Users
              </li>
            </a>
          </ul>
        </div>
      </div>

      <div class="manage__contents right">
        <div class="manage__board">
          <div class="manage__board__title">
            <h3>> users Information</h3>
          </div>
          <div class="manage__board__users password">
            <form action="http://localhost:81/php/logsys/loginSystems/admin/main.php" method="POST">
              <ul>
                <li class="password-stuff">
                  <span>First Name</span>
                  <input class="pass_input" type="text" name="first" value="$user_info[first]"/>
                </li>
                <li class="password-stuff">
                  <span>Last Name</span>
                  <input class="pass_input" type="text" name="last" value="$user_info[last]"/>
                </li>
                <li class="password-stuff">
                  <span>Email</span>
                  <input id="password_email" class="pass_input" name="email" type="email" value="$user_info[email]" readonly />
                </li>
                <li class="password-stuff">
                  <span>Contact no.</span>
                  <input class="pass_input" type="text" name="contact" value="$user_info[contact]"/>
                </li>
                <li class="password-stuff">
                  <span>Registration Date</span>
                  <input id="password_date" class="pass_input" type="text" value="$user_info[date]" readonly />
                </li>
                <li class="password-stuff button">
                  <input type="submit" name="update-profile" value="Update" />
                </li>
              </ul>
            </form>
          </div>
        </div>
      </div>
    </main>
    <script src="http://localhost:81/php/logsys/loginSystems/admin/js/index.js"></script>
    </body>
    </html>
_html_;
}


