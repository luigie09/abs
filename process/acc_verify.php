<?php

if(isset($_POST['passiton'])){

	error_reporting(0);
	session_start();
	include("database.php");
	$card_num = mysql_real_escape_string($_POST['card_num']);
	$pin_num = mysql_real_escape_string($_POST['pin_num']);
	$pin_num = md5($pin_num);
	$query = mysql_query("SELECT * FROM client WHERE card_number = '$card_num' AND client_pin = '$pin_num'") or die(mysql_error());
	$seen = mysql_num_rows($query);
	$sees = mysql_fetch_array($query);

	if($seen == 1){
		$_SESSION['log_error'] = 0;
		$_SESSION['log_user'] = 1;
		$_SESSION['pin_number'] = $_POST['pin_num'];
		$client_names = $sees['client_name'];
		$client_log = "Client's account was logged in by: ".$_SESSION['tel_name'];
		$voodoo = $_SESSION['pin_number'];
		$doll = md5($voodoo);
		date_default_timezone_set("Asia/Hong_Kong"); 
		$date = date('Y-m-d H:i:s');
		$File = "client_logs.txt"; 
		$Handle = fopen($File,'a'); 
		$Data = $date."\t".$client_names."\t".$client_log."\r\n";  
		fwrite($Handle, $Data);  
		fclose($Handle);
		header("location:/abs/pages/user.php?edom=$doll");
	}
	else{
		$_SESSION['log_error'] = 1;
		header("location: /abs/pages/client_log.php");
	}
}
else{

	echo "ERROR 404";
}
?>