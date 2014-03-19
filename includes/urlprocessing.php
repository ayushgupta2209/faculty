<?php

class urlprocessing {

	private $urlbits;
	private $url;
	
	public function __construct() {
		$this->url = $_SERVER['REQUEST_URI'];
		$this->urlbits = explode('/',$this->url);
	}

	public function getDepartment() {
		if(count($this->urlbits)>2) {
			return $this->urlbits[2];
		}
		return false;
	}

	public function getName() {
		if(count($this->urlbits)>3) {
			return $this->urlbits[3];
		}
		return false;
	}

}

?>
