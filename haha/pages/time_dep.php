<?php 
session_start();
error_reporting(0);
include("database.php");
$eid = $_SESSION['teller_id'];
$card_num1 = $_POST['card_num'];
$check_exist = mysql_query("SELECT * FROM client WHERE card_number = '$card_num1' AND account_type = '2' AND status != '3'")or die (mysql_error());
$see_me = mysql_num_rows($check_exist);
$sample = mysql_fetch_array($check_exist);

if($see_me == 1){

?>
<html>
	<head>
		<title>ABS | Automated Banking System</title>
		<link href="/abs/css/bootstrap.min.css" rel="stylesheet">
		<link href="/abs/css/bootstrap.css" rel="stylesheet">
	
		<style>

			@font-face {
			    font-family: LatoBold;
			    src: url(/abs/fonts/Lato-Bold.ttf);
			}
			@font-face {
			    font-family: LatoHair;
			    src: url(/abs/fonts/Lato-Hairline.ttf);
			}

			html {
				background-color: #35B0CF;
			}

			body {
				margin: 100px;
				background: transparent;
				font-family: LatoBold;
			}

			h1{ 
				font-size: 10vw;
				font-family: LatoBold;
			}

			text{
				font-family: LatoHair;
			}

			#white{
				color:white;
				font-size: 18;
			}

			#rep_sec{
				margin-bottom: 1000px;
			}

			.client_name{
				font-size: 16pt;
			}
			
			#push{
				margin-bottom: 500px;
			}

			@media (max-width: 1004px){
				
				#push{
					margin: 0;
					padding: 0;
				}

			}

	</style>
		</style>

	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-xs-12" id="color_white">
					
		        		<ul class="list-inline">
		        		<li class="dropdow">

				         	<a href="#" class="dropdown-toggle" class="col-xs-12" data-toggle="dropdown"><img src="/abs/img/cog.png" style="width:35px; height:35px;"></a>
				          	
				          	<ul class="dropdown-menu col-md-3 col-xs-12" role="menu">
				            	<center>
				            	<li><p class="client_name"><?php echo $_SESSION['tel_name']; ?><br/></p><small>Employee Name</small></li>
				            	<li class="divider"></li>
				            	<li><a href="/abs/process/logout_emp.php">LOGOUT ACCOUNT</a></li>				            
				          	</ul>
				        </li>
				        <li>
				        	<strong id="white"> <?php echo $_SESSION['tel_name']; ?> </strong>
				        </li></center>
		            </ul>
				
				</div>
				<div class="col-md-6" id="push">

					<center>
						<h1>ABS<text>inc.</text></h1>
						<p style="font-size:14pt;">Banking made easier. Banking at your fingertips.</p>
					</center>
				</div>
				<br/>
				<br/>
				
				<div class="col-md-4 col-xs-12 panel panel-default">

					<?php
					$inter = mysql_query("SELECT * FROM bank_settings WHERE q_num = 1")or die(mysql_error());
					$int_now = mysql_fetch_array($inter);
					$card_num = $_POST['card_num'];
					$amount = $_POST['amount'];
					$end = date('Y-m-d', strtotime('+1 years'));
					if(isset($_POST['deposit'])){

						
					    $client = mysql_query("SELECT * FROM client WHERE card_number = '$card_num' AND account_type= '2'") or die(mysql_error());
					    $boop = mysql_query("SELECT * FROM bank_settings WHERE q_num = 1") or die(mysql_error());
					    $beep = mysql_fetch_array($boop);
					    
					    $client_name = mysql_fetch_array($client);
					    
					    



					    if($client_name['time_savings'] == 0){

					    	if($amount >= $beep['fixed_deposit']){

					    	$money = $amount * $int_now['interest_rate'];
					    	$int_day = $money / 365;
					    	
					    	}

					    	else{

					    	$_SESSION['wrong_card'] = 0;
							$_SESSION['deposit_success'] = 0;
							$_SESSION['withdraw_success'] = 0;
							$_SESSION['close_account'] = 0;
							$_SESSION['account_locked'] = 0;
							$_SESSION['low_input'] = 1;
							header("location:/abs/pages/teller.php?eid=$eid");

					    	}
					    }

					    else{
					    	$_SESSION['wrong_card'] = 0;
							$_SESSION['deposit_success'] = 0;
							$_SESSION['withdraw_success'] = 0;
							$_SESSION['close_account'] = 0;
							$_SESSION['account_locked'] = 1;
							header("location:/abs/pages/teller.php?eid=$eid");
					    }

					   $sum = $money + $amount;



					?>
<br/>				
					<table class="table table-condensed">
						<thead>
					        <tr>
					            <th><center>Account Holder</center></th>
					            <th><center>Account Number</center></th>
					            <th><center>Amount to Deposit</center></th>
					            <th><center>Gained per day</center></th>
					            <th><center>Interest Gained<?php echo "(".$int_now['interest_rate']."%)&nbsp".$end; ?></center></th>

					            
					        </tr>
					    </thead>
					    <tbody style="font-size:10pt;">
					    
					    	<tr>
					    		<th><center><?php echo $client_name['client_name']; ?></center></th>
					    		<th><center><?php echo $card_num; ?></center></th>
					    		<th><center><?php echo "P ".number_format($amount,2); ?></center></th>
					    		<th><center><?php echo "P ".number_format($int_day,2); ?></center></th>
					    		<th><center><?php echo "P ".number_format($money,2); ?></center></th>
					    		
					    	</tr>	
					    </tbody>
					</table>
					<br/>
					<br/>
				</div>
				
				<div class="col-md-6 col-xs 12">
				
					<a href="/abs/process/input_timedep.php?cop=<?php echo $card_num; ?>&amount=<?php echo $amount; ?>&int_gained=<?php echo $money; ?>&int_day=<?php echo $int_day; ?>&int=<?php echo $int_now['interest_rate']; ?>&sum=<?php echo $sum; ?>" class="btn btn-warning col-md-2 col-xs-4 col-md-offset-1 col-xs-offset-1">DEPOSIT</a>
					<a href="/abs/pages/teller.php?eid=<?php echo $eid; ?>" class="btn btn-warning col-md-2 col-xs-4 col-md-offset-2 col-xs-offset-2">CANCEL</a>
					



				</div>
					<?php }

				

				
					else if(isset($_POST['with_all'])){?>
<br/>
					<table class="table table-condensed">
						<thead>
					        <tr>
					            <th><center>Account Holder</center></th>
					            
					            <th><center>Time Deposit Savings</center></th>
					            <th><center>Penalty</center></th>
					            <th><center>Total Withdrawal</center></th>
					            
					        </tr>
					    </thead>
					    <tbody style="font-size:10pt;">
					    <?php 

					    $client = mysql_query("SELECT * FROM client WHERE card_number = '$card_num'") or die(mysql_error());
					    $client_name = mysql_fetch_array($client);
					    date_default_timezone_set("Asia/Hong_Kong"); 
						$date = date('Y-m-d');
					 	$date1= date_create($client_name['date_started']);
						$date2=date_create($date);
						$diff=date_diff($date1,$date2);
						$penalty = $diff->format("%a") * $client_name['int_perday'];
						$final_withdraw = $client_name['time_savings'] - $penalty;
					    ?>
					    	<tr>
					    		<th><center><?php echo $client_name['client_name']; ?></center></th>
					    		
					    		<th><center><?php echo "P ".number_format($client_name['time_savings'],2); ?></center></th>
					    		
					    		<th><center><?php echo "P" .number_format($penalty,2); ?></center></th>
								<th><center><?php echo "P ".number_format($final_withdraw,2); ?></center></th>
					    		
					    	</tr>	
					    </tbody>
					</table>
					
					<br/>
					
				</div>
				
				<div class="col-md-6 col-xs 12">
				
					<a href="/abs/process/req_close_account.php?eid=<?php echo $eid; ?>&cop=<?php echo $card_num; ?>&amount=<?php echo $amount; ?>" class="btn btn-danger col-md-2 col-xs-4 col-md-offset-1 col-xs-offset-1">CLOSE ACCOUNT</a>
					<a href="/abs/pages/teller.php?eid=<?php echo $eid; ?>" class="btn btn-warning col-md-2 col-xs-4 col-md-offset-2 col-xs-offset-2">CANCEL</a>
					



				</div>
				<?php }
				else{
						echo "ERROR 404";

					}
				 ?>
			</div>
		</div>
	

		
		
		<script src="/abs/js/jquery-1.11.1.min.js"></script>
		<script src="/abs/js/bootstrap.js" type="text/javascript"></script>
		<script type="text/javascript">
			causeRepaintsOn = $("h1, h2, h3, p");
			$(window).resize(function() {
			  causeRepaintsOn.css("z-index", 1);
			});
		</script>
</body>
</html>
<?php



}
else{
	if($sample['status'] == 3){
		$_SESSION['close_account'] = 1;
		$_SESSION['wrong_card'] = 0;
		
	}
		$_SESSION['wrong_card'] = 1;
		$_SESSION['deposit_success'] = 0;
		$_SESSION['withdraw_success'] = 0;
		$_SESSION['close_account'] = 0;
		$_SESSION['account_locked'] = 0;	
	header("location:/abs/pages/teller.php?eid=$eid");
}
	

?>