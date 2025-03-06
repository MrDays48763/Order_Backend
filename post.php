<?php
$json_raw = file_get_contents('php://input');
$x = json_decode($json_raw,TRUE);
$y = array("y" => $x['x']);
echo json_encode($y);
?>