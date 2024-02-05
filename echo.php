<?php
$host = 'srv1158.hstgr.io';
$dbuser ='u139268138_admin2024';
$dbpassword = 'THUnoodles2024';
$dbname = 'u139268138_Orderdb';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if($link){
    mysqli_query($link,'SET NAMES uff8');
    echo "Correct connected!";
}
else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}
?>
<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");

$sql = "SELECT * FROM products";
$result = mysqli_query($link,$sql);
if ($result) {
  if (mysqli_num_rows($result)>0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $datas[] = $row;
      }
  }
  mysqli_free_result($result);
}
else {
  echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
}

header('Context-type: application/json');
echo json_encode($datas);
 ?>