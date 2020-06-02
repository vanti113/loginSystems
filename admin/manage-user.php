<?php
// PDO객체는 전역변수로서 사용되던가, 인스턴스를 통해 전역에서 참조되어서 변수로 사용되어야 오류가 없다.
//함수와 함수끼리는 서로 호출이 가능하다.
session_start(); //require로서 main.php에 호출이 된다고 하더라도 이 파일에 세션이 시작되어 있어야한다.
require_once "database.php";
function show_users(){
 // global $id,$first,$last,$email,$contact,$date;
  // require_once "database.php";
 list($id,$first,$last,$email,$contact,$date) = call_users();
  
  print <<< _html_
    <!DOCTYPE html><html lang="en"><head><meta charset="UTF-8" />
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
    </head>
    <body>
    <header class="dashboard">
      <div class="dashboard__contents left">
        <i class="fas fa-bars toggle-bar"></i>
        <span class="dashboard__title">ADMIN DASHBOARD</span>
      </div>
      <div class="dashboard__contents right">
        <form action="http://localhost:81/php/logsys/loginSystems/admin/main.php" method="POST">
        <input type="submit" name="logout" value="Logout" />
        </form>
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
            <h3>> Manage Users</h3>
          </div>
          <div class="manage__board__users">
            <h3>> All User details</h3>
            <hr />
            <table class="board__users__table">
              <tr>
                <th class="table1">Sno.</th>
                <th class="table2">First Name</th>
                <th class="table3">Last Name</th>
                <th class="table4">Email id</th>
                <th class="table5">Contact No.</th>
                <th class="table6">Reg.Date</th>
                <th class="table7"></th>
              </tr>
_html_;

        for($i = 0; $i < count($id); $i++){
          print "
          <tr>  
          <td class=\"table1\">{$id[$i]}</td>
          <td class=\"table2\">{$first[$i]}</td>
          <td class=\"table3\">{$last[$i]}</td>
          <td class=\"table4\">{$email[$i]}</td>
          <td class=\"table5\">{$contact[$i]}</td>
          <td class=\"table6\">{$date[$i]}</td>
          <td class=\"table7 table__button\">
          <div class=\"form\">
          <form id=\"change_{$id[$i]}\" action=\"http://localhost:81/php/logsys/loginSystems/admin/main.php\" method=\"POST\">
          <input type=\"hidden\" name=\"change_inform\" value=\"{$email[$i]}\">
          </form>
          <button
          id=\"input1\"
          class=\"button1\"
          type=\"submit\"
          form=\"change_{$id[$i]}\"
          >
          <i class=\"fas fa-pencil-alt icon1\"></i>
          </button>
          <form id=\"delete_{$id[$i]}\" action=\"http://localhost:81/php/logsys/loginSystems/admin/main.php\" method=\"POST\">
          <input type=\"hidden\" name=\"delete_inform\" value=\"{$email[$i]}\">
          </form> 
          <button
          id=\"input2\"
          class=\"button2\"
          type=\"submit\"
          name=\"delete_user\"
          form=\"delete_{$id[$i]}\"
          >
          <i class=\"far fa-trash-alt icon2\"></i>
          </button>
          <div>
          </td>
          </tr>";
        }
          print <<< _html_
          </table></div></div></div></main><script src="http://localhost:81/php/logsys/loginSystems/admin/js/index.js"></script></body></html>
          _html_;
         
        }
        if($_SESSION['username'] === 'admin'){
          show_users();        
        }else{
          echo "<script>window.location.assign('http://localhost:81/php/logsys/loginSystems')</script>";
        }
  
        
?>