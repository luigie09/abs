<?php 
session_start();
error_reporting(0);
if($_SESSION['log_user'] == 1){
	$doll = $_SESSION['pin_number'];
	$voodoo = md5($doll);
	header("location: /abs/pages/user.php?edom=$voodoo");
}
else{

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
				margin: 250px;
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



	</style>
		</style>

	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-md-6">

					<center>
						<h1>ABS<text>inc.</text></h1>
						<p style="font-size:14pt;">Banking made easier. Banking at your fingertips.</p>
					</center>
				</div>
				<div class="col-md-4 col-md-offset-1 col-xs-12">
					<br/>
					<br/>
					
					<form role="form" action="/abs/process/acc_verify.php" method="POST" >
						<label for="card_number"><strong>CARD NUMBER</strong></label>
							<input type="text" class="form-control" id="card_number" placeholder="Enter 10 (Ten) Digit Card Number" name="card_num" REQUIRED>
					<br/>
					<br/>
						<label for="card_number"><strong>PIN NUMBER</strong></label>
							<input type="password" class="form-control" id="card_number" placeholder="Enter 6 (Six) Digit Pin Number" name="pin_num" REQUIRED>
					<br/> 
					<br/> 
					 <input type="submit" class="btn btn-info col-md-12 col-xs-12" name="passiton" value="LOGIN CLIENT">

					</form>
				</div>
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

} ?>