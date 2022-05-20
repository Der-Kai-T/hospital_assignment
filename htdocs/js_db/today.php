<?php

include("../include/times.php");

$ts = time();

$today = date("Y-m-d", $ts);
echo json_encode($today);
?>