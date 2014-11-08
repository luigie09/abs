<?php

if(isset($_POST['passiton_emp'])){

	error_reporting(0);
	session_start();
	include("database.php");
	$emp_num = mysql_real_escape_string($_POST['emp_num']);
	$pass_num = mysql_real_escape_string($_POST['pass_num']);
	$pass_num = md5($pass_num);
	$query = mysql_query("SELECT * FROM employee_db WHERE id = '$emp_num' AND password = '$pass_num'") or die(mysql_error());
	$seen = mysql_num_rows($query);
	$content = mysql_fetch_array($query);
	if($seen == 1){

		if($content['position'] == 3){
			$_SESSION['log_error'] = 0;
			$_SESSION['log_teller'] = 1;
			$_SESSION['emp_number'] = $_POST['emp_num'];
			$_SESSION['tel_name'] = $content['full_name'];
			$eid = $_SESSION['emp_number'];
			$eid = md5($eid);
			$_SESSION['teller_id'] = $eid;
			header("location:/abs/pages/teller.php?eid=$eid");
		}
		else if($content['position'] == 4){
			$_SESSION['log_error'] = 0;
			$_SESSION['log_teller'] = 1;
			$_SESSION['emp_number'] = $_POST['emp_num'];
			$_SESSION['man_name'] = $content['full_name'];
			$eid = $_SESSION['emp_number'];
			$eid = md5($eid);
			$_SESSION['manager_id'] = $eid;
			header("location:/abs/pages/manager.php?eid=$eid");
			
	}
		else if($content['position'] == 5){
			$_SESSION['log_error'] = 0;
			$_SESSION['log_teller'] = 1;
			$_SESSION['emp_number'] = $_POST['emp_num'];
			$_SESSION['rep_name'] = $content['full_name'];
			$eid = $_SESSION['emp_number'];
			$eid = md5($eid);
			$_SESSION['custrep_id'] = $eid;
			header("location:/abs/pages/customer_rep.php?eid=$eid");
			
	}
		else if($content['position'] == 1){
			$_SESSION['log_error'] = 0;
			$_SESSION['log_teller'] = 1;
			$_SESSION['emp_number'] = $_POST['emp_num'];
			$_SESSION['admin_name'] = $content['full_name'];
			$eid = $_SESSION['emp_number'];
			$eid = md5($eid);
			$_SESSION['admin_id'] = $eid;
			header("location:/abs/pages/admin.php?eid=$eid");
			
	}
	else{
		$_SESSION['log_error'] = 1;
		header("location: /abs/");
	}
	}
	else{
		$_SESSION['log_error'] = 1;
		header("location: /abs/");
	}
}
else{

	echo "ERROR 404";
}
?>