<?php
include "connect.php";
$iotid = $_POST["iotid"];
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

$sql = "SELECT versionname FROM `iot`.`table_iot_dev` WHERE `iotid`=$iotid";
// echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        $push = array('versionname' => "upload/".$row["versionname"]);
    }
    $push_content = json_encode($push);
    echo $push_content;
} else {
    $push = array('versionname' => -1);
    $push_content = json_encode($push);
    echo $push_content;
}
 
$conn->close();

?>