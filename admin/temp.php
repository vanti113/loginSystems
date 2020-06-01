<?php
//클래스를 구성 이것은 비유하자면 필요한 부품의 설계단계
class setPassword{
	//클래스 내부에 필요한 메소드를 넣고 활용하기
	 function connect_db(){

		try {
			$db = new PDO('mysql:host=localhost:3307;dbname=bae','root','111111');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch (PDOException $e) {
			print "데이터베이스에 접속할수 없습니다. 다음과 같은 오류가 있습니다.". $e->getMessage();
		}
		return $db;
	}

	//데이터베이스의 정보를 가져오는 부품. 인수로서 PDO객체를 받는다.
	function query_Password($db){
				
		 $queried = $db->query("SELECT * FROM logsys");
		 $temp_data = $queried->fetchAll(PDO::FETCH_ASSOC);
		 // var_dump($temp_data);
		 return $temp_data; 
	}

	function insert_inform($db){
		$id = "admins";
		$pass = "test@123";
		$hashed = password_hash($pass, PASSWORD_DEFAULT);
		
		$result = $db->exec("INSERT INTO admin(id, password)VALUES('$id','$hashed')");
		return $result;
	}

	function update_password($db){
		$password = "test1234";
		$hash = password_hash($password, PASSWORD_DEFAULT);

		$result = $db->exec("UPDATE admin SET password = '$hash' where id = 'admin'");
		return $result;
	}

	function query_adminPass($db){
		$temp = $db->query("SELECT password FROM admin");
		$fetch = $temp->fetch(PDO::FETCH_ASSOC);
		return $fetch;
	}

}
//클래스는 항상 설계도이며, 항상 클래스 바깥에서 객체인스턴스 생성을 통해 컨트롤 하는 것.

//밑에는 부품의 활용과 사용과정
$temp = new setPassword(); //객체 인스턴스 생성
$pdo_obj= $temp->connect_db(); // 참조를 통해 PDO객체를 만드는 메소드를 호출한 뒤 반환값을 저장

/*$returned_data = $temp->query_Password($pdo_obj); // 저장된 PDO객체를 다시 클래스 내부의 메소드를 호출하여 값을 입력, 그리고 반환받음.
var_dump($returned_data);*/
/* $result = $temp->insert_inform($pdo_obj);
if($result === false || $result === 0){
	print "it's not working";
}else{
	print "it's working";
} */
$result = $temp->update_password($pdo_obj);

if($result === 1){
	print "ok";
}else{
	print "no..";
}

?>