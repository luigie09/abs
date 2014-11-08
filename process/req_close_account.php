<?php
session_start();
error_reporting(0);
include("database.php");
$card_num = $_GET['cop'];
$eid = $_GET['eid'];

$delete1 = mysql_query("UPDATE client SET date_started = 0000-00-00, status = '3', time_savings = 0, interest_earned = 0, int_perday = 0, interest = 0 WHERE card_number = '$card_num'")or die(mysql_error());


	$_SESSION['wrong_card'] = 0;
	$_SESSION['deposit_success'] = 0;
	$_SESSION['withdraw_success'] = 0;
	$_SESSION['close_account'] = 1;
header("location:/abs/pages/teller.php?eid=$eid");

?>