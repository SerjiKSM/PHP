<?php

class User
{
	public static function register($name, $email, $password) {

		$db = Db::getConnection();

		$sql = 'INSERT INTO user (name, email, password) '
				. 'VALUES (:name, :email, :password)';

				$result = $db->prepare($sql);
				$result->bindParam(':name', $name, PDO::PARAM_STR);
				$result->bindParam(':email', $email, PDO::PARAM_STR);
				$result->bindParam(':password', $password, PDO::PARAM_STR);

				return $result->execute();
	}

	/**
	 * Проверяет имя: не меньше, чем 2 символа
	 */
	public static function checkName($name) {
		if (strlen($name) >= 2) {
			return true;
		}
		return false;
	}

	/**
	 * Проверяет имя: не меньше, чем 6 символов
	 */
	public static function checkPassword($password) {
		if (strlen($password) >= 6) {
			return true;
		}
		return false;
	}

	/**
	 * Проверяет email
	 */
	public static function checkEmail($email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}

	public static function checkEmailExists($email) {

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();

		if($result->fetchColumn())
			return true;
		
			return false;
	}	
	
	/**
	 * check exist user
	 * 
	 * @param unknown $email
	 * @param unknown $password
	 */
	public static function checkUserData($email, $password){
		
		$db = Db::getConnection();
		
		$sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
		
		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		//$result->bindParam(':email', $email, PDO::PARAM_INT);
		//$result->bindParam(':password', $password, PDO::PARAM_INT);
		$result->execute();
		
		$user = $result->fetch();
		
		if($user){
			return $user['id'];
		}
		
		return false;
		
	}
	
	
	public static function auth($userId){
		
		$_SESSION['user'] = $userId;
		
	}
	
	/**
	 * check logged user
	 */	
	public static function checkLogged(){
		
		if(isset($_SESSION['user'])){
			return $_SESSION['user'];
		}
		
		header("Location: /user/login");
	}
	
	/**
	 * check is user a guest
	 * 
	 * @return boolean
	 */
	public static function isGuest(){
		
		if(isset($_SESSION['user'])){
			return false;
		}	
		
		return true;
	}
	
	/**
	 * get user
	 * 
	 * @param unknown $userId
	 * @return mixed|boolean
	 */
	public static function getUserById($id){
		
		if($id){
			$db = Db::getConnection();
			
			$sql = 'SELECT * FROM user WHERE id = :id';
			
			$result = $db->prepare($sql);
			
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			
			// Указываем что хотим получить данные ввиде массива
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$result->execute();
			
			return $result->fetch();
		}
				
	}
	
	/**
	 * edit data user
	 * 
	 * @param unknown $id
	 * @param unknown $name
	 * @param unknown $password
	 * @return boolean
	 */
	public static function edit($id, $name, $password) {
	
		$db = Db::getConnection();
	
		$sql = 'UPDATE user SET name = :name, password = :password WHERE id = :id';
					
				$result = $db->prepare($sql);
				$result->bindParam(':id', $id, PDO::PARAM_INT);
				$result->bindParam(':name', $name, PDO::PARAM_STR);
				$result->bindParam(':password', $password, PDO::PARAM_STR);
	
				return $result->execute();
	}
	
	
	/**
	 * Проверяет телефон: не меньше, чем 10 символов
	 */
	public static function checkPhone($phone)
	{
		if (strlen($phone) >= 10) {
			return true;
		}
		return false;
	}
	
	
}













