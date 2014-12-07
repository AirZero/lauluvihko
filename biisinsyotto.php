<?php
header('Content-type: text/html; charset=UTF-8');
if(isset($_POST['laulun_nimi']) && isset($_POST['laulun_sanat'])) {

$melody = preg_replace('/[^A-Za-zäöüåÄÖÅÜ0-9_\ -\p{L}]/', '_', $_POST['melody']);

if($melody == TRUE){
$sectionmelody = '\laulu{';
$sectionend = '{' . $melody . '}';
}
else{
$sectionmelody = '\section{';
$sectionend = '';
}

$data = $sectionmelody . preg_replace('/[^A-Za-zäöüåÄÖÅÜ0-9_\ -\p{L}]/', '_', $_POST['laulun_nimi']) .'}' . $sectionend . "\n" . preg_replace('/[^A-Za-zäöüåÄÖÅÜ0-9_\ -\p{L}\.\'\"\,]/', '_', utf8_decode($_POST['laulun_sanat'])); // TODO: Sanitoi input!
$filename = 'biisit/' . preg_replace('/[^A-Za-z0-9_\-]/', '_', $_POST['laulun_nimi']) . '.txt' ; // Ei tyhmää paskaa tiedostonimeen
if(file_exists($filename)) {
echo "file with same name already exists!";
}
else{
    $ret = file_put_contents($filename /*'tmp/mydata.txt'/*$_POST['field1']*/, $data, FILE_APPEND | LOCK_EX);
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
