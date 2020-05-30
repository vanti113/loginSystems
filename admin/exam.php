<?php
$temp_pass = ";$2y$10$KgKBXDMpIqBXb6EcISwkQuIJqBzXRJXbgN4IYJfsBZ860e/yb1t0W";
$temp_pass2 = "test@1234";
var_dump(password_verify($temp_pass2, $temp_pass)); 
?>