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

function processFile($filePath) {
    $content = file_get_contents($filePath);
    
    $pattern = '/createAdresaCompleta\("([^"]+)"\)/';
    
    $newContent = preg_replace_callback($pattern, function($matches) {
        $textWithDiacritics = $matches[1];
        $textWithoutDiacritics = removeDiacritics($textWithDiacritics);
        return "createAdresaCompleta(\"$textWithDiacritics\", \"$textWithoutDiacritics\")";
    }, $content);
    
    if ($newContent !== $content) {
        file_put_contents($filePath, $newContent);
        echo "Updated: $filePath\n";
    }
}

function processDirectory($dir) {
    $files = glob($dir . '/*.php');
    foreach ($files as $file) {
        processFile($file);
    }
    
    $subdirs = glob($dir . '/*', GLOB_ONLYDIR);
    foreach ($subdirs as $subdir) {
        processDirectory($subdir);
    }
}

$basePath = __DIR__ . '/ROMANIA';
processDirectory($basePath);

echo "Done!\n";
?>
