<?php 
session_start();
error_reporting(0);

if($_SESSION['log_teller'] == 1){
include("database.php");
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
				            	<li><p class="client_name"><?php echo $_SESSION['man_name']; ?><br/></p><small>Employee Name</small></li>
				            	<li class="divider"></li>
				            	<li><a href="/abs/process/logout_emp.php">LOGOUT ACCOUNT</a></li>				            
				          	</ul>
				        </li>
				        <li>
				        	<strong id="white"> <?php echo $_SESSION['man_name']; ?> </strong>
				        </li></center>
		            </ul>
				
				</div>
				<div class="col-md-6" id="push">
					<center>
						<h1>ABS<text>inc.</text></h1>
						<p style="font-size:14pt;">Banking made easier. Banking at your fingertips.</p>
					</center>
					<?php 

					if($_SESSION['fixed_dep'] == 1){

				?>
				<br/>
				<br/>
				<div class="alert alert-success alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-ok"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp MINIMUM DEPOSIT UPDATED!</strong>
				</div>	
				<br/>
				<?php } 
					else if($_SESSION['int_rate'] == 1){

				?>
				<br/>
				<br/>
				<div class="alert alert-success alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-ok"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp DEPOSIT RATE UPDATED!</strong>
				</div>	
				<br/>
				<?php } 
					else if($_SESSION['created'] == 1){

				?>
				<br/>
				<br/>
				<div class="alert alert-success alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-ok"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp EMPLOYEE ACCOUNT CREATED!</strong>
				</div>	
				<br/>
				<?php }  ?>				

				</div>



<button type="button" class="btn btn-warning col-md-4 col-md-offset-1 col-xs-12 " data-toggle="collapse" data-target="#create">ADD NEW EMPLOYEE</button>
				
				<div class="col-md-4 col-md-offset-1 col-xs-12 collapse" id="create">
					<br/>
					
					
					<form role="form" action="/abs/process/new_telcust.php?eid=<?php echo $eid; ?>" method="POST" >
					<br/>
						
							<input type="text"  class="form-control" id="card_number" placeholder="Employee Full Name" name="full_name" REQUIRED>
						<br/>
					
							<input type="text"  class="form-control" id="card_number" placeholder="Employee Username" name="id" REQUIRED>
						<br/>
						
							<input type="password"  class="form-control" id="card_number" placeholder="Password" name="password" REQUIRED>
					<br/>
					<select class="form-control" name="position" required>
						  <option>Teller</option>
						  <option>Customer Representative</option>
					</select>
						<br/>
					 <input type="submit" class="btn btn-info col-md-12 col-xs-12" name="create_account" value="Create Account">
					

					</form>
				</div>
				<br/>
				<br/>
<br/>

				<!-- MINIMUM DEPOSIT -->
				
				<button type="button" class="btn btn-warning col-md-4 col-md-offset-1 col-xs-12 " data-toggle="collapse" data-target="#fixed">CHANGE MINIMUM FIXED DEPOSIT</button>
				
				<div class="col-md-4 col-md-offset-1 col-xs-12 collapse" id="fixed">
					<br/>
					<div class = panel panel-default>
						<table class="table table-condensed">
						<thead>
					        <tr>
					            <th><center>Current Fixed Deposit Minimum Amount</center></th>
					            <th><center>Date Last Updated</center></th>
					        </tr>
					    </thead>
					    <tbody style="font-size:10pt;">
					    	<tr>
					    		<?php 

					    			$nice = mysql_query("SELECT * FROM bank_settings WHERE q_num ='1' ") or die(mysql_error());
					    			$choo = mysql_fetch_array($nice);

					    		 ?>
					    		<th><center><?php echo "P ".number_format($choo['fixed_deposit'],2); ?></center></th>
					    		<th><center><?php echo $choo['fixeddep_date']; ?></center></th>

					    	</tr>	
					    </tbody>
					</table>
					</div>
					
					<form role="form" action="/abs/process/bank_settings.php" method="POST" >
					<br/>
						<label for="card_number"><strong>New Minimum Amount</strong></label>
							<input type="number" min="10000" max="100000" class="form-control" id="card_number" placeholder="Place Amount Here" name="timedep_amount" REQUIRED>
					<br/>
					
					 <input type="submit" class="btn btn-info col-md-12 col-xs-12" name="changemin_dept" value="Update Minimum Amount">
					

					</form>
				</div>
				<br/>
				<br/>
<br/>

				
				<!-- INTEREST RATE -->
				<button type="button" class="btn btn-warning col-md-4 col-md-offset-1 col-xs-12 " data-toggle="collapse" data-target="#interest">CHANGE INTEREST RATE</button>
				
				<div class="col-md-4 col-md-offset-1 col-xs-12 collapse" id="interest">
					<br/>
					<div class = panel panel-default>
						<table class="table table-condensed">
						<thead>
					        <tr>
					            <th><center>Current Interest Rate</center></th>
					            <th><center>Date Last Updated</center></th>
					        </tr>
					    </thead>
					    <tbody style="font-size:10pt;">
					    	<tr>
					    		<?php 

					    			$nice = mysql_query("SELECT * FROM bank_settings WHERE q_num ='1' ") or die(mysql_error());
					    			$choo = mysql_fetch_array($nice);

					    		 ?>
					    		<th><center><?php echo number_format($choo['interest_rate'],2)." %"; ?></center></th>
					    		<th><center><?php echo $choo['interest_date']; ?></center></th>

					    	</tr>	
					    </tbody>
					</table>
					</div>
					
					<form role="form" action="/abs/process/bank_settings.php" method="POST" >
					<br/>
						<label for="card_number"><strong>New Interest Rate</strong></label>
							<input type="number" step="any" min=".01" max="20" class="form-control" id="card_number" placeholder="Place Amount Here" name="int_rate" REQUIRED>
					<br/>
					
					 <input type="submit" class="btn btn-info col-md-12 col-xs-12" name="change_interest" value="Update Interest">
					

					</form>
				</div>
				<br/>
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