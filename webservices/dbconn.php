<?php
class connection{
	var $servername ;
	var $username;
	var $database;
	var $password;
	
	function connect(){
		$servername = "localhost";
		$username = "tarang";
		$password = "tarang@111";
		$database="tarang";
		$conn = new mysqli($servername, $username, $password,$database);
		return $conn;
	}
}
?>
