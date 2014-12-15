<?php
//processes song.txt's to .tex and .pdf
//

include("functions.php");
include("regexp_functions.php");

//TODO regexp check
$name = $_GET['songs'];
$cover = $_GET['pics'];
$pdfsavedir = 'books_pdf';
$date = $_GET['date'];
$backcover = $_GET['backcover'];
$rules = $_GET['rules'];

$songbookname = sanitizeFilename($_GET['bookname']);  //regexp rips off the useless stuff.
//$songbooktitle = preg_replace('/[^A-Za-zäöüåÄÖÅÜ0-9_\ -\p{L}]/', '_', $_GET['bookname']);  //todo jos käytät tätä, korjaa se

if (is_array($name)) {

//This tells which folder and which name are used to save songbook.
$filename = 'books/' . $songbookname . '.tex' ;

if(file_exists($filename)) {
echo "file with same name already exists!";
}

else{

//read file and writes it contents to another file.

//$songbookbegin  is the stuff that's needed before the chapters for generating latex document.
$songbookbegin = 'structure/begin.tex';
readAndWrite($filename, $songbookbegin);

//Adds frontpage picture
$covername = '\kansikuva{' . 'frontpage/' . $cover[0] . '}' . "\n";
writetofile($filename, $covername);

//Adds songbook's name
$bookname = '\tapahtuma{' . $songbookname . '}' . "\n";
writetofile($filename, $bookname);

//Adds date
writetofile($filename, '\pvm{' . $date . '}' . "\n");

//Adds back cover pic
writetofile($filename, '\takakansikuva{' . 'frontpage/' . $backcover[0] . '}');

//Adds stuff after frontpage picture
$after = 'structure/after_frontpage.tex';
readAndWrite($filename, $after);

//Writes rules
if (is_array($rules)){ 
//writetofile($filename, '\section{Saannot}');
readAndWrite($filename, 'rules/' . $rules[0]);
writetofile($filename, '\newpage');
}
//writes multicol
writetofile($filename, '\begin{multicols}{2}');


//Creates title page
//readAndWrite($filename, 'structure/titlepage.tex');

//Writes name of songbook.
//writetofile($filename,'\title{' . $songbooktitle . '}' . PHP_EOL  .'\maketitle');


//Kirjoitetaan laulukirjaan valitut laulut.
foreach ($name as $song) {

$readfile = 'biisit/' . $song;
//DEBUG echo $readfile;
readAndWrite($filename, $readfile); 

}

//Laulukirjan loppuun vaaditut tekstit.
$songbookend = 'structure/end.tex';
readAndWrite($filename, $songbookend);


//Generates .pdf
$generate = 'pdflatex -output-directory books_pdf ' . $filename;
//DEBUG echo "GENERATE:" . $generate;

//Compiles twice. Thay way table of contents works.
//DEBUG echo
exec($generate);
//DEBUG echo 
exec($generate);
//removes unnecessary files
/*$firstpart = substr($filename, 0, -4);
echo exec(rm $firstpart . '.aux');
echo exec(rm $firstpart . '.toc');
echo exec(rm $firstpart . '.out');
*/

//shell_exec("/usr/bin/pdflatex -output-directory /pdfs --interaction batchmode $filename");
$pdfname = 'books_pdf/' . $songbookname . '.pdf';
//DEBUG echo "PDF-NIMI:" . $pdfname;
if(file_exists($pdfname)){
echo '<p>Odota, ohjaan sinut valmiiseen lauluvihkoon.</p>';
echo '<meta http-equiv="Refresh" content="3; url=' . $pdfname . '">';
//echo '<p><a href="' . $pdfname . '">' . $pdfname . '</a></p>';
//readfile($pdfname);
//header( "refresh:5;url=$pdfname" );
}
else{
//echo "pdf-generointi ei onnistunut!";
echo '<p><a href="' . 'books_pdf/'  . $songbookname . '.log'  . '">' . 'generointi epäonnistui, syytä voi etsiskellä täältä' . $songbookname . '.log' . '</a></p>';
}

//echo "Homma toimii ja laulu raikaa!";

}

}

else{
echo "ei ole lista!";
}


?>

