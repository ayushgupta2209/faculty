<?php
include 'includes/connect.php';
$db = new connect('localhost','garvit','garvit','project');
$dept = array('Computer Engineering' => 'coe','Software Engineering' => 'se','information Technology' => 'it','Mechanical Enginering' => 'me','Engineering Physics' => 'ep','Electical Engineering' => 'ee','Eclectical and Communication Engineering' => 'ece','BioTechnology' => 'bt');
$table = 'faculty_brief';
$column = array('code','name','designation','interest','department','pic','email','dept_short');
$table1 = 'faculty_details';
$column1 = array('code', 'present_designation_timeperiod', 'working_institute', 'working_institute_city', 'description', 'education', 'teaching_subjects', 'contact_no', 'address', 'city', 'pincode');
$table2 = 'faculty_login';
$column2 = array('username', 'password', 'code', 'last_login_date', 'last_login_time');
foreach($dept as $department => $department_short)
{
	for($i=0;$i<15;$i++)
	{
		$values = array();
		$values1 = array();
		$values2 = array();
		$code = md5(rand(0,99));
		$name = 'prof_'.substr(md5(rand(0,99)),0,4);
		$values[] = $code;
		$values[] = $name;
		$values[] = 'prof';
		$values[] = 'this is interest '.substr(md5(rand(0,99)),0,2);
		$values[] = $department;
		$values[] = $name.'@faculty.com';
		$values[] = 'no pic';
		$values[] = $department_short;
		$values1[] = $code;
		$values1[] = $i+1;
		$values1[] = 'DTU';
		$values1[] = 'delhi';
		$values1[] = 'this is a description '.substr(md5(rand(0,99)),0,2);
		$values1[] = 'PHD';
		$values1[] = $department_short;
		$values1[] = rand(8999999999,9999999999);
		$values1[] = 'address : nothing ';
		$values1[] = 'delhi';
		$values1[] = '110085';
		$values2[] = $name;
		$values2[] = $name.($i+1);
		$values2[] = $code;
		$values2[] = '21/03/2014';
		$values2[] = '10:35 PM';
		$db->insert($table,$column,$values);
		$db->insert($table1,$column1,$values1);
		$db->insert($table2,$column2,$values2);
		echo 'inserting '.$i.'<br>';
	}
}

?>
