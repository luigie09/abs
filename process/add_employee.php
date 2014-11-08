<?php
session_start();
error_reporting(0);
include("database.php");

if(isset($_POST['add_employee'])){

	$eid = $_GET['eid'];
	$full_name = $_POST['full_name'];
	$id = $_POST['id'];
	$password = $_POST['password'];
	
	
	if($password == null && $full_name == null){
		$_SESSION['error_emp'] = 1;
		header("location:/abs/pages/new_employee.php?eid=$eid");
	}

	else{
		
	

			
			
			$department = "Manager";
			$position = 4;
			

			$pass = md5($password);
			$new = mysql_query("INSERT INTO employee_db (id,password,full_name,department,position) VALUES ('$id','$pass','$full_name','$department','$position')")or die(mysql_error());

			$_SESSION['new_emp_name'] = $full_name;
			$_SESSION['new_emp_dept'] = $department;
			$_SESSION['new_emp_id'] = $id;
			$_SESSION['new_emp_pass'] = $password;


			header("location:/abs/pages/employee_preview.php?eid=$eid");
				
	}
	



	






	

	
}


else{
	echo "ERROR 404";
}


?>