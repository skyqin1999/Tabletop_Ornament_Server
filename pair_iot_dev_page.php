<html>
<head>
<meta charset="utf-8">
<title>用户和设备绑定</title>
</head>
<body>
<?php 
include "select.php";
include "connect.php";
// echo "I have a color car"; // I have a red BMW
?>
<form action="pair_iot_dev.php" method="post" enctype="multipart/form-data">
    <label for="file">developer_name</label>
    <select name="devname"><?php echo getItemFromDev(); ?></select><br>
    <label for="file">iot_id</label>
    <select name="iotid"><?php echo getItemFromIot(); ?></select><br>
    <label for="file">version_name</label>
    <select name="versionname"><?php echo getItemFromVersion(); ?></select><br>
    <input type="submit" name="submit" value="提交">
</form>
</body>
</html>
