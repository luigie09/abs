<?php
session_start();
error_reporting(0);
include("database.php");

if(isset($_POST['deposit'])){

$card_num = mysql_real_escape_string($_POST['card_num']);
$amount = mysql_real_escape_string($_POST['amount']);

$query = mysql_query("SELECT * FROM client WHERE card_number = '$card_num'")or die(mysql_error());
$get = mysql_fetch_array($query);

$sum = $amount + $get['savings'];
$client_name = $get['client_name'];
$add = $get['client_add'];
$act_no = $get['card_number'];
date_default_timezone_set("Asia/Hong_Kong"); 
$date = date('Y-m-d H:i:s');
$month = date('m');

$insert = mysql_query("UPDATE client SET savings = '$sum', date_updated = '$date' WHERE card_number = '$card_num'")or die(mysql_error());
$client = mysql_query("INSERT INTO client_activity (act_no, deposit, client_name, client_add, savings_total,date,date_num,service_type) VALUES ('$act_no','$amount','$client_name','$add',
	'$sum','$date','$month',1)")or die(mysql_error());

$eid = $_SESSION['teller_id'];
$_SESSION['deposit_success'] = 1;
header("location: /abs/pages/teller.php?eid=$eid");
}

else if(isset($_POST['withdraw'])){

$card_num = mysql_real_escape_string($_POST['card_num']);
$amount = mysql_real_escape_string($_POST['amount']);

$query = mysql_query("SELECT * FROM client WHERE card_number = '$card_num'")or die(mysql_error());
$get = mysql_fetch_array($query);

$sum = $get['savings'] - $amount;
if($sum <= 0){
	$sum = 0;
}
$client_name = $get['client_name'];
$act_no = $get['card_number'];
$add = $get['client_add'];
date_default_timezone_set("Asia/Hong_Kong"); 
$date = date('Y-m-d H:i:s');
$month = date('m');
$insert = mysql_query("UPDATE client SET savings = '$sum', date_updated = '$date' WHERE client_pin = '$pin_num'")or die(mysql_error());
$client = mysql_query("INSERT INTO client_activity (act_no, withdraw, client_name, client_add, savings_total,date,date_num,service_type) VALUES ('$act_no','$amount','$client_name','$add',
	'$sum','$date','$month',1)")or die(mysql_error());


$eid = $_SESSION['teller_id'];
$_SESSION['withdraw_success'] = 1;
header("location: /abs/pages/teller.php?eid=$eid");
}

else{
	echo "ERROR 404";
}

?>