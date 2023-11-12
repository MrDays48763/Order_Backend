<?php
require_once 'db.php';
?>

<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");

$SN = $_GET['SN'];

$sql = "DELETE FROM `groups` WHERE `SN`='" . $SN . "'";
$result1 = mysqli_query($link,$sql);
mysqli_free_result($result1);

$sql = "SELECT `RolesSN` FROM `groups`, `groups_roles`, `roles` WHERE groups.SN='" . $SN . "' AND `GroupsSN`=groups.SN AND `RolesSN`=roles.SN";
$result = mysqli_query($link,$sql);
if ($result) {
  if (mysqli_num_rows($result)>0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $row['RolesSN'] = (int) $row['RolesSN'];
          $sql = "DELETE FROM `roles` WHERE `SN`='" . $row['RolesSN'] . "'";
          $result1 = mysqli_query($link,$sql);
          mysqli_free_result($result1);
      }
  }
  mysqli_free_result($result);
}
else {
  echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
}
?>