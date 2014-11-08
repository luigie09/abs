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
				margin: 10px;
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

			.client_name{
				font-size: 16pt;
			}

			.pads{
				margin-top: -400px;
			}
						
			#push{
				margin-bottom: 500px;
			}

			@media (max-width: 1004px){
				
				#push{
					margin: 0;
					padding: 0;
				}
				.pads{
					margin-top: 100;
				}

			}

	</style>
		</style>

	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					
		        		<ul class="list-inline">
		        		<li class="dropdow">

				         	<a href="#" class="dropdown-toggle" class="col-xs-12" data-toggle="dropdown"><img src="/abs/img/cog.png" style="width:35px; height:35px;"></a>
				          	
				          	<ul class="dropdown-menu col-md-3 col-xs-12" role="menu">
				            	<center>
				            	<li><p class="client_name">	<?php echo $_SESSION['rep_name']; ?><br/></p><small>Employee Name</small></li>
				            	<li class="divider"></li>
				            	<li><a href="/abs/process/logout_emp.php">LOGOUT ACCOUNT</a></li>				            
				          	</ul>
				        </li>
				        <li>
				        	<strong id="white"> <?php echo $_SESSION['rep_name']; ?> </strong>
				        </li></center>
		            </ul>
				
				</div>
				<div class="col-md-12" id="push">
					<center>
						<h1>ABS<text>inc.</text></h1>
						<p style="font-size:14pt;">Banking made easier. Banking at your fingertips.</p>
					</center>
				</div>			
			</div>
			<div class="col-md-12 col-xs-12 pads">

				<a href="/abs/pages/new_client.php?eid=<?php echo $eid; ?>" class="btn btn-warning col-md-3 col-xs-5">Add New Client</a>

			</div>

			<br/>
			<br/>
			<br/>
			<br/>

			<div class="col-md-12 col-xs-12">
			<?php if($_SESSION['money_left'] == 0){

				?>
				
				<div class="alert alert-danger alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-remove"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp CLIENT STILL HAS MONEY ON ACCOUNT!</strong>
				</div>	
				
				
				<?php
			}
				if($_SESSION['close_account'] == 0){

				?>
				
				<div class="alert alert-info alert-dismissible" role="alert">
					<span class="glyphicon glyphicon-ok"></span>
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<strong>&nbsp SUCCESSFULLY CLOSE ACCOUNT!</strong>
				</div>	
				
				
				<?php
			}
				?>
<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
        	
        	<th><center>Client Name</center></th>
        	<th><center>Account Number</center></th>
        	<th><center>Account Type</center></th>
        	<th><center>Status</center></th>
        	<th><center>Reason</center></th>
        	<th><center>Action</center></th>

		</tr>
    </thead>
    <tbody><?php 

        		$query = mysql_query("SELECT * FROM client");
        		while($data = mysql_fetch_array($query)){
        	 ?>
        <tr class="gradeX">
        	
            <td><center><?php echo $data['client_name']; ?></center></td>
            <td><center><?php echo $data['card_number']; ?></center></td>

            <?php if($data['account_type'] == 2){ ?>
					<td><center><?php echo "Fixed" ?></center></td>
			<?php }
				  else{ ?>
				 	<td><center><?php echo "Savings" ?></center></td>
			<?php } ?>

			
			<?php 
				  if($data['status'] == 3){ ?>
					<td><center><?php echo "Request Close Account" ?></center></td>
			<?php }
				  else{ ?>
				 	<td><center><?php echo "------" ?></center></td>
			<?php } ?>

			
			<?php 
				  if($data['status'] == 3){ ?>
					<td><center><?php echo "Request for Time Deposit Close Account" ?></center></td>
			<?php }
				  else{ ?>
				 	<td><center><?php echo "------" ?></center></td>
			<?php } ?>
           	<td><center>

           		<a href="/abs/process/close_account.php?eid=<?php echo $eid; ?>&card_num=<?php echo $data['card_number']; ?>" class="btn btn-danger">Close Account</a>

           		
           	</center></td>

           	
        </tr><?php } ?>
    </tbody>
</table>

			</div>
</div>
		
		<script src="/abs/js/jquery-1.11.1.min.js"></script>
		<script src="/abs/js/bootstrap.js" type="text/javascript"></script>
		<script src="/abs/js/jquery.dataTables.min.js"></script>
		<script src="/abs/js/dataTables.bootstrap.js"></script>
		<script src="/abs/js/datatables.js"></script>
		
		<script type="text/javascript">
			causeRepaintsOn = $("h1, h2, h3, p");
			$(window).resize(function() {
			  causeRepaintsOn.css("z-index", 1);
			});
		</script>

		<script type="text/javascript">
    $(document).ready(function() {
      $('.datatable').dataTable({
        "sPaginationType": "bs_full",
        "bFilter" :false
      }); 
      $('.datatable').each(function(){
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
        search_input.addClass('form-control input-sm');
        // LENGTH - Inline-Form control
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        length_sel.addClass('form-control input-sm');
      });
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