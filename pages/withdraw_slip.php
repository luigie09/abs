<?php 
session_start();
error_reporting(0);
include("database.php");
$doll = $_SESSION['pin_number'];
$voodoo = md5($doll);
?>
<html>
	<head>
		<title>User Account </title>
		<link href="/abs/css/bootstrap.min.css" rel="stylesheet">
		<link href="/abs/css/bootstrap.css" rel="stylesheet">
		
		<style>
			@import url("/abs/css/bootstrap-glyphicons.css");


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
				font-family: LatoBold;
			}

			body {
				margin-top: 13%;				
				background: transparent;
				font-family: LatoBold;
			}

			h3{ 
				font-size: 5vw;
				font-family: LatoBold;

			}

			.navbar-brand{
				padding-left: 40%;
				margin-top:-4%;
			}

			text1{
				font-family: LatoHair;
			}

			text{
				font-family: LatoBold;
			}

			.links{
				padding-top: 2.5%;
				padding-left: 5%;
				padding-right: 5%;
				font-size: 15pt;
			}

			li:hover{
				font-weight: bold;
			}

			.dropdown-menu{
				padding-top: 30px;
				width: 300px;
			}

			li:hover{
				background-color: #E5F3FF;
			}
			.nav .active a { 
				background:white!important;
				text-decoration: underline;
				font-weight: bold;
			 } 
			 .client_name{
			 	font-size: 15pt;
			 }

			 .big_text h4{
			 	font-family: LatoBold;
			 }

			
		</style>

	</head>
	<body>
		
		<!-- START OF NAV -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		  	<div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#"><h3>ABS<text1>inc.</text1></h3></a>
			    </div>

			<?php

				$query = mysql_query("SELECT * FROM client WHERE client_pin = '$voodoo'") or die(mysql_error());
				$witch = mysql_fetch_array($query);

			 ?>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <center>
		        	<ul class="nav navbar-nav navbar-right links">
		        		<li class="active"><a href="/abs/pages/user.php?edom=<?php echo $voodoo; ?>">Savings <text1>Account</text1></a></li>
		        		<li class="divider"></li>
		        		<li><a href="#">Time Deposit <text1>Account</text1></a></li>
		        		<li class="dropdown">
				         	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog icon-caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><p class="client_name"><u><?php echo $witch['client_name']; ?></u><br/><small>Client Name</small></p></li>
				            	<li class="divider"></li>
				            	<li><a href="#">LOGOUT</a></li>				            
				          	</ul>
				        </li>
		            </ul>
		       	</center>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<!-- END OF NAV -->

		<div class="container-fluid">
			<div class="row">
				<div class="big_text panel panel-default col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">	<br/>
					<h4><center>WIDTHRAWAL FORM</center></h4>
						<div class="col-md-8 col-xs-8 col-md-offset-2 col-xs-offset-2">

					<form role="form" action="/abs/pages/withdrawal_confirmation.php?edom=<?php echo $voodoo ?>" method="POST" >
						<?php
						if($_SESSION['deposit_error'] == 1){ ?>
						<div class="alert alert-danger" role="alert"><strong>SORRY.</strong> Wrong Pin number</div>

						<?php 
							}

						?>
						<label for="card_number"><strong>AMOUNT IN PESO</strong><small>   ( Minimum Withdraw is P150.00, Maximum is P850,000.00 )</small></label>
							<input type="number" class="form-control" id="card_number" placeholder="Amount In Digits" name="deposit_amount" min="150" max="850000" step="any" required>
					
					<br/>
						<label for="card_number"><strong>PIN NUMBER</strong></label>
							<input type="password" class="form-control" id="card_number" placeholder="Enter 6 (Six) Digit Pin Number" name="pin_num" required>
					<br/> 
					<br/> 
					 <input type="submit" class="btn btn-info col-md-12 col-xs-12" name="withdraw_activate" value="WITHDRAW">
					</form>
						</div>
					<br/>
				</div>
			</div>
		</div>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="/abs/js/bootstrap.js" type="text/javascript"></script>
	<script type="text/javascript">
		causeRepaintsOn = $("h1, h2, h3, p");
		$(window).resize(function() {
		causeRepaintsOn.css("z-index", 1);
		});
	</script>
	</body>
</html>