<?php
/**
 * project started.
 */
DEFINE("FRAMEWORK_PATH", dirname( __FILE__ ) ."/includes/" );
include FRAMEWORK_PATH.'urlprocessing.php';
include FRAMEWORK_PATH.'connect.php';
$db = new connect('localhost','garvit','garvit','project');
$url = new urlprocessing($db);
if($url->getDepartment()) {
	echo 'helo welcome to '.$url->getDepartment().' Department';
}
if($url->getNameId()) {
	echo '<br>helo welcome to '.$url->getDepartment().' Department and prof : '.$url->getNameId();
}

$url->getDepartment();

?>
