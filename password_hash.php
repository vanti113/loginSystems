<?php
function hash_pass($password) //회원가입시 검증이 끝나고 제출된 사용자 암호를 해쉬화 하여 반환한다.
{
	$validated_pass	= password_hash($password, PASSWORD_DEFAULT);

	return $validated_pass;
}

//데이터베이스에서 추줄된 해쉬와 사용자가 제출한 암호를 해쉬분석하여 맞으면 트루, 틀리면 폴스를 반환
function password_verifying($submitted_password, $result){ 
	
	return password_verify($submitted_password, $result);

}