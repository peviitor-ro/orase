<?php

function checkConsistency($dir) {
    $files = glob($dir . '/*.php');
    $issues = [];
    
    foreach ($files as $file) {
        $content = file_get_contents($file);
        
        // Check for old format: createAdresaCompleta("text") without array
        if (preg_match_all('/createAdresaCompleta\("([^"]+)"\)/', $content, $matches)) {
            $issues[] = basename($file) . " - Old format: " . count($matches[0]) . " times";
        }
        
        // Check for array format: createAdresaCompleta("text1", "text2")
        if (preg_match_all('/createAdresaCompleta\("([^"]+)", "([^"]+)"\)/', $content, $matches)) {
            foreach ($matches[1] as $i => $withDiacritics) {
                $withoutDiacritics = $matches[2][$i];
                // Check if second param is actually without diacritics (not same as first)
                if ($withDiacritics === $withoutDiacritics && strpos($withDiacritics, 'România') !== false) {
                    $issues[] = basename($file) . " - Same diacritics: " . substr($withDiacritics, 0, 50);
                }
            }
        }
    }
    
    return $issues;
}

function processDirectory($dir) {
    $issues = [];
    $files = glob($dir . '/*.php');
    
    foreach ($files as $file) {
        $content = file_get_contents($file);
        
        // Check for old format: createAdresaCompleta("text") without array
        if (preg_match_all('/createAdresaCompleta\("([^"]+)"\)/', $content, $matches)) {
            $issues[] = basename($file) . " - Old format: " . count($matches[0]) . " times";
        }
        
        // Check for array format
        if (preg_match_all('/createAdresaCompleta\("([^"]+)", "([^"]+)"\)/', $content, $matches)) {
            foreach ($matches[1] as $i => $withDiacritics) {
                $withoutDiacritics = $matches[2][$i];
                if ($withDiacritics === $withoutDiacritics && strpos($withDiacritics, 'România') !== false) {
                    $issues[] = basename($file) . " - Same diacritics: " . substr($withDiacritics, 0, 50);
                }
            }
        }
    }
    
    return $issues;
}

$basePath = __DIR__ . '/ROMANIA';
$judete = glob($basePath . '/*', GLOB_ONLYDIR);

echo "Checking ALL PHP files in all counties...\n\n";

$totalIssues = 0;
foreach ($judete as $judet) {
    $name = basename($judet);
    $issues = processDirectory($judet);
    if (count($issues) > 0) {
        echo "=== $name ===\n";
        foreach ($issues as $issue) {
            echo "  $issue\n";
            $totalIssues++;
        }
        echo "\n";
    }
}

if ($totalIssues === 0) {
    echo "ALL 41 COUNTIES - ALL FILES: OK!\n";
} else {
    echo "Total issues: $totalIssues\n";
}
?>
