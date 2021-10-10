 <?php  

$file_name = "version.txt";

if(is_array($_GET)&&count($_GET)>0){
    if(isset($_GET["name"])){
        $name = $_GET["name"];
        if(file_exists($file_name))
            $file_name = $name."-version.txt";
    }
      
}


$myfile = fopen($file_name, "r") or die("Unable to open file!");
# date_default_timezone_set('Asia/Shanghai');
$push = array('version' => fgets($myfile));

$push_content = json_encode($push);

header('Content-Type:application/json');

echo $push_content;

fclose($myfile);

?>