<?php
session_start();
error_reporting(0);
include("database.php");
$eid_hash = $_SESSION['teller_id'];
$eid = md5($eid_hash);
$card_num = $_GET['cop'];
$amount = mysql_real_escape_string($_GET['amount']);

$query = mysql_query("SELECT * FROM client WHERE card_number = '$card_num'")or die(mysql_error());
$get = mysql_fetch_array($query);

$sum = $get['savings'] -$amount;
$client_name = $get['client_name'];
$add = $get['client_add'];
$act_no = $get['card_number'];
date_default_timezone_set("Asia/Hong_Kong"); 
$date = date('Y-m-d H:i:s');
$month = date('m');

$insert = mysql_query("UPDATE client SET savings = '$sum', date_updated = '$date' WHERE card_number = '$card_num'")or die(mysql_error());
$client = mysql_query("INSERT INTO client_activity (act_no, withdraw, client_name, client_add, savings_total,date,date_num,service_type) VALUES ('$act_no','$amount','$client_name','$add',
	'$sum','$date','$month',1)")or die(mysql_error());

$_SESSION['deposit_success'] = 0;
$_SESSION['withdraw_success'] = 1;
header("location: /abs/pages/teller.php?eid=$eid");

?>