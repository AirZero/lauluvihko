<?php
//processes song.txt's to .tex and .pdf
//

//TODO regexp check
$name = $_GET['songs'];
$cover = $_GET['pics'];

$songbookname = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_GET['bookname']); // Ei tyhmää paskaa tiedostonimeen
$songbooktitle = preg_replace('/[^A-Za-zäöüåÄÖÅÜ0-9_\ -\p{L}]/', '_', $_GET['bookname']); 

if (is_array($name)) {

//This tells which folder and which name are used to save songbook.
$filename = 'books/' . $songbookname . '.tex' ;

//readAndWrite($songbookbegin, filename);

//read file and writes it contents to another file.
function readAndWrite($readfilename, $writefilename) {

$myfile = fopen($readfilename, "r") or die("Unable to open file!");
$fileContents = PHP_EOL . fread($myfile,filesize($readfilename));

fclose($myfile);
writetofile($writefilename, $fileContents);
}

//Kirjoittaa ensimmäisen parametrin nimiseen tiedostoon toisen parametrin sisällön.
function writetofile($writefile, $fileContents){
echo $fileContents;
$ret = file_put_contents($writefile, $fileContents, FILE_APPEND | LOCK_EX);
 if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}

//$songbookbegin  is the stuff that's needed before the chapters for generating latex document.
$songbookbegin = 'structure/begin.tex';
readAndWrite($songbookbegin, $filename);

//Adds frontpage picture
$covername = '\includegraphics{' . 'frontpage/' . $cover[0] . '}';
writetofile($filename, $covername);

//Adds stuff after frontpage picture
$after = 'structure/after_frontpage.tex';
readAndWrite($after, $filename);


//Creates title page
//readAndWrite('structure/titlepage.tex', $filename);

//Writes name of songbook.
//writetofile($filename,'\title{' . $songbooktitle . '}' . PHP_EOL  .'\maketitle');

//Kirjoitetaan laulukirjaan valitut laulut.
foreach ($name as $song) {
//$filename = 'books/' . $songbookname . '.tex' ;
$readfile = 'biisit/' . $song;

echo $readfile;

readAndWrite($readfile, $filename); 

}

//Laulukirjan loppuun vaaditut tekstit.
$songbookend = 'structure/end.tex';
readAndWrite($songbookend, $filename);

//Generates .pdf
$generate = 'pdflatex ' . $filename;//'latexmk -pdf -f ' . $filename;     // '-jobname=/books_pdf/' . $songbookname . '.tex' ;//$filename;
echo "GENERATE:" . $generate;
echo exec($generate);
//shell_exec("/usr/bin/pdflatex -output-directory /pdfs --interaction batchmode $filename");
$pdfname = substr($filename, 0, -4) . '.pdf';
//echo "PDF-NIMI:" $pdfname;
if(file_exists(pdfname)){
readfile($pdfname);
}
else{
echo "pdf-generointi ei onnistunut!";
}

//echo "Homma toimii ja laulu raikaa!";

}

else{
echo "ei ole lista!";
}


?>

