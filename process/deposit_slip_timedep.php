<?php
session_start();
error_reporting(0);
include("database.php");

$pin_num = $_GET['edom'];
$amount = mysql_real_escape_string($_GET['amount']);

$query = mysql_query("SELECT * FROM client WHERE client_pin = '$pin_num'")or die(mysql_error());
$get = mysql_fetch_array($query);

$sum = $amount + $get['time_savings'];
$client_name = $get['client_name'];
$add = $get['client_add'];
$act_no = $get['card_number'];
date_default_timezone_set("Asia/Hong_Kong"); 
$date = date('Y-m-d H:i:s');
$month = date('m');

$insert = mysql_query("UPDATE client SET time_savings = '$sum', date_updated = '$date' WHERE client_pin = '$pin_num'")or die(mysql_error());
$client = mysql_query("INSERT INTO client_activity (act_no, dep_timedep, client_name, client_add, client_pin, saving_timedep,date,date_num,service_type) VALUES ('$act_no','$amount','$client_name','$add',
	'$pin_num','$sum','$date','$month',2)")or die(mysql_error());

$_SESSION['deposit_success'] = 1;
header("location: /abs/pages/time_dep.php?edom=$pin_num");

?>