<?php

function removeDiacritics($text) {
    $diacritics = [
        'ă' => 'a', 'â' => 'a', 'ș' => 's', 'ț' => 't', 'î' => 'i',
        'Ă' => 'A', 'Â' => 'A', 'Ș' => 'S', 'Ț' => 'T', 'Î' => 'I',
        'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
        'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U'
    ];
    return strtr($text, $diacritics);
}

function fixFile($filePath, $judetName) {
    $content = file_get_contents($filePath);
    $original = $content;
    
    // Fix orase
    $content = preg_replace_callback(
        '/createOras\("([^"]+)"[^}]+createAdresaCompleta\("([A-ZĂÂÎȘȚ]+)", "\2"\)/u',
        function($matches) use ($judetName) {
            $orasName = $matches[1];
            $judetUpper = strtoupper($judetName);
            $withDiac = "orasul $orasName, judetul $judetUpper, România";
            $withoutDiac = "orasul $orasName, judetul $judetUpper, Romania";
            return "createOras(\"$orasName\"[...]createAdresaCompleta(\"$withDiac\", \"$withoutDiac\")";
        },
        $content
    );
    
    // Fix municipii
    $content = preg_replace_callback(
        '/createMunicipiu\("([^"]+)"[^}]+createAdresaCompleta\("([A-ZĂÂÎȘȚ]+)", "\2"\)/u',
        function($matches) use ($judetName) {
            $municipiuName = $matches[1];
            $judetUpper = strtoupper($judetName);
            $withDiac = "municipiul $municipiuName, judetul $judetUpper, România";
            $withoutDiac = "municipiul $municipiuName, judetul $judetUpper, Romania";
            return "createMunicipiu(\"$municipiuName\"[...]createAdresaCompleta(\"$withDiac\", \"$withoutDiac\")";
        },
        $content
    );
    
    // Fix comune
    $content = preg_replace_callback(
        '/createComuna\("([^"]+)"[^}]+createAdresaCompleta\("([A-ZĂÂÎȘȚ]+)", "\2"\)/u',
        function($matches) use ($judetName) {
            $comunaName = $matches[1];
            $judetUpper = strtoupper($judetName);
            $withDiac = "comuna $comunaName, judetul $judetUpper, România";
            $withoutDiac = "comuna $comunaName, judetul $judetUpper, Romania";
            return "createComuna(\"$comunaName\"[...]createAdresaCompleta(\"$withDiac\", \"$withoutDiac\")";
        },
        $content
    );
    
    if ($content !== $original) {
        file_put_contents($filePath, $content);
        echo "Fixed: $filePath\n";
    }
}

$basePath = __DIR__ . '/ROMANIA';
$counties = [
    'SALAJ' => 'Salaj',
    'VRANCEA' => 'Vrancea',
    'VASLUI' => 'Vaslui',
    // Add more as needed
];

foreach ($counties as $folder => $name) {
    $path = $basePath . '/' . $folder;
    if (!is_dir($path)) continue;
    
    echo "Processing $folder ($name)...\n";
    
    $files = glob($path . '/*.php');
    foreach ($files as $file) {
        fixFile($file, $name);
    }
}

echo "Done!\n";
?>
