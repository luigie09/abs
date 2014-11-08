<?php
session_start();
error_reporting(0);
include("database.php");
if(isset($_POST['add_client'])){
	$eid = $_GET['eid'];
	$last_name = $_POST['last_name'];
	$first_name = $_POST['first_name'];
	$address = $_POST['address'];
	$account = $_POST['account'];
	$atm_password = $_POST['password'];
	date_default_timezone_set("Asia/Hong_Kong"); 
	$date = date('Y-m-d');
	



	
	



	$name = $first_name." ".$last_name;

	$name_q = mysql_query("SELECT * FROM client")or die(mysql_error());
	$see_name = mysql_fetch_array($name_q);
	if($see_name['client_name'] == $name){
				$_SESSION['same_name'] = 1;
				header("location: /abs/pages/new_client.php?eid=$eid");
			}
	else{


	if($account == "Fixed Account"){
		$account = 2;
									}
	else{
		$account = 1;
		}

			if($account == 2){
			
				$account_num = substr(number_format(time() * mt_rand(),0,'',''),0,10);
				$int_query = mysql_query("SELECT * FROM bank_settings WHERE q_num = 1") or die(mysql_error());
				$int_value = mysql_fetch_array($int_query);
				$int_rate = $int_value['interest_rate'];
				$pasok = mysql_query("INSERT INTO client (client_name, client_add, card_number, account_type, status) VALUES('$name', '$address', '$account_num', '$account','1')")or die(mysql_error());
				$_SESSION['client_added'] = 1;
				header("location: /abs/pages/customer_rep.php?eid=$eid");
							}
			else if($account == 1){
				$password = md5($password);
				$account_num = substr(number_format(time() * mt_rand(),0,'',''),0,10);
				$pasok = mysql_query("INSERT INTO client (atm_pass, client_name, client_add, card_number, savings, date_updated, account_type) VALUES('$password','$name', '$address', '$account_num', '$amount','$date','$account')")or die(mysql_error());
				$_SESSION['client_added'] = 1;
				header("location: /abs/pages/customer_rep.php?eid=$eid");
				}	
								}}
else{
	echo "ERROR 404";
	}


?>