<?php
require_once("common/DB_Connection.php");
require_once("common/functions.php");

$path = "img/".$_POST['uploadType']."/";	

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['imageUpload']['name'];
	$size = $_FILES['imageUpload']['size'];
	if(strlen($name))
	{
		list($txt, $ext) = explode(".", $name);
		if(in_array($ext,$valid_formats))
		{
			$actual_image_name = EC_generateRandom(16)."_".$name;
			$tmp = $_FILES['imageUpload']['tmp_name'];
			if(move_uploaded_file($tmp, $path.$actual_image_name)){
				echo "<img style='width: 100%;' src='$path$actual_image_name'>";
			}else
				echo "failed";
		}
		else
			echo "Invalid file format.."; 
	}
	else
		echo "Please select image..!";
	exit;
}
?>