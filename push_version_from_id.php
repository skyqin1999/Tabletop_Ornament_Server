<?php
include "connect.php";
$iotid = $_POST["iotid"];
 
// 创建连接
$conn = new mysqli($servername, $username, $password);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

$sql = "SELECT versionname FROM `iot`.`table_iot_dev` WHERE iotid=$iotid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        $push = array('id' => intval($row["last_id"]));
        $push_content = json_encode($push);
        echo $push_content;
    }
} else {
    $push = array('id' => -1);
    $push_content = json_encode($push);
    echo $push_content;
}
 
$conn->close();

?>