<?php
if(isset($_POST['field1']) && isset($_POST['field2'])) {
    $data = '\chapter{'. $_POST['field1'] .'}' . "\n" . $_POST['field2'];
    $tiedostonimi = 'biisit/' . $_POST['field1'] . '.txt' ;
//    $biisitiedosto = fopen(tmp/ $tiedostonimi, "w");
    $ret = file_put_contents($tiedostonimi /*'tmp/mydata.txt'/*$_POST['field1']*/, $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}
else {
   die('no post data to process');
}

echo ' ' .  $tiedostonimi;

?>
