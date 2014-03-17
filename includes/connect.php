<?php

/**
 * this class is to connect to database and also insert update and select queries from database.
 */

class connect {

	private $host;
	private $username;
	private $password;
	private $database;
	private $table;
	private $column;
	private $connection;
	private $query;
	private $result;
	
	/**
	 * contructor also initialize the connection with the database 
	 */
	function __construct($host,$username,$password,$database) {
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		$this->connection = new mysqli($this->host,$this->username,$this->password,$this->database);
		if($this->connection->connect_errno) {
			echo "Failed to connect to MySQL: (" . $this->connection->connect_errno . ") " . $this->connection->connect_error;
		}
	}
	
	/**
	 * exectes the query
	 */
	function execute($query) {
		$this->query = $query;
		if(!$this->result = $this->connection->query($this->query)) {
			$this->result = "";
			echo "Failed to execut query: (" . $this->connection->errno . ") " . $this->connection->error;
		}
	}

	/**
	 * to get the fetched result from the executed query
	 */

	function getrows() {
		if($this->result="") {
			return false;
		}
		else {
			return $this->result->
		}
	}

}

?>
