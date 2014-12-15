<?php
//Class for reading and writing files.

//read file and writes it contents to another file.
function readAndWrite($writefilename, $readfilename) {

$myfile = fopen($readfilename, "r") or die("Unable to open file!");
$fileContents = PHP_EOL . fread($myfile,filesize($readfilename));

fclose($myfile);
writetofile($writefilename, $fileContents);
}

//Writes contents of the second parameter to file which name is first parameter.
function writetofile($writefilename, $fileContents){
//DEBUG echo $fileContents;
$ret = file_put_contents($writefilename, $fileContents, FILE_APPEND | LOCK_EX);
 if($ret === false) {
        die('There was an error writing this file');
    }
//DEBUG    else {
//DEBUG echo "$ret bytes saved succesfully.";
//DEBUG         }
}

?>
