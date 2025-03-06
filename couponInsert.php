<?php
// 載入db.php來連結資料庫
require_once 'db.php';
?>
<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");
$input = json_decode(file_get_contents('php://input'),true);
$id = $input['id'];
$user_id = $input['user_id'];

// sql語法存在變數中
$sql = "INSERT INTO coupon (id,user_id) VALUES ($id,$user_id)";
// echo json_encode($sql);
// 用mysqli_query方法執行(sql語法)將結果存在變數中
try {
    mysqli_query($link, $sql);
    echo "New record created successfully";
  } catch(mysqli_sql_exception $e) {
    echo "Error: " . $sql . "<br>\n" . $e;
  }
  mysqli_close($link);
 ?>