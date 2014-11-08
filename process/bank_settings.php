<?php
session_start();
error_reporting(0);
include("database.php");

if(isset($_POST['changemin_dept'])){
	$eid = $_SESSION['manager_id'];
	$dep_amount = $_POST['timedep_amount'];
	$change_mindep = mysql_query("UPDATE bank_settings SET fixed_deposit = '$dep_amount' WHERE q_num ='1'")or die(mysql_error());
	$_SESSION['fixed_dep'] = 1;
	$_SESSION['int_rate'] = 0;
	header("location: /abs/pages/manager.php?eid=$eid");
}
else if(isset($_POST['change_interest'])){
	$eid = $_SESSION['manager_id'];	
	$int_amount = $_POST['int_rate'];
	$change_interest = mysql_query("UPDATE bank_settings SET interest_rate = '$int_amount' WHERE q_num ='1'")or die(mysql_error());
	$change_interest = mysql_query("UPDATE bank_settings SET interest_rate = '$int_amount' WHERE q_num ='1'")or die(mysql_error());
	
	$_SESSION['int_rate'] = 1;
	$_SESSION['fixed_dep'] = 0;
	header("location: /abs/pages/manager.php?eid=$eid");
}
else{
	echo "ERROR 404";
}


?>