<?php


function check_admin($admin, $inputs){
	if($admin['id'] === $inputs['id']){
		if(password_verify($inputs['password'], $admin['password'])){
			return true;
		}else{
			return false;
		}

	}else
	{
		return false;
	}
}


?>