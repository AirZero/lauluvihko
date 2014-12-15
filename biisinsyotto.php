<?php
header('Content-type: text/html; charset=UTF-8');

include("regexp_functions.php");

if(isset($_POST['laulun_nimi']) && isset($_POST['laulun_sanat'])) {

$melody = latexSpecialChars(utf8_decode($_POST['melody']));

if($melody == TRUE){
$sectionmelody = '\laulu{';
$sectionend = '{' . $melody . '}';
}
else{
$sectionmelody = '\section{';
$sectionend = '';
}

$data = $sectionmelody . latexSpecialChars(utf8_decode($_POST['laulun_nimi'])) .'}' . $sectionend . "\n" . latexSpecialChars(utf8_decode($_POST['laulun_sanat'])); //  Cleans latex special chars and combines song name and lyrics.
$filename = 'biisit/' . preg_replace('/[^A-Za-z0-9_\-]/', '_', $_POST['laulun_nimi']) . '.txt' ; // folder name, filename without special chars.



if(file_exists($filename)) {
echo "file with same name already exists!";
}
else{
    $ret = file_put_contents($filename, $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    			}
    else {
        echo "$ret bytes written to file";
    	}
     }
}
else {
   die('no post data to process');
}

echo ' ' .  $filename;

?>
