<?php
// 載入db.php來連結資料庫
require_once 'db.php';
?>
<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");
// header("Content-Type:application/json; charset=utf-8");
$id = $_POST['id'];
$product_id = $_POST['product_id'];
$user_id = $_POST['user_id'];
$amount = $_POST['amount'];
$coupon_id = $_POST['coupon_id'];

// sql語法存在變數中
$sql = "INSERT INTO orders (id,product_id,user_id,amount,coupon_id) VALUES ($id,$product_id,$user_id,$amount,$coupon_id)";

// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($link,$sql);
mysqli_free_result($result);
// if ($result) {
//   // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
//   if (mysqli_num_rows($result)>0) {
//     $row = mysqli_fetch_assoc($result);
//   }
//   // 釋放資料庫查到的記憶體
//   mysqli_free_result($result);
// }
// else {
//   echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
// }
// echo json_encode($row);
if ($coupon_id != null) {
  $sql = "UPDATE coupon SET cstate = 1 WHERE id = '$coupon_id'";
  $result = mysqli_query($link,$sql);
  mysqli_free_result($result);
}
 ?>