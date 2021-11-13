<?php
include "connect.php";
$reg = $_POST["reg"];
if ($reg != 1){
    $push = array('id' => -1);
    $push_content = json_encode($push);
    echo $push_content;
    return -1;
}
// 创建连接
$conn = new mysqli($servername, $username, $password);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

$sql = "INSERT INTO `iot`.`table_iot` () VALUES ();";

if ($conn->query($sql) === TRUE) {
    $sql = "SELECT LAST_INSERT_ID() as last_id";
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
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."\n";
}
 
$conn->close();

?>