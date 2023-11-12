<?php
// 載入db.php來連結資料庫
require_once 'db.php';
?>

<!-- <h3>sql插入結果</h3> -->
<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");
$id = $_POST['id'];
$name = $_POST['name'];
echo $id, $name;
// sql語法存在變數中
$sql = "INSERT INTO `drink` (`id`, `name`) VALUE ('$id','$name')";
// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($link,$sql);

// // 如果有異動到資料庫數量(更新資料庫)
// if (mysqli_affected_rows($link)>0) {
// // 如果有一筆以上代表有更新
// // mysqli_insert_id可以抓到第一筆的id
// $new_id= mysqli_insert_id($link);
// echo "新增後的id為 {$new_id} ";
// }
// elseif(mysqli_affected_rows($link)==0) {
//     echo "無資料新增";
// }
// else {
//     echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
// }
//  mysqli_close($link); 
 ?>