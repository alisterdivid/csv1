<?php
require_once("common/DB_Connection.php");
require_once("common/functions.php");

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['imageUpload']['name'];
	$size = $_FILES['imageUpload']['size'];
}

$file = $name;
$table = strtok($name,".");
//$table = 'table_name';

// get structure from csv and insert db
ini_set('auto_detect_line_endings',TRUE);
$handle = fopen($file,'r');
// first row, structure
if ( ($data = fgetcsv($handle) ) === FALSE ) {
    echo "Cannot read from csv $file";die();
}
$fields = array();
$field_count = 0;
for($i=0;$i<count($data); $i++) {
    $f = strtolower(trim($data[$i]));
    if ($f) {
// normalize the field name, strip to 20 chars if too long
        $f = substr(preg_replace ('/[^0-9a-z]/', '_', $f), 0, 20);
        $field_count++;
        $fields[] = $f.' VARCHAR(50)';
    }
}

$sql = "CREATE TABLE $table (" . implode(', ', $fields) . ')';

 $db->query($sql);
while ( ($data = fgetcsv($handle) ) !== FALSE ) {
    $fields = array();
    for($i=0;$i<$field_count; $i++) {
        $fields[] = '\''.addslashes($data[$i]).'\'';
    }
    $sql = "Insert into $table values(" . implode(', ', $fields) . ')';
//    echo $sql;
$db->query($sql);
}
fclose($handle);
ini_set('auto_detect_line_endings',FALSE);

$result="SUCCESS";
echo ($result);
?>