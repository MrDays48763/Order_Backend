<?php
require_once 'db.php';
?>

<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");
// sql語法存在變數中
$Name = $_GET['Name'];

$sql = "INSERT INTO `groups`(`Name`, `Status`) VALUES ('$Name', 1)";
// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($link,$sql);
mysqli_free_result($result);

$sql = "SELECT `SN`,`Name` FROM `groups` ORDER BY `SN` DESC LIMIT 0 , 1";
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
          $row['SN'] = (int) $row['SN'];
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