<?php
session_start();
error_reporting(0);
include("database.php");
$card_num = $_GET['card_num'];
$eid = $_GET['eid'];
$poo = mysql_query("SELECT * FROM client WHERE card_number = $card_num")or die(mysql_error());
$pee = mysql_fetch_array($poo);
$num = $pee['savings'] + $pee['time_savings'];
if($num == 0){
	
$delete2= mysql_query("INSERT INTO locked_accounts SELECT * FROM client WHERE card_number = '$card_num' ")or die(mysql_error());
$delete4 = mysql_query("UPDATE locked_accounts SET status = 0 WHERE card_number = '$card_num' ")or die(mysql_error());
$delete3= mysql_query("DELETE FROM client WHERE card_number = '$card_num'")or die(mysql_error());
$_SESSION['money_left'] = 1;
$_SESSION['close_account'] = 0;

header("location:/abs/pages/customer_rep.php?eid=$eid");

}

else{
	$_SESSION['close_account'] = 1;
	$_SESSION['money_left'] = 0;
	
	header("location:/abs/pages/customer_rep.php?eid=$eid");
}


?>