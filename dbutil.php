<?php
class DbUtil{
	public static $loginUser = "root";
	public static $loginPass = "b2GgMcH8DMcFcJBE";
	public static $host = "34.145.175.3"; // DB Host
	public static $schema = "NFL_Stats"; // DB Schema

	public static function loginConnection(){
		$db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);

		if($db->connect_errno){
			echo("Could not connect to db");
			$db->close();
			exit();
		}

		return $db;
	}

}

$test = DbUtil::loginConnection();
