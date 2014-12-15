<?php
header('Content-type: text/html; charset=UTF-8');
if(isset($_POST['rules_name']) && isset($_POST['rules_input'])) {


//fixes special chars compatible to latex.
function latexSpecialChars( $string )
{
    $map = array( 
            "#"=>"\\#",
            "$"=>"\\$",
            "%"=>"\\%",
            "&"=>"\\&",
            "~"=>"\\~{}",
            "_"=>"\\_",
            "^"=>"\\^{}",
            "\\"=>"\\textbackslash{}",
            "{"=>"\\{",
            "}"=>"\\}",
    );
    return preg_replace( "/([\^\%~\\\\#\$%&_\{\}])/e", "\$map['$1']", $string );
}

$rules_input = latexSpecialChars(utf8_decode($_POST['rules_input'])); //  Cleans latex special chars and combines song name and lyrics.
$filename = 'rules/' . preg_replace('/[^A-Za-z0-9_\-]/', '_', $_POST['rules_name']) . '.txt' ; // folder name, filename without special chars.

if(file_exists($filename)) {
echo "file with same name already exists!";
}
else{
    $ret = file_put_contents($filename /*'tmp/mydata.txt'/*$_POST['field1']*/, $rules_input, FILE_APPEND | LOCK_EX);
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
