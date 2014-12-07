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
echo '<h3>Valitse vihkon nimi</h3>';
echo '<input name="bookname" type="text" value="Vihkon nimi">';
echo '<br>';
echo '<h3>Valitse laulut</h3>';
foreach ($name as $song){
//echo $color."<br />";
echo '<input type="checkbox" name="songs[]" /*id="songs"*/ value='. $song .'>'. $song .'<br>';//1testi
}

//creates checkbox list from the pics
echo '<h3>Valitse kansikuva</h3>';
foreach ($frontpagepics as $pic){
echo '<input type="radio" name="pics[]" value='. $pic .'>'. $pic;//1testi
echo '<br>';
}

echo '<br><input type="submit" value="Luo lauluvihko">';//1testi

echo "</form>";//1testi




?>
