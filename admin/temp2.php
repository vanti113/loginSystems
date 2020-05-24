<?php

$pass = "test@123";

$hashed = password_hash($pass, PASSWORD_DEFAULT);
print $hashed;

?>