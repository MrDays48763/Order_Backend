<?php
require_once 'db.php';
?>

<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");

$ID = $_GET['ID'];
$SN = $_GET['SN'];

$sql = "INSERT INTO `roles_users`(`RolesSN`, `UserInfoID`) VALUES ('" . $SN . "','" . $ID . "')";
// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($link,$sql);
mysqli_free_result($result);
?>