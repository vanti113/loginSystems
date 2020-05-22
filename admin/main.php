<?php
// 주요한 처리가 이루어질 예정
/* 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['admin_login']){
            require_once "database.php";
            list($id,$first,$last,$email,$contact,$date) = call_users();
            require_once "manage-user.php";
        }

    }     
 */

    require_once "database.php";
     require_once "manage-user.php";
    list($id,$first,$last,$email,$contact,$date) = call_users();
    
    main_page();
            

?>