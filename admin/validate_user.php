<?php


function check_adminId($admin, $inputs){ //어디에서 호출하는 거지?
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

function check_adminPass($submitted, $saved_hash){
	if(password_verify($submitted['old_pass'], $saved_hash['password'])){
		return true;
	}else{
		return false;
	}
}

?>