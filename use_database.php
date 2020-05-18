<?php
try {
    $db = new PDO('mysql:host=localhost:3307;dbname=bae', 'root', '111111');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //("INSERT INTO logsys(first, last, email, password, contact)VALUES()");
    //code...
} catch (PDOException $e) {
    print "다음과 같은 에러가 발생했습니다." . $e->getMessage();
}
function insert_db($data, $password, $date)
{
    global $db;
    $first = $data['first_name'];
    $last = $data['last_name'];
    $email = $data['email'];
    $contact = $data['contact'];

    $result = $db->exec("INSERT INTO logsys(first, last, email, password, contact, date)
	VALUES('$first', '$last', '$email', '$password', '$contact','$date')");
    
    
    return $result;
}

function lookup_db($submitted_email)
{
    global $db;
  
    $temp = $db->query("SELECT email, password FROM logsys");
    while ($temp_data = $temp->fetch(PDO::FETCH_ASSOC)) {
        if ($submitted_email == $temp_data['email']) {
            $matched_result = $temp_data['password'];
            return $matched_result;
        }
        $matched_result = false;
    }
    return $matched_result;
}

function find_name($submitted_email)
{
    global $db;

    $temp = $db->query("SELECT last FROM logsys WHERE email='$submitted_email'");
    $last_name = $temp->fetch(PDO::FETCH_ASSOC);
    
    return $last_name['last'];
}

function find_email($first_name, $last_name)
{
    global $db;
    $temp = $db->query("SELECT email FROM logsys WHERE first = '$first_name' AND last = '$last_name'");
    if (!$temp) {
        return false;
    } else {
        $email = array();
        while ($result = $temp->fetch(PDO::FETCH_ASSOC)) {
            $email[] = $result['email'];
        }

        return $email; //인덱스 배열로 이메일 혹은 이메일들을 반환
    }
}
