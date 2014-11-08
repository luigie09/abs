<?php 
session_start();
error_reporting(0);
include("database.php");
$doll = $_SESSION['pin_number'];
$voodoo = md5($doll);
$seem = mysql_query("SELECT *,SUM(deposit) as month_dep, CONCAT(deposit,date_num) FROM client_activity WHERE client_pin = '$voodoo' GROUP BY date_num ORDER BY date_num DESC")or die(mysql_error());

//DEFAULT VARIABLES FOR DEPOSIT	
	$jan_dep = 0;
	$feb_dep = 0;
	$mar_dep = 0;
	$apr_dep = 0;
	$may_dep = 0;
	$jun_dep = 0;
	$jul_dep = 0;
	$aug_dep = 0;
	$sept_dep = 0;
	$oct_dep = 0;
	$nov_dep = 0;	
	$dec_dep = 0;

//DEFAULT VARIABLES FOR WITHDRAW

	$jan_wid = 0;
	$feb_wid = 0;
	$mar_wid = 0;
	$apr_wid = 0;
	$may_wid = 0;
	$jun_wid = 0;
	$jul_wid = 0;
	$aug_wid = 0;
	$sept_wid = 0;
	$oct_wid = 0;
	$nov_wid = 0;	
	$dec_wid = 0;

// LOOP FOR DEPOSIT

while($use = mysql_fetch_array($seem)){
		
		if($use['date_num'] == 1){
		$january = $use['date_num'];
		$jan_dep = $use['month_dep'];

	}
	else if($use['date_num'] == 2){
		$february =  $use['date_num'];
		$feb_dep = $use['month_dep'];
	}
	else if($use['date_num'] == 3){
		$march = $use['date_num'];
		$mar_dep = $use['month_dep'];
	}
	else if($use['date_num'] == 4){
		$april = $use['date_num'];
		$apr_dep = $use['month_dep'];
	}
	else if($use['date_num'] == 5){
		$may = $use['date_num'];
		$may_dep = $use['month_dep'];
	}
	else if($use['date_num'] == 6){
		$june = $use['date_num'];
		$jun_dep = $use['month_dep'];
	}
	else if($use['date_num'] == 7){
		$july = $use['date_num'];
		$jul_dep = $use['month_dep'];
	}
	else if($use['date_num'] == 8){
		$august = $use['date_num'];
		$aug_dep = $use['month_dep'];
	}
	else if($use['date_num'] == 9){
		$september = $use['date_num'];
		$sept_dep = $use['month_dep'];
	}
	else if($use['date_num'] == 10){
		$october = $use['date_num'];
		$oct_dep = $use['month_dep'];

	}
	else if($use['date_num'] == 11){
		$november = $use['date_num'];
		$nov_dep = $use['month_dep'];
	}
	else if($use['date_num'] == 12){
		$december = $use['date_num'];
		$dec_dep = $use['month_dep'];
	}

}

//QUERY FOR WITHDRAW

$seems = mysql_query("SELECT *,SUM(withdraw) as month_wid, CONCAT(withdraw,date_num) FROM client_activity WHERE client_pin = '$voodoo' GROUP BY date_num ORDER BY date_num DESC")or die(mysql_error());


// LOOP FOR WITHDRAW

while($fuse = mysql_fetch_array($seems)){
		
		if($fuse['date_num'] == 1){
		$january = $fuse['date_num'];
		$jan_wid = $fuse['month_wid'];

	}
	else if($fuse['date_num'] == 2){
		$february =  $fuse['date_num'];
		$feb_wid = $fuse['month_wid'];
	}
	else if($use['date_num'] == 3){
		$march = $fuse['date_num'];
		$mar_wid= $fuse['month_wid'];
	}
	else if($fuse['date_num'] == 4){
		$april = $fuse['date_num'];
		$apr_wid = $fuse['month_wid'];
	}
	else if($fuse['date_num'] == 5){
		$may = $fuse['date_num'];
		$may_wid = $fuse['month_wid'];
	}
	else if($fuse['date_num'] == 6){
		$june = $fuse['date_num'];
		$jun_wid = $fuse['month_wid'];
	}
	else if($fuse['date_num'] == 7){
		$july = $fuse['date_num'];
		$jul_wid = $fuse['month_wid'];
	}
	else if($fuse['date_num'] == 8){
		$august = $fuse['date_num'];
		$aug_wid =$fuse['month_wid'];
	}
	else if($fuse['date_num'] == 9){
		$september = $fuse['date_num'];
		$sept_wid = $fuse['month_wid'];
	}
	else if($fuse['date_num'] == 10){
		$october = $fuse['date_num'];
		$oct_wid = $fuse['month_wid'];

	}
	else if($fuse['date_num'] == 11){
		$november = $fuse['date_num'];
		$nov_wid = $fuse['month_wid'];
	}
	else if($fuse['date_num'] == 12){
		$december = $fuse['date_num'];
		$dec_wid = $fuse['month_wid'];
	}

}


	


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

			 .user_money{
			 	font-size: 30pt;
			 }

			
			
		</style>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		
		<script type="text/javascript">
			$(function () {
			    $('#container').highcharts({
			        title: {
			            text: 'Monthly Activity 2014',
			            x: -20 //center
			        },
			        subtitle: {
			            text: 'Savings Trail',
			            x: -20
			        },
			        xAxis: {
			            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
			                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			        },
			        yAxis: {
			            title: {
			                text: 'Amount in Peso'
			            },
			            plotLines: [{
			                value: 0,
			                width: 4,
			                color: '#808080'
			            }]
			        },
			        
			        legend: {
			            layout: 'vertical',
			            align: 'right',
			            verticalAlign: 'middle',
			            borderWidth: 0
			        },
			        series: [{
			            name: 'Deposit',
			            data: [

<?php 	echo $jan_dep.",".$feb_dep.",".$mar_dep.",".$apr_dep.",".$may_dep.",".$jun_dep.",".$jul_dep.",".$aug_dep.",".$sept_dep.",".$oct_dep.",".$nov_dep.",".$dec_dep;
		?>





			            ]
			        }, {
			            name: 'Widthraw',
			            data: [
<?php 	echo $jan_wid.",".$feb_wid.",".$mar_wid.",".$apr_wid.",".$may_wid.",".$jun_wid.",".$jul_wid.",".$aug_wid.",".$sept_wid.",".$oct_wid.",".$nov_wid.",".$dec_wid;
		?>

			            ]
			        }]
			    });
			});
		</script>
	

<?php  ?>

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
		        		<li class="dropdown">
				         	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog icon-caret"></span></a>
				          	<ul class="dropdown-menu" role="menu">
				            	<li><p class="client_name"><u><?php echo $witch['client_name']; ?></u><br/><small>Client Name</small></p></li>
				            	<li class="divider"></li>
				            	<li><a href="/abs/process/logout.php">LOGOUT CLIENT</a></li>				            
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
				<div class="panel panel-default col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">
					<center>
					<p class="user_money">P <?php 

					$saving = mysql_query("SELECT * FROM client WHERE client_pin = '$voodoo'") or die(mysql_error());
					$user_savings = mysql_fetch_array($saving);


					echo number_format($user_savings['savings'],2); ?></p>
					
					<p>CURRENT SAVINGS</p>
					</center>
				</div>
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
					    	$history = mysql_query("SELECT * FROM client_activity WHERE client_pin = '$voodoo' AND service_type = 1 ORDER BY row_num DESC LIMIT 7")or die(mysql_error());
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
					<div>
						<a href="deposit_slip.php?edom=<?php echo $voodoo; ?>" class="btn btn-alert btn-sm">View Full Account History</a>
						<br/>
						<br/>
						<br/>
					</div>
					<div class="">
						<a href="deposit_slip.php?edom=<?php echo $voodoo; ?>" class="btn btn-info col-md-3 col-xs-3 col-xs-offset-3">DEPOSIT</a>
						<div class="cold-md-1 col-xs-1"></div>
						<a href="withdraw_slip.php?edom=<?php echo $voodoo; ?>" class="btn btn-info col-md-3 col-xs-3 ">WITHDRAW</a>
					</div>
					<br/>
					<br/>
					<br/>

				</div>

				<div id="container" class= "bottom" style="width:80%; height: 400px; margin: 0 auto; margin-bottom:85%;"></div>
				
				
				</div>
			
		</div>
		<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
			<br/>
			<br/>
			<br/>
			<br/>

		</nav>

	<script src="/abs/js/highcharts.js"></script>
	<script src="/abs/js/exporting.js"></script>
	
	<script src="/abs/js/bootstrap.js" type="text/javascript"></script>
	<script type="text/javascript">
		causeRepaintsOn = $("h1, h2, h3, p");
		$(window).resize(function() {
		causeRepaintsOn.css("z-index", 1);
		});
	</script>
	</body>
</html>