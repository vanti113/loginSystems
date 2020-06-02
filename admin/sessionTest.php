<?php 
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        if($_POST['LogOut']){
            unset($_SESSION['username']);
            print "이용해 주셔서 감사합니다.";            
        }else{
            list($input, $error) = validate_form();
            if($error){
                show_form($error);
            }
            else{
                process_form($input);
            }    
        }
    }else{
            show_form();
        }
        

    function show_form($error = array()){
        if($error){
            $errorHtml = '<ul><li>';
            $errorHtml .= implode("</li><li>", $error);
            $errorHtml .= '</li></ul>';
            
        }else{
            $errorHtml = '';
        }

        print <<<_html_
        <form action="$_SERVER[PHP_SELF]" method="POST">
        ID : <input type="text" name="id">
        PASSWORD : <input type="text" name="pass">
        <input type="submit" value="SUBMIT">
        <input type="reset" value="RESET">
        </form>
        _html_;
        print $errorHtml;
    }

    function process_form($input){
       
        $_SESSION[$username] = $input['username'];
        print "안녕하세요, $_SESSION[$username]";
        
        print <<<_html_
        <form action="$_SERVER[PHP_SELF]" method="POST">
        <input type="submit" name="logout" value="LogOut">
        </form>
        _html_;
    
    }


    function validate_form(){
        $input = array();
        $error = array();

        $users = array('vanti' => 'angels', 'baekigun1' => 'angels');
        $input['username'] = $_POST['id'];
        if(!array_key_exists( $input['username'], $users)){
            $error[] = "올바른 아이디와 비밀번호를 입력하세요.";
        }else{
            $saved_password = $users[$_POST['id']];
            $submitted_password = $_POST['pass']??'';
            if($saved_password !== $submitted_password){
                $error[] = "올바른 아이디와 비밀번호를 입력하세요.";
            }
        }
        return array($input, $error);
    }

?>