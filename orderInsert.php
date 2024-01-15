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
$sql = "INSERT INTO orders (id,product_id,user_id,amount,coupon_id) VALUES ('$id','$product_id','$user_id','$amount','$coupon_id')";

// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($link,$sql);
echo json_encode($result);
 ?>