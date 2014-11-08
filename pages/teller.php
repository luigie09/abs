<?php 
session_start();
error_reporting(0);
include("database.php");
if($_SESSION['log_teller'] == 1){
$eid = $_GET['eid'];


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

					




<div class="big_text panel panel-default col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">	
					


<?php 

					if($_SESSION['deposit_success'] == 1){

				?>
				<br/>
				<br/>
				<div class="alert alert-success alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-ok"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp DEPOSIT SUCCESS!</strong>
				</div>	
				
				
				<br/>
				<?php } 
					else if($_SESSION['withdraw_success'] == 1){
					?>
					<br/>
				<br/>
				<div class="alert alert-success alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-ok"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp WITHDRAW SUCCESS!</strong>
				</div>	
				
				
				<?php }
				else if($_SESSION['wrong_card'] == 1){
					?>
					<br/>
				<br/>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-remove"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp WRONG CARD NUMBER</strong>
				</div>	
				
				
				<?php }
				else if($_SESSION['close_account'] == 1){
					?>
					<br/>
				<br/>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-remove"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp ACCOUNT HAS BEEN SET FOR CLOSURE</strong>
				</div>	
				
				<br/>
				<br/>
				<?php }
				else if($_SESSION['account_error'] == 1){
					?>
					<br/>
				<br/>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-remove"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp CAN'T DEPOSIT TO ACCOUNT</strong>
				</div>	
				<?php }
				else if($_SESSION['account_locked'] == 1){
					?>
					<br/>
				<br/>
				<div class="alert alert-info alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-remove"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp ACCOUNT LOCKED</strong>
				</div>	
				<?php }
				else if($_SESSION['low_input'] == 1){
					?>
					<br/>
				<br/>
				<div class="alert alert-info alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-remove"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp INPUT IS LESS THAN THE REQUIRED AMOUNT</strong>
				</div>	
				
				<?php }
				else if($_SESSION['no_money'] == 1){
					?>
					<br/>
				<br/>
				<div class="alert alert-info alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-remove"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp NO MONEY LEFT ON ACCOUNT</strong>
				</div>	
				
				
				<?php }
				?>

					<h4><strong><center>SAVINGS ACCOUNT</center></strong></h4>
										
					<table class="table table-condensed">
						<thead>
					        <tr>
					            <th><center>Account Holder</center></th>
					            <th><center>Current Savings</center></th>
					            <th><center>Date Last Updated</center></th>
					        </tr>
					    </thead>
					    <tbody style="font-size:10pt;">
					    	<?php 
					    	$history = mysql_query("SELECT * FROM client WHERE account_type != 2 ORDER BY unq_num DESC LIMIT 7")or die(mysql_error());
					    	while($datas = mysql_fetch_array($history)){

					    	?>
					    	<tr>
					    		<th><center><?php echo $datas['client_name']; ?></center></th>
					    		<th><center>P <?php echo number_format($datas['savings'],2); ?></center></th>
					    		<th><center><?php echo $datas['date_updated']; ?></center></th>
					    	</tr>
					    	<?php } ?>
					    </tbody>
					</table>
					
					<br/>
					<br/>
					<br/>


					<h4><strong><center>FIXED ACCOUNT</center></strong></h4>
										
					<table class="table table-condensed">
						<thead>
					        <tr>
					            <th><center>Account Holder</center></th>
					            <th><center>Current Savings</center></th>
					            <th><center>Savings after Minimum Year </center></th>
					            <th><center>Interest per Day</center></th>
					            <th><center>Interest </center></th>
					            <th><center>Date Started</center></th>
					        </tr>
					    </thead>
					    <tbody style="font-size:10pt;">
					    	<?php 
					    	$history = mysql_query("SELECT * FROM client WHERE account_type != 1 ORDER BY unq_num DESC LIMIT 7")or die(mysql_error());
					    	while($datas = mysql_fetch_array($history)){

					    	?>
					    	<tr>
					    		<th><center><?php echo $datas['client_name']; ?></center></th>
					    		<th><center>P <?php echo number_format($datas['time_savings'],2); ?></center></th>
					    		<th><center>P <?php echo number_format($datas['interest_earned'],2); ?></center></th>
					    		<th><center>P <?php echo number_format($datas['int_perday'],2); ?></center></th>
					    		<th><center><?php echo number_format($datas['interest'],2); ?>%</center></th>
					    		<th><center><?php echo $datas['date_started']; ?></center></th>
					    	</tr>
					    	<?php } ?>
					    </tbody>
					</table>
					<br/>

				</div>
	</div>
				
				

				


				<button type="button" class="btn btn-warning col-md-4 col-md-offset-1 col-xs-12 " data-toggle="collapse" data-target="#fixed">SAVINGS ACCOUNT</button>
				<br/>
				<div class="col-md-4 col-md-offset-1 col-xs-12 collapse" id="fixed">
					

					
					<form role="form" action="/abs/pages/savings_opt.php" method="POST" >
					<br/>
						<label for="card_number"><strong>SAVINGS ACCOUNT NUMBER</strong></label>
							<input type="text" class="form-control" id="card_number" placeholder="Enter 10 (Ten) Digit Card Number" name="card_num" REQUIRED>
					<br/>
					
<label for="card_number"><strong>AMOUNT IN PESO</strong><small>   ( Minimum Deposit is P150.00, maximum is P850,000.00 )</small></label>
							<input type="number" class="form-control" id="card_number" placeholder="Amount In Digits" name="amount" min="150" max="850000" step="any" required>					<br/> 
					
					 <input type="submit" class="btn btn-info col-md-4 col-xs-4 col-md-offset-1 col-xs-offset-1" name="deposit" value="DEPOSIT">
					 <input type="submit" class="btn btn-info col-md-4 col-xs-4 col-md-offset-2 col-xs-offset-2" name="withdraw" value="WITHDRAW">
<br/>
<br/>
					</form>
				</div>
				<br/>
				<br/>

				<button type="button" class="btn btn-warning col-md-4 col-md-offset-1 col-xs-12 " data-toggle="collapse" data-target="#savings">FIXED ACCOUNT</button>
				<br/>
				<div class="col-md-4 col-md-offset-1 col-xs-12 collapse" id="savings">
					
					
					<form role="form" action="/abs/pages/time_dep.php" method="POST" >
					<br/>
						<label for="card_number"><strong>CARD NUMBER</strong></label>
							<input type="text" class="form-control" id="card_number" placeholder="Enter 10 (Ten) Digit Card Number" name="card_num" REQUIRED>
					<br/>
						<label for="card_number"><strong>AMOUNT IN PESO</strong><small>   ( Minimum Deposit is P150.00, maximum is P850,000.00 )</small></label>
							<input type="number" class="form-control" id="card_number" placeholder="Amount In Digits" name="amount" min="150" max="850000" step="any">					<br/> 
					
					 <input type="submit" class="btn btn-info col-md-6 col-xs-6 col-md-offset-3 col-xs-offset-3" name="deposit" value="DEPOSIT">
					 <br/>
					 <br/>
					 <input type="submit" class="btn btn-danger col-md-6 col-xs-6 col-md-offset-3 col-xs-offset-3" name="with_all" value="CLOSE ACCOUNT (WITHDRAW ALL)">
<br/>


					</form>
				</div>
				<br/>
				<br/>
				
				<button type="button" class="btn btn-warning col-md-4 col-md-offset-1 col-xs-12 " data-toggle="collapse" data-target="#rep_spec">GENERATE REPORT</button>
				<br/>
				<div class="col-md-4 col-md-offset-1 col-xs-12 collapse" id="rep_spec">
					
					
					<form role="form" action="/abs/pages/report.php?eid=<?php echo $eid; ?>" method="POST">
						<br/>
						<label for="card_number"><strong>CARD NUMBER</strong></label>
							<input type="text" class="form-control" id="card_number" placeholder="Enter 10 (Ten) Digit Card Number" name="card_num" REQUIRED>
					<br/>
					<br/> 
					
					 <input type="submit" class="btn btn-info col-md-12 col-xs-12" name="pass_rep_user" value="CREATE REPORT">

					</form>
				</div>

				<br/>
				<br/>
							
				
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
	echo "ERROR 404";
}
?>