<?php

function removeDiacritics($text) {
    $diacritics = [
        'ă' => 'a', 'â' => 'a', 'ș' => 's', 'ț' => 't', 'î' => 'i',
        'Ă' => 'A', 'Â' => 'A', 'Ș' => 'S', 'Ț' => 'T', 'Î' => 'I'
    ];
    return strtr($text, $diacritics);
}

function fixCounty($countyFolder, $countyName) {
    $basePath = __DIR__ . '/ROMANIA/' . $countyFolder;
    if (!is_dir($basePath)) {
        echo "County not found: $countyFolder\n";
        return;
    }
    
    $countyUpper = strtoupper($countyName);
    $countyNoDiac = removeDiacritics($countyUpper);
    
    // Fix orase.php
    $oraseFile = $basePath . '/orase.php';
    if (file_exists($oraseFile)) {
        $content = file_get_contents($oraseFile);
        
        // Match pattern: createOras("NAME", [...], createAdresaCompleta("COUNTY", "COUNTY"))
        $content = preg_replace_callback(
            '/createOras\("([^"]+)"[^}]+createAdresaCompleta\("' . $countyUpper . '", "' . $countyUpper . '"\)/u',
            function($matches) use ($countyUpper, $countyNoDiac) {
                $orasName = $matches[1];
                $withDiac = "orasul $orasName, judetul $countyUpper, România";
                $withoutDiac = "orasul " . removeDiacritics($orasName) . ", judetul $countyNoDiac, Romania";
                // Keep the structure but fix the adresaCompleta
                return str_replace(
                    'createAdresaCompleta("' . $countyUpper . '", "' . $countyUpper . '")',
                    "createAdresaCompleta(\"$withDiac\", \"$withoutDiac\")",
                    $matches[0]
                );
            },
            $content
        );
        
        file_put_contents($oraseFile, $content);
    }
    
    // Fix municipii.php
    $municipiiFile = $basePath . '/municipii.php';
    if (file_exists($municipiiFile)) {
        $content = file_get_contents($municipiiFile);
        
        $content = preg_replace_callback(
            '/createMunicipiu\("([^"]+)"[^}]+createAdresaCompleta\("' . $countyUpper . '", "' . $countyUpper . '"\)/u',
            function($matches) use ($countyUpper, $countyNoDiac) {
                $municipiuName = $matches[1];
                $withDiac = "municipiul $municipiuName, judetul $countyUpper, România";
                $withoutDiac = "municipiul " . removeDiacritics($municipiuName) . ", judetul $countyNoDiac, Romania";
                return str_replace(
                    'createAdresaCompleta("' . $countyUpper . '", "' . $countyUpper . '")',
                    "createAdresaCompleta(\"$withDiac\", \"$withoutDiac\")",
                    $matches[0]
                );
            },
            $content
        );
        
        file_put_contents($municipiiFile, $content);
    }
    
    // Fix comune.php
    $comuneFile = $basePath . '/comune.php';
    if (file_exists($comuneFile)) {
        $content = file_get_contents($comuneFile);
        
        $content = preg_replace_callback(
            '/createComuna\("([^"]+)"[^}]+createAdresaCompleta\("' . $countyUpper . '", "' . $countyUpper . '"\)/u',
            function($matches) use ($countyUpper, $countyNoDiac) {
                $comunaName = $matches[1];
                $withDiac = "comuna $comunaName, judetul $countyUpper, România";
                $withoutDiac = "comuna " . removeDiacritics($comunaName) . ", judetul $countyNoDiac, Romania";
                return str_replace(
                    'createAdresaCompleta("' . $countyUpper . '", "' . $countyUpper . '")',
                    "createAdresaCompleta(\"$withDiac\", \"$withoutDiac\")",
                    $matches[0]
                );
            },
            $content
        );
        
        file_put_contents($comuneFile, $content);
    }
    
    echo "Fixed county: $countyName\n";
}

// List of all counties with issues
$countiesToFix = [
    'SALAJ' => 'Salaj',
    'VRANCEA' => 'Vrancea',
    'VASLUI' => 'Vaslui',
    'VALCEA' => 'Valcea',
    'TULCEA' => 'Tulcea',
    'TIMIS' => 'Timis',
    'TELEORMAN' => 'Teleorman',
    'SUCEAVA' => 'Suceava',
    'SIBIU' => 'Sibiu',
    'SATUMARE' => 'Satumare',
    'PRAHOVA' => 'Prahova',
    'OLT' => 'Olt',
    'NEAMT' => 'Neamt',
    'MURES' => 'Mures',
    'MEHEDINTI' => 'Mehedinti',
    'MARAMURES' => 'Maramures',
    'ILFOV' => 'Ilfov',
    'IASI' => 'Iasi',
    'IALOMITA' => 'Ialomita',
    'HUNEDOARA' => 'Hunedoara',
    'HARGHITA' => 'Harghita',
    'GORJ' => 'Gorj',
    'GIURGIU' => 'Giurgiu',
    'GALATI' => 'Galati',
    'DOLJ' => 'Dolj',
    'DAMBOVITA' => 'Dambovita',
    'COVASNA' => 'Covasna',
    'CONSTANTA' => 'Constanta',
    'CARAS-SEVERIN' => 'Caras-Severin',
    'CALARASI' => 'Calarasi',
    'BUZAU' => 'Buzau',
    'BRAILA' => 'Braila',
    'BOTOSANI' => 'Botosani',
    'BISTRITA-NASAUD' => 'Bistrita-Nasaud',
    'BIHOR' => 'Bihor',
    'BACAU' => 'Bacau',
];

foreach ($countiesToFix as $folder => $name) {
    fixCounty($folder, $name);
}

echo "\nDone! Run check_consistency.php to verify.\n";
?>
