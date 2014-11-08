<?php
session_start();
error_reporting(0);
include("database.php");
$card_num = $_GET['card_num'];
$eid = $_GET['eid'];
$delete = mysql_query("UPDATE client SET status = '0' WHERE card_number = $card_num");
$_SESSION['close_account'] = 1;
header("location:/abs/pages/customer_rep.php?eid=$eid")

?>