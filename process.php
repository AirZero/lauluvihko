<?php
$name = $_GET['songs'];

$songbookname = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_GET['bookname']); // Ei tyhmää paskaa tiedostonimeen


if (is_array($name)) {

//This tells which folder and which name are used to save songbook.
$filename = 'books/' . $songbookname . '.tex' ;

//readAndWrite($songbookbegin, filename);

//read file and writes it contents to another file.
function readAndWrite($readfilename, $writefilename) {

$myfile = fopen($readfilename, "r") or die("Unable to open file!");
$fileContents = PHP_EOL . fread($myfile,filesize($readfilename));

echo $fileContents;
fclose($myfile);

$ret = file_put_contents($writefilename, $fileContents, FILE_APPEND | LOCK_EX);
 if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}

//$songbookbegin  is the stuff that's needed before the chapters for generating latex document.
$songbookbegin = 'structure/begin.txt';
readAndWrite($songbookbegin, $filename);

$title = '\title{' . $_GET['bookname'] . '}';
readAndWrite($title, $filename);

$songbookend = 'structure/end.txt';
readAndWrite($songbookend, $filename);

foreach ($name as $song) {

//$filename = 'books/' . $songbookname . '.tex' ;
$readfile = 'biisit/' . $song;

echo $readfile;

readAndWrite($readfile, $filename); 

/*
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
    } */
}
}

else{
echo "ei ole lista!";
}


?>

