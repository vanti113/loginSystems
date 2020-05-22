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

?>