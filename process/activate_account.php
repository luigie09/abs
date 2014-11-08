<?php
session_start();
error_reporting(0);
include("database.php");
$card_num = $_GET['client_num'];
$eid = $_GET['eid'];
$delete2= mysql_query("INSERT INTO client SELECT * FROM locked_accounts WHERE card_number = '$card_num'")or die(mysql_error());
$delete3= mysql_query("DELETE FROM locked_accounts WHERE card_number = '$card_num'")or die(mysql_error());
header("location:/abs/pages/admin.php?eid=$eid");
?>