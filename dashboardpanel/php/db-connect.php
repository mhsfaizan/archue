<?php
 class Conn{
 	private static $server;
 	private static $user;
 	private  static $password;
 	private static $database;
 	protected static function connect(){
 		self::$server = "localhost";
		 
		self::$user = "root";
 		self::$password = "";
 		self::$database = "archue";
		 
		 
 		
 		$conn = new mysqli(self::$server,self::$user,self::$password,self::$database);
 		if($conn->connect_error){
			 exit;
 		}else{
			$conn->set_charset("utf8");
 			return $conn;
 		}
 	}
 }
?>