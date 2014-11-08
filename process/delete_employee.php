<?php
session_start();
error_reporting(0);
include("database.php");
$emp_num = $_GET['emp_num'];
$eid = $_GET['eid'];
$delete = mysql_query("DELETE FROM employee_db WHERE id = '$emp_num'");
$_SESSION['fire_employee'] = 1;
header("location:/abs/pages/admin.php?eid=$eid")

?>