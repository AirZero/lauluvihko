<?php

//käy rekursiivisesti läpi kansion tiedostot ja laatii niistä listan.
function scandir_tree($directory_name, $sort_order = SCANDIR_SORT_ASCENDING, $_recursed = false)
    {
    if (!$_recursed || is_dir($directory_name))
        {
        $items = array_diff(scandir($directory_name, (int) $sort_order), ['.', '..']);
        $tree = [];
        foreach ($items as $item)
            {
            $tree[$item] = scandir_tree(/*$directory_name .*/ $item, $sort_order, true);
            }
        return $tree;
        }
    return $directory_name;
    }

//creating name-array from checkboxes.
$name = scandir_tree(biisit);//$_GET['color'];

// optional
// echo "You chose the following color(s): <br>";

echo '<form action="process.php" method="get">';//1testi

foreach ($name as $song){
//echo $color."<br />";
echo '<br /> <input type="checkbox" name="songs" id="songs" value='. $song .'>'. $song;//1testi


//TODO kirjoita foreach-looppi joka nielee arrayn biisitiedostojen nimistä(.txt) ja paskantaa html-checkboxeja. HTML-puolen taas pitää palauttaa php:lle array valituista rasteista(esimerkissä array on color)

//<input name =MyArray[]" /> //testausta

}

echo '<br /> <input type="submit" value="Luo lauluvihko">';//1testi
echo "</form>";//1testi


?>
