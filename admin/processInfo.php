<?php

function sepArray($array)
{
    $id = array();
    $first = array();
    $last = array();
    $email = array();
    $contact = array();
    $date = array();
    
    foreach ($array as $num => $data) {
        $id[] = $num+1;
        $first[] = $data['first'];
        $last[] = $data['last'];
        $email[] = $data['email'];
        $contact[] = $data['contact'];
        $date[] = $data['date'];
    }
    return array($id, $first, $last, $email, $contact, $date);
}
