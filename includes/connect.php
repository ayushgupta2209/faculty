<?php

/**
 * this class is to connect to database and also insert update and select queries from database.
 */

class connect {

	private $host;
	private $username;
	private $password;
	private $database;
	private $connection;
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
	public function executeQuery($query) {
		if(!$result = $this->connection->query($query)) {
			echo "Failed to execut query: (" . $this->connection->errno . ") " . $this->connection->error;
		}
		else {
			$this->result = $result;
		}
	}

	/**
	 * to get the fetched result from the executed query
	 */

	public function getRows() {
		return $this->result->fetch_array();
	}

	/**
	 * to get num of rows
	 */
	public function numRows() {
		return $this->result->num_rows;
  }

	/**
	 * insert records
	 * parameters : table, column, values
	 * column - it has to be an array eg. array([0]=>'column1', [1]=>'column2', [2]=>'etc')
	 * values - it has to be an array eg. array([0]=>'value1', [1]=>'value2', [2]=>'etc')
	 */

	public function insert($table, $column, $values) {
		if(count($column)==count($values)) {
			foreach($column as $c) {
				$columns .= $c.', ';
			}
			$columns = substr($columns,0,-2);
			foreach($values as $c) {
				$value .= $c.', ';
			}
			$columns = substr($columns,0,-2);
			$value = substr($value,0,-2);
			$query = 'INSERT INTO '.$table.' ('.$column.') VALUES ('.$values.')';
			$this->executeQuery($query);
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * update records
	 * parameters : table, values, condition
	 * values - this has to be an array with index as column name and value as value eg. array(['column1']=>'value1', ['column2']=>'value2')
	 * condition - this also has to be an array as given above
	 */
	public function update($table,$values,$condition) {
		foreach($values as $c => $v) {
			$columns .= $c.'="'.$v.'",';
		}
		$columns = substr($columns,0,-1);
		foreach($condition as $c=>$v) {
			$conditions .= $c.'="'.$v.'",';
		}
		$conditions = substr($conditions,0,-2);
		$value = substr($value,0,-2);
		$query = 'UPDATE '.$table.' SET '.$column.' WHERE'.$conditions;
		$this->executeQuery($query);
		return true;
	}

	/**
	 */
	public function sanitizeData( $value )
  {
   	// Stripslashes 
		if ( get_magic_quotes_gpc() ) { 
			$value = stripslashes ( $value ); 
		} 
		
		// Quote value
		if ( version_compare( phpversion(), "4.3.0" ) == "-1" ) {
			$value = $this->connection->escape_string( $value );
		} 
		else {
			$value = $this->connection->real_escape_string( $value );
		}
    	return $value;
  }
    
  /**
   * Gets the number of affected rows from the previous query
   * @return int the number of affected rows
   */
  public function affectedRows()
  {
  	return $this->result->affected_rows;
  }
}

?>
