<?php

$dir = 'biisit/';
$files = scandir($dir);
foreach($files as $fn)
{
  if($fn == ".") { continue; }
  if($fn == "..") { continue; }
<input type="checkbox" name="biisi" value=$fn>  
//echo '<p>'.file_get_contents($fn).'</p>'; // TODO: file() ja ekan rivin boldaus tms legendaarista, ehkä linkki suoraan biisiin..
//Tee checkbox, joka lähettää arvon x. Sen jälkeen tee versio, joka ottaa arvon arraysta, ja luo arrayn perusteella buttoneita niin monta kuin arrayssa on arvoja.
}

?>
