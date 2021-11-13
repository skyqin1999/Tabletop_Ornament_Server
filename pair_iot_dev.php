<?php
include "connect.php";
$versionname = $_POST["versionname"];
$iotid = $_POST["iotid"];
$devname = $_POST["devname"];
echo $devname;
echo $iotid;
echo $versionname;
// 创建连接
$conn = new mysqli($servername, $username, $password);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
echo "连接成功\n";

$sql = "SELECT versionname FROM `iot`.`table_iot_dev` WHERE `iotid`=$iotid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "UPDATE `iot`.`table_iot_dev` SET `versionname` = '$versionname' , `devname` = '$devname' WHERE `iotid` = $iotid";

    if ($conn->query($sql) === TRUE) {
        echo "新记录更新成功\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error."\n";
    }
} else {
    $sql = "INSERT INTO `iot`.`table_iot_dev` (`iotid`, `devname`, `versionname`) VALUES ('$iotid', '$devname', '$versionname')";

    if ($conn->query($sql) === TRUE) {
        echo "新记录插入成功\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error."\n";
    }
}


$conn->close();

?>