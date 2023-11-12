<?php
require_once 'db.php';
?>

<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");

$SN = $_GET['SN'];

$sql = "DELETE FROM `roles` WHERE `SN`='" . $SN . "'";
$result1 = mysqli_query($link,$sql);
mysqli_free_result($result1);
?>