<?php
$servername = "8.131.65.42";
$username = "root";
$password = "Test123.";
 
// 创建连接
$conn = new mysqli($servername, $username, $password);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
echo "连接成功\n";

$sql = "INSERT INTO `iot`.`table_iot` () VALUES ();";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功\n";
    $sql = "SELECT LAST_INSERT_ID() as last_id";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            echo "last_id: " . $row["last_id"]. "<br>";
        }
    } else {
        echo "0 结果";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."\n";
}
 
$conn->close();

?>