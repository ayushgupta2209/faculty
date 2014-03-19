<?php
/**
 * project started.
 */
DEFINE("FRAMEWORK_PATH", dirname( __FILE__ ) ."/includes/" );
include FRAMEWORK_PATH.'urlprocessing.php';
include FRAMEWORK_PATH.'connect.php';
$url = new urlprocessing();
if($url->getDepartment()) {
	echo 'helo welcome to '.$url->getDepartment().' Department';
}
if($url->getName()) {
	echo '<br>helo welcome to '.$url->getDepartment().' Department and prof : '.$url->getName();
}
$db = new connect('localhost','garvit','garvit','project');
$url->getDepartment();

?>
