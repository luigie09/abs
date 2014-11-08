<?php 
session_start();
error_reporting(0);
include("database.php");
if(isset($_POST['pass_rep_user'])){
$eid = $_GET['eid'];
$card_num = $_POST['card_num'];


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
					
				</div>
				<div class="col-md-6" id="push">

					




<div class="big_text panel panel-default col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">	
					



					


<h4><center>SAVINGS ACCOUNT SUMMARY</center></h4>
					<br/>					
					<table class="table table-condensed">
						<thead>
					        <tr>
					            <th><center>Account Holder</center></th>
					            <th><center>Current Savings</center></th>
					            <th><center>Widthraw</center></th>
					            <th><center>Deposit</center></th>
					            <th><center>Date Last Updated</center></th>
					        </tr>
					    </thead>
					    <tbody style="font-size:10pt;">
					    	<?php 
					    	$history = mysql_query("SELECT * FROM client_activity WHERE act_no = '$card_num' AND service_type = 1 ORDER BY row_num")or die(mysql_error());
					    	while($datas = mysql_fetch_array($history)){

					    	?>
					    	<tr>
					    		<th><center><?php echo $datas['client_name']; ?></center></th>
					    		<th><center>P <?php echo number_format($datas['savings_total'],2); ?></center></th>
					    		<th><center><?php 

					    		if($datas['withdraw'] == 0){
					    			echo "";
					    		}
					    		else{
					    			echo "P ".number_format($datas['withdraw'],2);

					    		}

					    		 ?></center></th>
					    		<th><center><?php 

					    		if($datas['deposit'] == 0){
					    			echo "";
					    		}
					    		else{
					    			echo "P ".number_format($datas['deposit'],2);
					    		}

					    		 ?></center></th>
					    		<th><center><?php echo $datas['date']; ?></center></th>
					    	</tr>
					    	<?php } ?>
					    </tbody>
					</table>
					<br/>
					<br/>
				
					<a href="/abs/pages/teller.php?eid=<?php echo $eid; ?>" class="btn btn-warning col-md-12 col-xs-12">Done</a>
					<br/>
					<br/>

				</div>
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

} 

else{
	echo "ERROR 404";
}
?>