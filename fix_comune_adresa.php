<?php

function removeDiacritics($text) {
    $from = ['ă', 'â', 'ș', 'ț', 'Ă', 'Â', 'Ș', 'Ț', 'î', 'Î', 'ş', 'ţ'];
    $to = ['a', 'a', 's', 't', 'A', 'A', 'S', 'T', 'i', 'I', 's', 't'];
    return str_replace($from, $to, $text);
}

function getJudetNameFromFolder($folder) {
    $judete = [
        'ALBA' => 'Alba', 'ARAD' => 'Arad', 'ARGES' => 'Argeș', 'BACAU' => 'Bacău',
        'BIHOR' => 'Bihor', 'BISTRITA-NASAUD' => 'Bistrița-Năsăud', 'BOTOSANI' => 'Botoșani',
        'BRASOV' => 'Brașov', 'BRAILA' => 'Brăila', 'BUZAU' => 'Buzău', 'CALARASI' => 'Călărași',
        'CARAS-SEVERIN' => 'Caraș-Severin', 'CLUJ' => 'Cluj', 'CONSTANTA' => 'Constanța',
        'COVASNA' => 'Covasna', 'DAMBOVITA' => 'Dâmbovița', 'DOLJ' => 'Dolj', 'GALATI' => 'Galați',
        'GIURGIU' => 'Giurgiu', 'GORJ' => 'Gorj', 'HARGHITA' => 'Harghita', 'HUNEDOARA' => 'Hunedoara',
        'IALOMITA' => 'Ialomița', 'IASI' => 'Iași', 'ILFOV' => 'Ilfov', 'MARAMURES' => 'Maramureș',
        'MEHEDINTI' => 'Mehedinți', 'MURES' => 'Mureș', 'NEAMT' => 'Neamț', 'OLT' => 'Olt',
        'PRAHOVA' => 'Prahova', 'SALAJ' => 'Sălaj', 'SATUMARE' => 'Satu Mare', 'SIBIU' => 'Sibiu',
        'SUCEAVA' => 'Suceava', 'TELEORMAN' => 'Teleorman', 'TIMIS' => 'Timiș', 'TULCEA' => 'Tulcea',
        'VALCEA' => 'Vâlcea', 'VASLUI' => 'Vaslui', 'VRANCEA' => 'Vrancea', 'BUCURESTI' => 'București'
    ];
    return $judete[$folder] ?? $folder;
}

function fixComuneFile($filePath, $judetFolder) {
    $content = file_get_contents($filePath);
    $judetName = getJudetNameFromFolder($judetFolder);
    $judetNameNoDiac = removeDiacritics($judetName);
    $judetUpper = strtoupper($judetNameNoDiac);
    
    $newContent = $content;
    
    preg_match_all('/createComuna\("([^"]+)",\s*\[(.*?)\]\s*(,\s*createAdresaCompleta\("([^"]+)",\s*"([^"]+)"\))?/s', $content, $matches, PREG_SET_ORDER);
    
    foreach ($matches as $match) {
        $comunaName = $match[1];
        $comunaNameNoDiac = removeDiacritics($comunaName);
        
        preg_match_all('/createLoc\("([^"]+)",\s*"([^"]+)"(,\s*createAdresaCompleta\("([^"]+)",\s*"([^"]+)"\))?/', $match[2], $locMatches, PREG_SET_ORDER);
        
        $hasWrongAdresa = isset($match[3]) && $match[3] !== '';
        $wrongAdresa = $match[4] ?? '';
        
        if ($hasWrongAdresa && $wrongAdresa === $judetUpper) {
            echo "  [FIX] Comuna $comunaName - createAdresaCompleta GREȘIT\n";
        }
        
        foreach ($locMatches as $loc) {
            $locName = $loc[1];
            $locType = $loc[2];
            $hasLocAdresa = isset($loc[3]) && $loc[3] !== '';
            
            if (!$hasLocAdresa) {
                echo "  [LIPSA] $locType: $locName în comuna $comunaName\n";
                
                $locNameDiac = $locName;
                $locNameNoDiac = removeDiacritics($locName);
                
                if ($locType === 'sat') {
                    $adrWithDiac = "sat $locNameDiac, comuna $comunaName, judetul $judetName, România";
                    $adrNoDiac = "sat $locNameNoDiac, comuna $comunaNameNoDiac, judetul $judetNameNoDiac, Romania";
                } elseif ($locType === 'oras') {
                    $adrWithDiac = "orasul $locNameDiac, judetul $judetName, România";
                    $adrNoDiac = "orasul $locNameNoDiac, judetul $judetNameNoDiac, Romania";
                } else {
                    $adrWithDiac = "comuna $locNameDiac, judetul $judetName, România";
                    $adrNoDiac = "comuna $locNameNoDiac, judetul $judetNameNoDiac, Romania";
                }
                
                $oldLoc = $loc[0];
                $newLoc = sprintf('createLoc("%s", "%s", createAdresaCompleta("%s", "%s"))', 
                    $locName, $locType, $adrWithDiac, $adrNoDiac);
                
                $newContent = str_replace($oldLoc, $newLoc, $newContent);
            }
        }
    }
    
    if ($newContent !== $content) {
        file_put_contents($filePath, $newContent);
        echo "  [SCRIS] $filePath\n";
        return true;
    }
    
    return false;
}

$basePath = __DIR__ . '/ROMANIA';
$folders = scandir($basePath);

echo "=== Script de verificare și fixare createAdresaCompleta ===\n\n";

$fixed = 0;
$totalJudete = 0;

foreach ($folders as $folder) {
    if ($folder === '.' || $folder === '..' || !is_dir($basePath . '/' . $folder)) continue;
    
    $comunaFile = $basePath . '/' . $folder . '/comune.php';
    if (!file_exists($comunaFile)) continue;
    
    $totalJudete++;
    echo "Procesare: $folder\n";
    
    if (fixComuneFile($comunaFile, $folder)) {
        $fixed++;
    }
}

echo "\n=== REZULTATE ===\n";
echo "Total judete verificate: $totalJudete\n";
echo "Judete modificate: $fixed\n";
