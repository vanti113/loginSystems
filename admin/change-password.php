<?php

function show_Page()
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
            <h3>> Change password</h3>
          </div>
          <div class="manage__board__users password">
            <form
              action="http://localhost:81/php/logsys/loginSystems/admin/main.php"
              method="POST"
            >
              <ul>
                <li class="password-stuff">
                  <span>Old password</span>
                  <input
                    id="oldPass"
                    class="pass_input"
                    type="password"
                    minlength="4"
                    name="old_pass"
                  />
                </li>
                <li class="password-stuff">
                  <span>New password</span>
                  <input
                    id="newPass"
                    class="pass_input"
                    type="password"
                    minlength="4"
                    name="new_pass"
                  />
                </li>
                <li class="password-stuff">
                  <span>Confirm password</span>
                  <input
                    id="rePass"
                    class="pass_input"
                    type="password"
                    minlength="4"
                    name="re_pass"
                  />
                </li>
                <li class="password-stuff button">
                  <input type="submit" name="change_pass" value="Change" />
                </li>
              </ul>
            </form>
          </div>
        </div>
      </div>
    </main>
     <script src="http://localhost:81/php/logsys/loginSystems/admin/js/index.js"></script>
     <script src="http://localhost:81/php/logsys/loginSystems/admin/js/change-password.js"></script>
     </body>
    </html>
_html_;
}

show_page();
?>