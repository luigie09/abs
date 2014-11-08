<?php

session_start();
$eid = $_SESSION['teller_id'];
header("location:/abs/pages/teller.php?eid=$eid");

?>