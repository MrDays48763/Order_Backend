<?php
// 載入db.php來連結資料庫
require_once 'db.php';
?>
<?php
// header("Access-Control-Allow-Origin:*");
// header("Content-Type:application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
$input = json_decode(file_get_contents('php://input'),true);
$id = $input['id'];
$product_id = $input['product_id'];
$user_id = $input['user_id'];
$amount = $input['amount'];
if (!isset($input['coupon_id'])) {
  $coupon_id = "NULL";
} else {
  $coupon_id = $input['coupon_id'];
  $sql = "UPDATE coupon SET cstatus = 1 WHERE id = '$coupon_id'";
  try {
    mysqli_query($link, $sql);
    echo "Coupons updated successfully";
  } catch(mysqli_sql_exception $e) {
    echo "Error: " . $sql . "<br>\n" . $e;
  }
}

// sql語法存在變數中
$sql = "INSERT INTO orders (id,product_id,user_id,amount,coupon_id) VALUES ($id,$product_id,$user_id,$amount,$coupon_id)";
// echo json_encode($sql);

try {
  mysqli_query($link, $sql);
  echo "New order Inserted successfully";
} catch(mysqli_sql_exception $e) {
  echo "Error: " . $sql . "<br>\n" . $e;
}

mysqli_close($link);
 ?>
