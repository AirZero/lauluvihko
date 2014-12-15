     <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="fi" xml:lang="fi">
        <head>
<link rel="stylesheet"  media="print" href="print.css" type="text/css"/>
<link rel="StyleSheet" href="mobile.css" media="all" type="text/css" />
 <link rel="StyleSheet" href="index.css" media="all and (min-width: 800px)" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
          <title>Lauluvihkogeneraattori</title>
        </head>
<body>
<h1>Lauluvihkogeneraattori</h1>
<p>Generaattorin avulla voit luoda lauluvihkoja. Lähdekoodi löytyy <a href="https://github.com/airzero/lauluvihko">täältä</a>.  Palautetta generaattorin toiminnasta voi lähettää osoitteeseen eetu.rantakangas ät iki.fi</p>
<h2>Luo lauluvihko</h2>
<?php include("songlist.php"); ?>
<br />
<p>Lauluvihkot tallentuvat <a href="books_pdf/">tänne</a> .pdf-muodossa.</p>
<p>.tex muotoiset vihkot löytyvät  <a href="books/">täältä</a></p>


<h2>Lähetä uusi kuva lauluvihkoon.</h2>
<p>Kuva kannattaa lähettää .png-muodossa. Myös .jpg käy.</p>
<p>Aiemmin lähetyt kuvat löytyvät <a href="frontpage/">täältä</a>.</p>
<?php include("sendimage.php"); ?>

<?php include("create_song.php"); ?>


</body>
</html>

