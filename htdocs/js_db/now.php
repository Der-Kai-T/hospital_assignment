<?php

include("../include/times.php");

$ts = time();

$today = date("H:i", $ts);
echo json_encode($today);
?>