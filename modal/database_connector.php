<?php

Class DatabaseConnector{
	
	private	$dsn;
	private $username; 
	private $password; 
	private $options;
	

	public function  __construct(){
		
		
		//$this->dsn = 'mysql:host=127.0.0.1:3306;dbname=college_database';
		//Use this for the new databse
		$this->dsn = 'mysql:unix_socket=/cloudsql/canvas-sum-91507:taylorsappstorage2;dbname=college_database';
		$this->username = 'machines';
		$this->password = 'yomama';
		$this->options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	}

	public function pdoObjectRetreiever(){
		try{
			$pdoObjectHolder = new PDO($this->dsn, $this->username, $this->password, $this->options);
		}catch(PDOException $e){
			$message = $e->getMessage();
			echo $message;
		}

		return $pdoObjectHolder;
	}	

}

?>