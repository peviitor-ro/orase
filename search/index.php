<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once __DIR__ . '/../util/functions.php';

$query = isset($_GET['q']) ? trim($_GET['q']) : '';

if (empty($query)) {
    echo json_encode(["error" => "Parametrul 'q' este obligatoriu"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$judeteMap = [
    'ALBA' => ["nume" => "Alba", "numeDiacritice" => "Alba", "cod" => "AB"],
    'ARAD' => ["nume" => "Arad", "numeDiacritice" => "Arad", "cod" => "AR"],
    'ARGES' => ["nume" => "Arges", "numeDiacritice" => "Argeș", "cod" => "AG"],
    'BACAU' => ["nume" => "Bacau", "numeDiacritice" => "Bacău", "cod" => "BC"],
    'BIHOR' => ["nume" => "Bihor", "numeDiacritice" => "Bihor", "cod" => "BH"],
    'BISTRITA-NASAUD' => ["nume" => "Bistrita-Nasaud", "numeDiacritice" => "Bistrița-Năsăud", "cod" => "BN"],
    'BOTOSANI' => ["nume" => "Botosani", "numeDiacritice" => "Botoșani", "cod" => "BT"],
    'BRASOV' => ["nume" => "Brasov", "numeDiacritice" => "Brașov", "cod" => "BV"],
    'BRAILA' => ["nume" => "Braila", "numeDiacritice" => "Brăila", "cod" => "BR"],
    'BUZAU' => ["nume" => "Buzau", "numeDiacritice" => "Buzău", "cod" => "BZ"],
    'CALARASI' => ["nume" => "Calarasi", "numeDiacritice" => "Călărași", "cod" => "CL"],
    'CARAS-SEVERIN' => ["nume" => "Caras-Severin", "numeDiacritice" => "Caraș-Severin", "cod" => "CS"],
    'CLUJ' => ["nume" => "Cluj", "numeDiacritice" => "Cluj", "cod" => "CJ"],
    'CONSTANTA' => ["nume" => "Constanta", "numeDiacritice" => "Constanța", "cod" => "CT"],
    'COVASNA' => ["nume" => "Covasna", "numeDiacritice" => "Covasna", "cod" => "CV"],
    'DAMBOVITA' => ["nume" => "Dambovita", "numeDiacritice" => "Dâmbovița", "cod" => "DB"],
    'DOLJ' => ["nume" => "Dolj", "numeDiacritice" => "Dolj", "cod" => "DJ"],
    'GALATI' => ["nume" => "Galati", "numeDiacritice" => "Galați", "cod" => "GL"],
    'GIURGIU' => ["nume" => "Giurgiu", "numeDiacritice" => "Giurgiu", "cod" => "GR"],
    'GORJ' => ["nume" => "Gorj", "numeDiacritice" => "Gorj", "cod" => "GJ"],
    'HARGHITA' => ["nume" => "Harghita", "numeDiacritice" => "Harghita", "cod" => "HR"],
    'HUNEDOARA' => ["nume" => "Hunedoara", "numeDiacritice" => "Hunedoara", "cod" => "HD"],
    'IALOMITA' => ["nume" => "Ialomita", "numeDiacritice" => "Ialomița", "cod" => "IL"],
    'IASI' => ["nume" => "Iasi", "numeDiacritice" => "Iași", "cod" => "IS"],
    'ILFOV' => ["nume" => "Ilfov", "numeDiacritice" => "Ilfov", "cod" => "IF"],
    'MARAMURES' => ["nume" => "Maramures", "numeDiacritice" => "Maramureș", "cod" => "MM"],
    'MEHEDINTI' => ["nume" => "Mehedinti", "numeDiacritice" => "Mehedinți", "cod" => "MH"],
    'MURES' => ["nume" => "Mures", "numeDiacritice" => "Mureș", "cod" => "MS"],
    'NEAMT' => ["nume" => "Neamt", "numeDiacritice" => "Neamț", "cod" => "NT"],
    'OLT' => ["nume" => "Olt", "numeDiacritice" => "Olt", "cod" => "OT"],
    'PRAHOVA' => ["nume" => "Prahova", "numeDiacritice" => "Prahova", "cod" => "PH"],
    'SALAJ' => ["nume" => "Salaj", "numeDiacritice" => "Sălaj", "cod" => "SJ"],
    'SATUMARE' => ["nume" => "Satumare", "numeDiacritice" => "Satu Mare", "cod" => "SM"],
    'SIBIU' => ["nume" => "Sibiu", "numeDiacritice" => "Sibiu", "cod" => "SB"],
    'SUCEAVA' => ["nume" => "Suceava", "numeDiacritice" => "Suceava", "cod" => "SV"],
    'TELEORMAN' => ["nume" => "Teleorman", "numeDiacritice" => "Teleorman", "cod" => "TR"],
    'TIMIS' => ["nume" => "Timis", "numeDiacritice" => "Timiș", "cod" => "TM"],
    'TULCEA' => ["nume" => "Tulcea", "numeDiacritice" => "Tulcea", "cod" => "TL"],
    'VALCEA' => ["nume" => "Valcea", "numeDiacritice" => "Vâlcea", "cod" => "VL"],
    'VASLUI' => ["nume" => "Vaslui", "numeDiacritice" => "Vaslui", "cod" => "VS"],
    'VRANCEA' => ["nume" => "Vrancea", "numeDiacritice" => "Vrancea", "cod" => "VN"],
    'BUCURESTI' => ["nume" => "Bucuresti", "numeDiacritice" => "București", "cod" => "B"]
];

$queryUpper = strtoupper($query);

// Search for judete first - exact match only
$judeteResults = [];
foreach ($judeteMap as $key => $judet) {
    $judetNumeUpper = strtoupper($judet['nume']);
    $judetDiacUpper = strtoupper($judet['numeDiacritice'] ?? $judet['nume']);
    
    if ($judetNumeUpper === $queryUpper || $judetDiacUpper === $queryUpper) {
        $judeteResults[] = $judet;
    }
}

$basePath = __DIR__ . '/../ROMANIA';

$judeteFolderMap = [
    'ALBA', 'ARAD', 'ARGES', 'BACAU', 'BIHOR', 'BISTRITA-NASAUD', 'BOTOSANI',
    'BRASOV', 'BRAILA', 'BUZAU', 'CALARASI', 'CARAS-SEVERIN', 'CLUJ', 'CONSTANTA',
    'COVASNA', 'DAMBOVITA', 'DOLJ', 'GALATI', 'GIURGIU', 'GORJ', 'HARGHITA', 
    'HUNEDOARA', 'IALOMITA', 'IASI', 'ILFOV', 'MARAMURES', 'MEHEDINTI', 'MURES', 
    'NEAMT', 'OLT', 'PRAHOVA', 'SALAJ', 'SATUMARE', 'SIBIU', 'SUCEAVA', 
    'TELEORMAN', 'TIMIS', 'TULCEA', 'VALCEA', 'VASLUI', 'VRANCEA', 'BUCURESTI'
];

$results = [];

foreach ($judeteFolderMap as $folderName) {
    $judetPath = $basePath . '/' . $folderName;
    if (!is_dir($judetPath)) continue;

    $judetData = $judeteMap[$folderName] ?? null;

    // Search in orase.php and municipii.php
    $files = ['orase.php', 'municipii.php'];
    foreach ($files as $file) {
        $filePath = $judetPath . '/' . $file;
        if (!file_exists($filePath)) continue;

        $content = file_get_contents($filePath);
        
        // Match oras/municipiu name
        $pattern = '/create(Oras|Municipiu)\("([^"]+)"/iu';
        if (preg_match_all($pattern, $content, $nameMatches)) {
            foreach ($nameMatches[2] as $orasName) {
                $orasNameUpper = strtoupper($orasName);
                $orasNameNoDiac = strtoupper(removeDiacritics($orasName));
                
                if ($orasNameUpper === $queryUpper || $orasNameNoDiac === $queryUpper) {
                    $tip = (strpos($file, 'municipii') !== false) ? 'municipiu' : 'oras';
                    $results[] = [
                        'type' => $tip,
                        'data' => [
                            'nume' => $orasName,
                            'tip' => $tip,
                            'judet' => $judetData
                        ]
                    ];
                }
            }
        }
    }

    // Search in comune.php - look for location names in adresaCompleta
    $comunaFilePath = $judetPath . '/comune.php';
    if (file_exists($comunaFilePath)) {
        $content = file_get_contents($comunaFilePath);
        
        // Find sat names in adresaCompleta - exact match only
        $pattern = '/createAdresaCompleta\("sat ([^,]+),/iu';
        if (preg_match_all($pattern, $content, $matches)) {
            foreach ($matches[1] as $satName) {
                $satNameUpper = strtoupper($satName);
                $satNameNoDiac = strtoupper(removeDiacritics($satName));
                
                if ($satNameUpper === $queryUpper || $satNameNoDiac === $queryUpper) {
                    $results[] = [
                        'type' => 'sat',
                        'data' => [
                            'nume' => $satName,
                            'tip' => 'sat',
                            'judet' => $judetData
                        ]
                    ];
                }
            }
        }
        
        // Also find comune names
        $pattern = '/createComuna\("([^"]+)"/iu';
        if (preg_match_all($pattern, $content, $matches)) {
            foreach ($matches[1] as $comunaName) {
                $comunaNameUpper = strtoupper($comunaName);
                $comunaNameNoDiac = strtoupper(removeDiacritics($comunaName));
                
                if ($comunaNameUpper === $queryUpper || $comunaNameNoDiac === $queryUpper) {
                    $results[] = [
                        'type' => 'comuna',
                        'data' => [
                            'nume' => $comunaName,
                            'tip' => 'comuna',
                            'judet' => $judetData
                        ]
                    ];
                }
            }
        }
    }
}

// Build final response
$allResults = [];

// Add judete first
foreach ($judeteResults as $j) {
    $allResults[] = [
        'type' => 'judet',
        'data' => $j
    ];
}

// Add other results
foreach ($results as $r) {
    $allResults[] = $r;
}

if (count($allResults) === 0) {
    $response = ["results" => [], "message" => "Nu s-au găsit rezultate pentru '$query'"];
} else {
    $response = ["results" => $allResults];
}

echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
