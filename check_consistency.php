<?php

function removeDiacritics($text) {
    $diacritics = ['ă', 'â', 'ș', 'ț', 'Ă', 'Â', 'Ș', 'Ț', 'î', 'Î', 'ș', 'ț'];
    $replacements = ['a', 'a', 's', 't', 'A', 'A', 'S', 'T', 'i', 'I', 's', 't'];
    return str_replace($diacritics, $replacements, $text);
}

$basePath = __DIR__ . '/ROMANIA';
$judete = scandir($basePath);
$issues = [];

foreach ($judete as $judet) {
    if ($judet === '.' || $judet === '..' || !is_dir($basePath . '/' . $judet)) continue;
    
    echo "Checking $judet...\n";
    
    // Check comune.php
    $comunaFile = $basePath . '/' . $judet . '/comune.php';
    if (!file_exists($comunaFile)) {
        $issues[$judet][] = "comune.php missing";
        continue;
    }
    
    $content = file_get_contents($comunaFile);
    
    // Find all createLoc calls
    preg_match_all('/createLoc\("([^"]+)",\s*"([^"]+)"(,\s*createAdresaCompleta\("([^"]+)",\s*"([^"]+)"\))?/', $content, $matches, PREG_SET_ORDER);
    
    foreach ($matches as $match) {
        $locName = $match[1];
        $locType = $match[2];
        $hasAdresa = isset($match[3]) && $match[3] !== '';
        
        if (!$hasAdresa) {
            $issues[$judet][] = "createLoc('$locName', '$locType') - LIPSESTE createAdresaCompleta";
        }
    }
    
    // Find all createComuna and check if they have proper adresaCompleta
    preg_match_all('/createComuna\("([^"]+)",\s*\[(.*?)\]\s*,\s*createAdresaCompleta\("([^"]+)",\s*"([^"]+)"\)/s', $content, $comunaMatches, PREG_SET_ORDER);
    
    // Check for pattern where adresaCompleta is at wrong level
    preg_match_all('/createComuna\("([^"]+)",\s*\[/', $content, $comunaDefs, PREG_SET_ORDER);
    
    foreach ($comunaDefs as $def) {
        $comunaName = $def[1];
        // Find the createAdresaCompleta that belongs to this comuna
        $pattern = '/createComuna\("' . preg_quote($comunaName, '/') . '",\s*\[[^\]]*\]\s*,\s*createAdresaCompleta\("([^"]+)",\s*"([^"]+)"\)/s';
        if (!preg_match($pattern, $content, $m)) {
            // Check if adresa is inside the array (wrong place)
            $wrongPattern = '/createComuna\("' . preg_quote($comunaName, '/') . '",\s*\[\s*createAdresaCompleta\("([^"]+)",\s*"([^"]+)"\)/';
            if (preg_match($wrongPattern, $content)) {
                $issues[$judet][] = "Comuna '$comunaName' - createAdresaCompleta este POZIȚIONAT GREȘIT (în interiorul array-ului, nu după el)";
            }
        }
    }
}

echo "\n=== RAPORT PROBLEME ===\n\n";
if (empty($issues)) {
    echo "NU SUNT PROBLEME!\n";
} else {
    foreach ($issues as $judet => $probleme) {
        echo "JUDETUL $judet:\n";
        foreach ($probleme as $p) {
            echo "  - $p\n";
        }
        echo "\n";
    }
    echo "TOTAL: " . array_sum(array_map('count', $issues)) . " probleme\n";
}
