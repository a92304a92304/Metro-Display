<?php
// session_start();
require_once('connection.php');

$sql = "SELECT *
        FROM TRANSFER_OTHER ";
$sql.= "";
$sql.= "WHERE (1) ";

if(isset($_GET['Color'])){
  $color = $_GET['Color'];
  $sql.= "AND Color = '$color' ";
}

if(isset($_GET['Num'])){
  $num = $_GET['Num'];
  $sql.= "AND Num = '$num' ";
}

$sql.="ORDER BY ID ";

// echo $sql;

$result = $conn->query($sql);  // $result 存放查詢到的所有物件
$data = array();
while ($rows = mysqli_fetch_assoc($result)) {
  $data[] = $rows;
}
echo json_encode($data, JSON_UNESCAPED_UNICODE); // 以JSON印出結果
