<?php
$host = 'database-men.cmgrdhn7oybz.us-east-1.rds.amazonaws.com';
$dbuser ='admin';
$dbpassword = 'duck0204';
$dbname = 'Orderdb';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if($link){
    mysqli_query($link,'SET NAMES uff8');
    // echo "正確連接資料庫";
}
else {
    echo "不正確連接資料庫</br>" . mysqli_connect_error();
}
?>