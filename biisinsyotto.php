<?php
if(isset($_POST['laulun_nimi']) && isset($_POST['laulun_sanat'])) {
    $data = '\chapter{'. $_POST['laulun_nimi'] .'}' . "\n" . $_POST['laulun_sanat']; // TODO: Sanitoi input!
    $tiedostonimi = 'biisit/' . preg_replace('/[^A-Za-z0-9_\-]/', '_', $_POST['field1']) . '.txt' ; // Ei tyhmää paskaa tiedostonimeen
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
