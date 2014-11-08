<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ABS | Automated Banking System</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">




	<style>
	
	
		html {
			background: url(img/1.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}

		body {
			margin: 250px;
			background: transparent;
			
		}



		.panel {
			background-color: rgba(231, 244, 254, 0.9);
			border: 0;
		}

		.margin-base-vertical {
			margin: 40px 0;
		}

		button{
			padding-left: 10px;
			padding-right: 10px;
		}

	</style>

</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 col-xs-12 panel panel-default ">
				<center>
					
				
					<p><img src="/abs/img/logo.png" style="width:350px; height:250px;"></p>
					<p><h5><strong>Automated Banking System</strong></h5></p>
					<p><small>BANKING MADE EASIER | BANKING ON YOUR FINGERTIPS</small></p>
					<p>&nbsp</p>
					<p>
						This system reflects the capabilities and functionalities of 
						a bank. Here, the users can do online what they do in their own
						offices. Checking your savings, widthrawwing money, managing your
						accounts have never been easier! 
					</p>
					<p>&nbsp</p>

				</center>
			</div>
			<div class="col-md-6 col-xs-12 col-md-offset-1 pull-left panel panel-default">
<div>&nbsp</div>
			
				<form role="form" action="/abs/process/acc_verify.php" method="POST" >
  					<div class="form-group">
  					<?php
  						if($_SESSION['log_error'] == 1){
  							echo "<div class='alert alert-danger' role='alert'>Mismatched Information Received. Please Try Again.</div>";
  						}

  					?>
  					 
					    <label for="card_number"><strong>CARD NUMBER</strong></label>
					    <input type="text" class="form-control" id="card_number" placeholder="Enter 10 (Ten) Digit Card Number" name="card_num">
 					</div>
				    <div class="form-group">
				    	<label for="exampleInputPassword1"><strong>PIN NUMBER</strong></label>
				    	<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter 6 (Six) Digit Card Number" name="pin_num">
				    </div>
  
  						<button type="submit" class="btn btn-primary" name="passiton">Login</button>
				</form>
			
			<div>&nbsp</div> 
			<div>&nbsp</div>
				

			</div><!-- //main content -->
		</div><!-- //row -->
	</div> <!-- //container -->

<script src="/abs/js/jquery-1.11.1.min.js"></script>
<script src="/abs/js/bootstrap.js" type="text/javascript"></script>


</body>
</html>