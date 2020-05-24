<?php
// 주요한 처리가 이루어질 예정

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['admin_login']){
              list($inputs, $errors) = validate_data();
            //데이터 전달 확인 완료
            if($errors){
                print "<script>alert('Invalid id or password')</script>";
                print "<script>history.back();</script>";
            }else{
                require_once "database.php";
                $admin_data = call_admin();

                require_once "validate_user.php";
                $varified = check_admin($admin_data, $inputs);

                if($varified){
                   // require_once "database.php";
                    echo "<script type=\"text/javascript\"> location.href=\"http://localhost:81/php/logsys/loginSystems/admin/manage-user.php\" </script>";
                   // require_once "manage-user.php";
                    //처리가 되어 넘어온 데이터들은 전역변수
                   // list($id,$first,$last,$email,$contact,$date) = call_users();
                   
                }else{
                    print "<script>alert('Invalid id or password')</script>";
                    print "<script>history.back();</script>";
                }
           }
        }

    }     
/* 
    require_once "database.php";
    require_once "manage-user.php";
     //처리가 되어 넘어온 데이터들은 전역변수
    list($id,$first,$last,$email,$contact,$date) = call_users(); //
    // show_users($id);
    show_users(); */ 
    
    
    function validate_data(){
        $inputs = array();
        $errors = array();
        
        $inputs['id'] = htmlentities(trim($_POST['admin_id']));
        
        if(is_null($inputs['id']) || strlen($inputs['id']) === 0){
            $errors[] = "Invalid username or password";
        }
        
        $inputs['password'] = htmlentities(trim($_POST['admin_password']));
        if(is_null($inputs['password']) || strlen($inputs['password']) === 0){
            $errors[] = "Invalid username or password";   
        }

        return array($inputs, $errors);
    }
    
    
    ?>