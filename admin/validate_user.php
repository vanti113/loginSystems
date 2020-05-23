<?php


function check_admin($admin, $inputs){
	if($admin['id'] === $inputs['id']){
		if(password_verify($input['password'], $admin['password'])){
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