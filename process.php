<?php
$name[] = $_GET['songs'];

if (is_array($name)) {

foreach ($name as $song) {

//echo $song;

$filename = 'biisit/' . 'songbook' . '.tex' ;
$readfilename = 'biisit/' . $song;
echo $readfilename;
$myfile = fopen($readfilename, "r") or die("Unable to open file!");
$data = fread($myfile,filesize($readfilename));
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

