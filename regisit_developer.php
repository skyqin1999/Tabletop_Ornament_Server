<?php
include "connect.php";
$devname = $_POST["devname"];

// 创建连接
$conn = new mysqli($servername, $username, $password);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
echo "连接成功" . "<br>";

$sql = "INSERT INTO `iot`.`table_developer` (`devname`) VALUES ('$devname');";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
}

$conn->close();

?>