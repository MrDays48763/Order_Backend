<?php
// 載入db.php來連結資料庫
require_once 'db.php';
?>
<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");
$id = $_POST['id'];
$user_id = $_POST['user_id'];
// $id = 1;

// sql語法存在變數中
$sql = "INSERT INTO users (id,user_id) VALUES (id,user_id)";
// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($link,$sql);
 ?>