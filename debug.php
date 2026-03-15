<?php
$basePath = getcwd() . '/ROMANIA';
echo "Base path: $basePath\n";

$query = 'Huta';
$judeteFolderMap = ['CLUJ', 'BIHOR'];

foreach ($judeteFolderMap as $folderName) {
    $judetPath = $basePath . '/' . $folderName;
    echo "\nChecking: $judetPath\n";
    echo "Exists: " . (is_dir($judetPath) ? "yes" : "no") . "\n";
    
    $comunaFilePath = $judetPath . '/comune.php';
    echo "Comune file exists: " . (file_exists($comunaFilePath) ? "yes" : "no") . "\n";
    
    if (file_exists($comunaFilePath)) {
        $content = file_get_contents($comunaFilePath);
        $pattern = '/createAdresaCompleta\("([^"]+)", "([^"]+)"\)/iu';
        preg_match_all($pattern, $content, $adrMatches);
        echo "Found " . count($adrMatches[0]) . " adresaCompleta entries\n";
        
        foreach ($adrMatches[0] as $i => $m) {
            if (stripos($adrMatches[1][$i], $query) !== false || stripos($adrMatches[2][$i], $query) !== false) {
                echo "  $folderName match: " . $adrMatches[1][$i] . "\n";
            }
        }
    }
}
?>
