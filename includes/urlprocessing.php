<?php
class urlprocessing {

	private $urlbits;
	private $url;
	private $db;
	private $result;
	
	public function __construct(connect $db) {
		$this->db = $db;
		$this->url = $_SERVER['REQUEST_URI'];
		$this->url = $this->db->sanitizeData($this->url);
		$this->urlbits = explode('/',$this->url);
	}

	public function getDepartment() {
		if(count($this->urlbits)>2) {
			$this->db->executeQuery('SELECT dept_short FROM faculty_brief');
			$this->result = $this->db->getRows();
			foreach($this->result as $result)
			{
				if($this->urlbits[2]==$result['dept_short']) {
					return $this->urlbits[2];
				}
			}
		}
		return false;
	}

	public function getName() {
		if(count($this->urlbits)>3) {
			$this->db->executeQuery('SELECT dept_short,name FROM faculty_brief');
			$this->result = $this->db->getRows();
			foreach($this->result as $result)
			{
				if($this->urlbits[2] == $result['dept_short'] && $this->urlbits[3] == $result['name']) {
					return $this->urlbits[3];
				}
			}
		}
		return false;
	}

}

?>
