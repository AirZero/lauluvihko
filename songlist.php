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

$frontpagepics = scandir_tree(frontpage);

// optional
// echo "You chose the following color(s): <br>";



// Creates checkbox list from the .txt's
echo '<form action="process.php" method="get">';//1testi
//Kirjannimi-kenttä
echo '<input name="bookname" type="text" value="Kirjan nimi">';

foreach ($name as $song){
//echo $color."<br />";
echo '<br /> <input type="checkbox" name="songs[]" /*id="songs"*/ value='. $song .'>'. $song;//1testi
}

//creates checkbox list from the pics
echo '<h2>Valitse kansikuva</h2>';
echo '<p>Kuvan olisi suotavaa olla .png-muotoinen.</p>';
foreach ($frontpagepics as $pic){
echo '<br /> <input type="radio" name="pics[]" value='. $pic .'>'. $pic;//1testi
}

echo '<br /> <input type="submit" value="Luo lauluvihko">';//1testi

echo "</form>";//1testi




?>
