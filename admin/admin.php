<?php
//날짜 수식  
    function test(){
        
        $day= date('d');
        $month = date('m');
        $year = date('Y');
        
        return  $date = $year ."-". $month."-".$day;  
    }
    echo test();
?>