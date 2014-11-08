<?php
session_start();
error_reporting(0);
include("database.php");
$eid_hash = $_SESSION['teller_id'];
$eid = md5($eid_hash);
$card_num = $_GET['cop'];
$int_gained = $_GET['int_gained'];
$int_day = $_GET['int_day'];
$int = $_GET['int'];
$sum1 = $_GET['sum'];

$amount = mysql_real_escape_string($_GET['amount']);

$query = mysql_query("SELECT * FROM client WHERE card_number = '$card_num'")or die(mysql_error());
$get = mysql_fetch_array($query);

$sum = $amount + $get['time_savings'];
$client_name = $get['client_name'];
$add = $get['client_add'];
$act_no = $get['card_number'];
date_default_timezone_set("Asia/Hong_Kong"); 
$date = date('Y-m-d H:i:s');
$month = date('m');

if($get['date_started'] == 0){
$insert = mysql_query("UPDATE client SET interest= '$int', date_started = '$date', int_perday = '$int_day', interest_earned = '$sum1' , time_savings = '$sum', date_updated = '$date' WHERE card_number = '$card_num'")or die(mysql_error());
}


$client = mysql_query("INSERT INTO client_activity (act_no, dep_timedep, client_name, client_add, saving_timedep,date,date_num,service_type) VALUES ('$act_no','$amount','$client_name','$add',
	'$sum','$date','$month',1)")or die(mysql_error());

$_SESSION['deposit_success'] = 1;
$_SESSION['withdraw_success'] = 0;


?>