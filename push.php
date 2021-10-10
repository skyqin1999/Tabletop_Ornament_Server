<?php
$name = $_POST['name'];
$version = $_POST['version'];

$file_name = $name."-version.txt";

echo "<script>alert('即将推送“{$version}”到设备“{$name}”');</script>";
$slogan_file = fopen($file_name, "w+");

fwrite($slogan_file, $version);

fclose($slogan_file);
?>