<?php
class urlprocessing {

	private $urlbits;
	private $url;
	private $db;
	private $result;
	
	public function __construct(connect $db) {
		$this->db = $db;
		$this->url = $_SERVER['REQUEST_URI'];
		$this->urlbits = explode('/',$this->url);
	}

	public function getDepartment() {
		if(count($this->urlbits)>2) {
			$this->db->executeQuery('SELECT department FROM faculty_brief');
			while($this->result = $this->db->getRows())
			{
				if($this->urlbits[2]==$this->result['department']) {
					return $this->urlbits[2];
				}
			}
		}
		return false;
	}

	public function getNameID() {
		if(count($this->urlbits)>3) {
			$this->db->executeQuery('SELECT department,name FROM faculty_brief');
			while($this->result = $this->db->getRows())
			{
				if($this->urlbits[2] == $this->result['department'] && $this->urlbits[3] == $this->result['name']) {
					return $this->urlbits[2].'/'.$this->urlbits[3];
				}
			}
		}
		return false;
	}

}

?>
