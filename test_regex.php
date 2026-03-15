<?php
$content = file_get_contents('ROMANIA/CLUJ/comune.php');
preg_match_all('/createAdresaCompleta\("([^"]+)", "([^"]+)"/iu', $content, $m);
echo "Found " . count($m[0]) . " matches\n";
foreach ($m[0] as $i => $match) {
    if (strpos($m[1][$i], 'Huta') !== false || strpos($m[2][$i], 'Huta') !== false) {
        echo "Match $i:\n";
        echo "  Full: $match\n";
        echo "  With: " . $m[1][$i] . "\n";
        echo "  Without: " . $m[2][$i] . "\n";
    }
}
?>
