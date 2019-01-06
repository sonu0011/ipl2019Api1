<?php

class Dbconnect{
	private $con;
	private $servername = "localhost";
	private $username = "root";
	 private $password = "password";
	function __construct(){
			
	}
	function returnobject(){
		try {
				$this->con =mysqli_connect("localhost","root","","ipl2019");
				return $this->con;
			}
				
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
			    
	}
	
}

?>