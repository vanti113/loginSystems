<?php
session_start();

//서버측으로 보내지는 리퀘스트메소드의 형식이 무엇인가에 따라 처리가 나눠진다.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //회원가입시 처리구문
    if ($_POST['signin']) {

        //list로 분리된 배열, inputs는 연관배열, errors는 인덱스배열
        list($inputs, $errors) = validate_form();
       
        
        if ($errors) {
            //에러가 있다면 준비한 폼에 에러메세지를 전송하고 출력시킨다.
            require_once "errors.php";
            errors_process($errors);
        } else { //에러가 없다면 검증된 데이터를 데이터베이스에 저장하는 작업을 시작한다.

            require_once "password_hash.php";
            $validated_pass = hash_pass($inputs['password']);
            require_once "use_database.php";
            $temp = insert_db($inputs, $validated_pass);
            

            if (is_int($temp)) {
                //print "OK"; 데이터가 정상적으로 데이터베이스에 반영되면, 반영한 로우의 갯수를 반환
                
                // print <<< _html_
                // <html><head></head><body><script>alert("Thank you for your Sign up!");
                // window.location.replace('http://localhost:81/php/logsys/loginSystems/index.php');</script></body></html>
                // _html_;
            }
        }
    }
    //로그인시 처리구문
    if ($_POST['login']) {
        list($inputs, $errors) = validate_form();
      
        if ($errors) {
            //에러가 있다면 준비한 폼에 에러메세지를 전송하고 출력시킨다.
            require_once "errors.php";
            errors_process($errors);
        } else { //에러가 없다면 검증된 데이터를 데이터베이스에 조회하는 작업을 시작한다.
            $submitted_password = $inputs['password']; //제출된 암호
            $submitted_email = $inputs['email'];// 제출된 이메일

            require_once "use_database.php";
            if (!$result= lookup_db($submitted_email)) {// 제출된 이메일을 데이터 베이스에서 조회.
                //만약 이메일이 없다면 에러메세지를 출력한다.
                require_once "errors.php";
                $errors = array("Please check your information!");
                errors_process($errors);
            } else { //제출한 이메일이 데이터베이스에 있다면 아래의 구문을 실행
                //사용자가 제출한 암호를 데이터베이스의 해쉬화된 암호와 비교
                require_once "password_hash.php";
                if (!password_verifying($submitted_password, $result)) {
                    require_once "errors.php";
                    $errors = array("Please check your information!");
                    errors_process($errors);
                } else {
                    require_once "use_database.php";
                    $_SESSION['id'] = find_name($submitted_email);
                    require_once "welcome.php";
                }
            }
        }
    }
    if ($_POST['logout']) {
        require_once "logout.php";
    }

    //이메일 재확인 절차의 코드
    if ($_POST['forgot']) {
        list($inputs, $errors) = validate_form();
        if ($errors) {
            //에러가 있다면 준비한 폼에 에러메세지를 전송하고 출력시킨다.
            require_once "errors.php";
            errors_process($errors);
        } else {//에러가 없다면 사용자가 등록한 이메일을 보여준다.
            $first_name = $inputs['first_name'];
            $last_name = $inputs['last_name'];
            require_once "use_database.php";
           
            //함수의 호출로서 반환된 이메일을 처리할것.
            if (!$queried_email = find_email($first_name, $last_name)) {
                $error_messages = ['Please insert your name correctly!'];
                require_once "errors.php";
                errors_process($error_messages);
            } else {
                // var_dump($queried_email); 데이터 도달 확인함.
                require_once "show_email.php";
                show_email($queried_email);
            }
        }
    }
} else { //get방식일 경우의 처리
}
function validate_form()
{ //POST방식으로 전송된 폼데이터를 검증한다.
    $inputs = array();
    $errors = array();
    var_dump($_POST);
    if ($_POST['signin']) {
        if (!$_POST['first_name']) {
            $errors[] = "Please insert your First name correctly";
        } else {
            $inputs['first_name'] = htmlentities(trim($_POST['first_name']));
        }
        // if ($_POST['last_name']) {
        //     $inputs['last_name'] = htmlentities(trim($_POST['last_name'])) ?? '';
        //     var_dump($inputs['last_name']);
        //     if (strlen($inputs['last_name']) == 0) {
        //         $errors[] = "Please insert your Last name correctly";
        //     }else{}
        // }
        if (!$_POST['last_Name']) {
            $errors[] = "Please insert your Last name correctly";
        } else {
            $inputs['last_Name'] = htmlentities(trim($_POST['last_name']));
        }

        if (!$_POST['email']) {
            $errors[] = "Please insert your email address correctly";
        } else {
            $inputs['email'] = htmlentities(trim($_POST['email']));
        }
         
        if (!$_POST['password']) {
            $errors[] = "Please insert your Password correctly";
        } else {
            $inputs['password'] = htmlentities(trim($_POST['password']));
        }
      
        if (!$_POST['contact']) {
            $errors[] = "Please insert your Contact Numbers correctly";
        } else {
            $inputs['contact'] = htmlentities(trim($_POST['contact']));
        }
    }
    //밑의 검증 함수에서는 데이터가 있을 경우에는 검증을 하고 없다면 검증하지 않는다.
    //따라서 위의 회원가입 부분과 로그인 부분에서 융통성있게 사용이 가능.
    //검증 절차는 화이트스페이스 제거와 크로싱사이트 공격을 막기위한 문자변환, 공백으로 입력하지 못하도록
    //문자열 갯수의 검증등이 있다.
    if ($_POST['login']) {
        if (!$_POST['email']) {
            $errors[] = "Please insert your email address correctly";
        } else {
            $inputs['email'] = htmlentities(trim($_POST['email'])) ?? '';
        }
                
        if (!$_POST['password']) {
            $errors[] = "Please insert your Password correctly";
        } else {
            $inputs['password'] = htmlentities(trim($_POST['password'])) ?? '';
        }
    }
    return array($inputs, $errors);
}
