<?php

$dir = 'tmp';
$files = scandir($dir);
foreach($files as $fn)
{
  if($fn == ".") { continue; }
  if($fn == "..") { continue; }
  echo '<p>'.file_get_contents($fn).'</p>'; // TODO: file() ja ekan rivin boldaus tms legendaarista, ehkä linkki suoraan biisiin..
}

?>
