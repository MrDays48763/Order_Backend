<?php
require_once 'account.php';
?>
<?php
$link = mysqli_connect($host,$username,$password,$dbname);

// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
  }
mysqli_query($link,'SET NAMES utf8');
mysqli_query($link,'SET time_zone = "+8:00"');
?>
