<?php
if(isset($_POST['laulun_nimi']) && isset($_POST['laulun_sanat'])) {
    $data = '\chapter{'. $_POST['laulun_nimi'] .'}' . "\n" . $_POST['laulun_sanat']; // TODO: Sanitoi input!
    $filename = 'biisit/' . preg_replace('/[^A-Za-z0-9_\-]/', '_', $_POST['laulun_nimi']) . '.txt' ; // Ei tyhmää paskaa tiedostonimeen

    $ret = file_put_contents($filename /*'tmp/mydata.txt'/*$_POST['field1']*/, $data, FILE_APPEND | LOCK_EX);
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

echo ' ' .  $filename;

?>
