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
                $varified = check_adminId($admin_data, $inputs);
                var_dump($varified);
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
        
        if($_POST['change_pass']){
             
            list($inputs, $errors)= validate_data();
             var_dump($inputs);
             if($errors){
                 print "<script>alert('Please insert your password correctly!')</script>";
                    print "<script>history.back();</script>";
             }
             else{
                 require_once "database.php";
                 $adminInfo = call_admin();
                 require_once "validate_user.php";
                 $varified = check_adminPass($inputs, $adminInfo);   
                 if(!$varified){
                    print "<script>alert('Invalid Old Password!')</script>";
                    print "<script>history.back();</script>";
                 }   
                 else{
                    //데이터 도달 확인
                    //활용해야 할 데이터는 inputs['']
                    if(!($inputs['new_pass'] === $inputs['re_pass'])){
                        print "<script>alert('New Password and Re Password is not same!')</script>";
                        print "<script>history.back();</script>";
                    }
                    else{// 새로운 패스워드들의 내용이 같다면 데이터베이스로 진행
                        $new_Password = password_hash($inputs['new_pass'], PASSWORD_DEFAULT);
                        require_once "database.php";
                        $result = update_pass($new_Password);
                        if($result === 1){
                            print "<script>alert('Password is changed Successfully!')</script>";
                            print "<script>history.back();</script>";
                        }else{
                            print "<script>alert('Your Password is invalid...sorry')</script>";
                            print "<script>history.back();</script>";
                        }
                    }
                 }
             }
        }

        if($c_inform = $_POST['change_inform']){
            require_once "database.php";
            require_once "update-profile.php";
            
            $user_info = find_user($c_inform);
            show_page($user_info);
        }

        if($_POST['update-profile']){
            list($inputs, $errors) = validate_data();
            //var_dump($inputs);
            require_once "database.php";

            $result = update_user_inform($inputs);
            if($result){
                print "<script>alert(\"User Information is changed!\");</script>";
                print "<script>location.href=\"http://localhost:81/php/logsys/loginSystems/admin/manage-user.php\";</script>";
            }else{
                print "<script>alert(\"Invalid Information!\");</script>";
                print "<script>history.back();</script>";            
            }
        }

        if($d_inform = $_POST['delete_inform']){
           require_once "database.php";
           $result = delete_user($d_inform);
           if($result){
                print "<script>alert('User info is deleted')</script>";
                print "<script>location.href=\"http://localhost:81/php/logsys/loginSystems/admin/manage-user.php\"</script>";
           }else{
                print "<script>alert('It's not working....sorry!')</script>";
           }    print "<script>history.back()</script>";
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
        
        if($_POST['admin_login']){
            $inputs['id'] = htmlentities(trim($_POST['admin_id']));
        
            if(is_null($inputs['id']) || strlen($inputs['id']) === 0){
                $errors[] = "Invalid username or password";
            }
        
            $inputs['password'] = htmlentities(trim($_POST['admin_password']));
            if(is_null($inputs['password']) || strlen($inputs['password']) === 0){
                $errors[] = "Invalid username or password";   
            }
        }
        
        if($_POST['change_pass']){
            $inputs['old_pass'] = htmlentities(trim($_POST['old_pass']));
            if(is_null($inputs['old_pass']) || strlen($inputs['old_pass']) === 0){
                $errors[] = "Please insert your password correctly!";
            }  

            $inputs['new_pass'] = htmlentities(trim($_POST['new_pass']));
            if(is_null($inputs['new_pass']) || strlen($inputs['new_pass']) === 0){
                $errors[] = "Please insert your password correctly!";
            }
        
            $inputs['re_pass'] = htmlentities(trim($_POST['re_pass']));
            if(is_null($inputs['re_pass']) || strlen($inputs['re_pass']) === 0){
                $errors[] = "Please insert your password correctly!";
            }

        }

        if($_POST['update-profile']){
            $inputs['update_first'] = htmlentities(trim($_POST['first']));
            if(is_null($inputs['update_first']) || strlen($inputs['update_first']) === 0){
                $errors[] = "Please insert your information correctly!";
            }

            $inputs['update_last'] = htmlentities(trim($_POST['last']));
            if(is_null($inputs['update_last']) || strlen($inputs['update_last']) === 0){
                $errors[] = "Please insert your information correctly!";
            }

            $inputs['update_contact'] = htmlentities(trim($_POST['contact']));
            if(is_null($inputs['update_contact']) || strlen($inputs['update_contact']) === 0){
                $errors[] = "Please insert your information correctly!";
            }
            $inputs['update_email'] = $_POST['email'];
        }
        
        return array($inputs, $errors);
    }
?>    
    
    