<?php
$name = $_GET['songs'];

$songbookname = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_GET['bookname']); // Ei tyhmää paskaa tiedostonimeen


if (is_array($name)) {

//  for($i=0; $i<count($name); $i++){
foreach ($name as $song) {
//echo $name[0];
//echo $song;

$filename = 'books/' . $songbookname . '.tex' ;
$readfilename = 'biisit/' . $song;

echo $readfilename;

$myfile = fopen($readfilename, "r") or die("Unable to open file!");
$data = PHP_EOL . fread($myfile,filesize($readfilename));

echo $data;
fclose($myfile);

$ret = file_put_contents($filename, $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}
}

else{
echo "ei ole lista!";
}


?>

