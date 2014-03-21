<?php
/**
 * project started.
 */
DEFINE("FRAMEWORK_PATH", dirname( __FILE__ ) ."/includes/" );
include FRAMEWORK_PATH.'urlprocessing.php';
include FRAMEWORK_PATH.'connect.php';
include FRAMEWORK_PATH.'template.php';
$db = new connect('localhost','garvit','garvit','project');
$url = new urlprocessing($db);
$template = new template($db, $url);
if($url->getName() && $url->getDepartment()) {
	$template->displayProf();
}
elseif($url->getDepartment() && !$url->getName() ) {
	$template->displayDept();
}
else {
	$template->listDept();
}
?>
