<?php
session_start();
error_reporting(0);
include("database.php");

if(isset($_POST['create_account'])){

	$eid = $_GET['eid'];
	$full_name = $_POST['full_name'];
	$id = $_POST['id'];
	$password = $_POST['password'];
	$department = $_POST['position'];
	
	if($password == null && $full_name == null){
		$_SESSION['error_emp'] = 1;
		header("location:/abs/pages/new_employee.php?eid=$eid");
	}

	else{
		
	
			if($department == "Teller"){
			$position = 3;
			}
			else if($department == "Customer Representative"){
			$position = 5;
			}
			

			$pass = md5($password);
			$new = mysql_query("INSERT INTO employee_db (id,password,full_name,department,position) VALUES ('$id','$pass','$full_name','$department','$position')")or die(mysql_error());
			$_SESSION['created'] = 1;
			$_SESSION['fixed_dep'] = 0;
			$_SESSION['int_rate'] = 0;
			header("location:/abs/pages/manager.php?eid=$eid");
				
	}
	



	






	

	
}


else{
	echo "ERROR 404";
}


?>