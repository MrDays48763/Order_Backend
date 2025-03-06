<?php
// 載入db.php來連結資料庫
require_once 'db.php';
?>
<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");
$id = $_GET['id'];
$username = $_GET['username'];
// $id = "0";
// $username = "admin";

// sql語法存在變數中
$sql = "SELECT `id`,`username` FROM users
  WHERE id='$id' AND username='$username'";

// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($link,$sql);
// 如果有資料
if ($result) {
  // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
  if (mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_assoc($result);
  }
  // 釋放資料庫查到的記憶體
  mysqli_free_result($result);
}
else {
  echo "{$sql} Connection failed: " . mysqli_error($link);
}

header('Context-type: application/json');
if($row){
  echo json_encode(true);
} else {
  echo json_encode(false);
}
 ?>