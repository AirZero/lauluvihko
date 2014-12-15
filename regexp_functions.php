<?php

//Everything for handling basic needs for regular expressions.



//Sanitizes filename. Should fix work so that A->Ä, ö->o and so on instead of A->_
function sanitizeFilename($filename){
return preg_replace('/[^A-Za-z0-9_\-]/', '_', $filename);
}

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



?>
