<?php 
session_start();
error_reporting(0);
include("database.php");
$doll = $_SESSION['pin_number'];
$voodoo = md5($doll);
$pin_number = $_POST['pin_num'];
$pin_hash = md5($pin_number);
if($pin_hash == $voodoo){
	$_SESSION['deposit_error'] = 0;

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
					<h4><center>CONFIRM DEPOSIT</center></h4>
						<div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">
							<br/>
							<table class="table table-condensed">
								<thead>
									<tr>
										<td>ACCOUNT HOLDER</td>
										<td>CARD NUMBER</td>
										<td>AMOUNT</td>
									</tr>
								</thead>
								<tbody>
									<tr>
									<?php
										$query = mysql_query("SELECT * FROM client WHERE client_pin = '$pin_hash'")or die(mysql_error());
										$data = mysql_fetch_array($query);

									 ?><center>
										<td><?php echo $data['client_name']; ?></td>
										<td><?php echo "# ".$data['card_number']; ?></td>
										<td><?php echo "P ".number_format($_POST['deposit_amount'],2); ?></td>
										</center>
									</tr>
								</tbody>
							</table>

							<br/>

						</div>	
						<div class="col-md-11 col-xs-11 col-md-offset-1 col-xs-offset-1">
						<a class="btn btn-danger col-md-5 col-xs-5" href="/abs/process/deposit_slip_timedep.php?edom=<?php echo $voodoo; ?>&amount=<?php echo $_POST['deposit_amount']; ?>" name = "deposit_me">CONFIRM</a>
						<a class="btn btn-info col-md-5 col-xs-5 col-xs-offset-1" href="time_dep_slip.php?edom=<?php echo $voodoo; ?>">GO BACK</a>
						<br/><br/>
						<br/>
						</div><br/>
					</div><br/>
				</div><br/>
			</div><br/>
		
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
<?php
}
else{
	$_SESSION['deposit_error'] = 1;
	header("location:/abs/pages/deposit_slip.php?edom=$voodoo");
}

?>