<?php
// 載入db.php來連結資料庫
require_once 'db.php';
?>
<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");
$id = $_GET['id'];

// sql語法存在變數中
$sql = "SELECT orders.id, orders.product_id,orders.coupon_id, orders.amount, products.pname,products.price FROM orders,products
  WHERE orders.user_id='" . $id . "' AND product_id=products.id";
// $sql = "SELECT * FROM orders WHERE 1";
// $sql = "UPDATE orders SET amount=3 WHERE id=3 AND product_id=5";
// $sql = "DROP TABLE orders";
// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($link,$sql);
// 如果有資料
if ($result) {
  // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
  if (mysqli_num_rows($result)>0) {
      // 取得大於0代表有資料
      // while迴圈會根據資料數量，決定跑的次數
      // mysqli_fetch_assoc方法可取得一筆值
      while ($row = mysqli_fetch_assoc($result)) {
          // 每跑一次迴圈就抓一筆值，最後放進data陣列中
          $row['id'] = (int) $row['id'];
          $row['product_id'] = (int) $row['product_id'];
          $row['amount'] = (int) $row['amount'];
          $row['price'] = (int) $row['price'];
          $row['coupon_id'] = (int) $row['coupon_id'];
          $datas[] = $row;
      }
  }
  // 釋放資料庫查到的記憶體
  mysqli_free_result($result);
}
else {
  echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
}

header('Context-type: application/json');
echo json_encode($datas);
 ?>