<?php

try {
    $db = new PDO('mysql:host=localhost:3307;dbname=bae', 'root', '111111');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "PDO error Exception message".$e->getMessage();
}

function call_users()
{
    global $db;
    $temp = $db->query("SELECT first,last,email,contact,date FROM logsys");
    $userInfo = $temp->fetchAll(PDO::FETCH_ASSOC);
  
    require_once "processInfo.php";
    return sepArray($userInfo);
    // var_dump($userInfo);
}

function call_admin(){
	global $db;
	$temp = $db -> query("SELECT * FROM admin");
	$adminInfo = $temp -> fetch(PDO::FETCH_ASSOC);

	return $adminInfo;
}

function update_pass($hashed_new_pass){
    global $db;
    $temp = $db->exec("UPDATE admin SET password = '$hashed_new_pass' where id='admin'");
    return $temp;
}

function find_user($info){
    global $db;
    $temp = $db->query("SELECT * FROM logsys where email='$info'");
    $user_info = $temp->fetch(PDO::FETCH_ASSOC);
    return $user_info;
}

function update_user_inform($info){
    $first = $info['update_first'];
    $last = $info['update_last'];
    $contact = $info['update_contact'];
    $email = $info['update_email'];
    global $db;
    $temp = $db->exec("UPDATE logsys SET first = '$first', last = '$last', contact = '$contact' WHERE email = '$email'");
    
    if($temp === 1){
        return true;
    }else{
        return false;
    }   
}

function delete_user($info){
    global $db;
    $temp = $db->exec("DELETE FROM logsys WHERE email='$info'");
   
    if($temp > 0){
        return true;
    }else{
        return false;
    }   
}

?>