<?php

class template {

	private $db;
	private $url;

	public function __construct(connect $db, urlprocessing $url) {
		$this->db = $db;
		$this->url = $url;
	}

	public function listDept() {
		$sql = 'SELECT DISTINCT department,dept_short FROM faculty_brief';
		$this->db->executeQuery($sql);
		$result = $this->db->getRows();
		foreach($result as $res) {
				echo '<a href="/faculty/'.$res['dept_short'].'">Department : '.$res['department'].'</a><br>';
		}
	}

	public function displayProf() {
		echo '<a href="/faculty/">HOME <br></a>';
		$sql1 = 'SELECT * FROM faculty_brief WHERE name = "'.$this->url->getName().'" AND dept_short = "'.$this->url->getDepartment().'"';
		$this->db->executeQuery($sql1);
		if($this->db->numRows() == 1) {
			$result = $this->db->getRows();
			echo 'Name : '.$result['name'].'<br>';
			echo 'Designation : '.$result['designation'].'<br>';
			echo 'Interest : '.$result['interest'].'<br>';
			echo 'Department : <a href="/faculty/'.$this->url->getDepartment().'">'.$result['department'].'</a><br>';
			echo 'Email : '.$result['pic'].'<br>';
			$sql = 'SELECT * FROM faculty_details WHERE code = "'.$result['code'].'"';
			$this->db->executeQuery($sql);
			$resul = $this->db->getRows();
			foreach($resul as $res) {
				echo 'Time period : '.$res['present_designation_timeperiod'].'<br>';
				echo 'Institute : '.$res['working_institute'].'<br>';
				echo 'Institute City : '.$res['working_institute_city'].'<br>';
				echo 'Description : '.$res['description'].'<br>';
				echo 'Education : '.$res['education'].'<br>';
				echo 'Teaching Sbjects : '.$res['teaching_subjects'].'<br>';
				echo 'Contact no : '.$res['contact_no'].'<br>';
				echo 'Address : '.$res['address'].'<br>';
				echo 'City : '.$res['city'].'<br>';
			}
		}
		else {
			$this->listDept();
		}
	}

	public function displayDept() {
		echo '<a href="/faculty/">HOME <br></a>';
		echo 'Welcome to department : '.$this->url->getDepartment().'<br>';
		echo 'list of prof : <br>';

		$sql = 'SELECT * FROM faculty_brief WHERE dept_short ="'.$this->url->getDepartment().'"';
		$this->db->executeQuery($sql);

		$result = $this->db->getRows();
		foreach($result as $res) {
			if($res['dept_short'] == $this->url->getDepartment()) {
				echo '<a href="/faculty/'.$res['dept_short'].'/'.$res['name'].'">name : '.$res['name'].'</a><br>';
			}
		}

	}

}
	
?>
