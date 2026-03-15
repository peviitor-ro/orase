<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$query = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';

if (empty($query)) {
    echo json_encode(["error" => "Parametrul 'q' este obligatoriu"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

$judete = [
    ["nume" => "Alba", "numeDiacritice" => "Alba", "cod" => "AB"],
    ["nume" => "Arad", "numeDiacritice" => "Arad", "cod" => "AR"],
    ["nume" => "Arges", "numeDiacritice" => "Argeș", "cod" => "AG"],
    ["nume" => "Bacau", "numeDiacritice" => "Bacău", "cod" => "BC"],
    ["nume" => "Bihor", "numeDiacritice" => "Bihor", "cod" => "BH"],
    ["nume" => "Bistrita-Nasaud", "numeDiacritice" => "Bistrița-Năsăud", "cod" => "BN"],
    ["nume" => "Botosani", "numeDiacritice" => "Botoșani", "cod" => "BT"],
    ["nume" => "Brasov", "numeDiacritice" => "Brașov", "cod" => "BV"],
    ["nume" => "Braila", "numeDiacritice" => "Brăila", "cod" => "BR"],
    ["nume" => "Buzau", "numeDiacritice" => "Buzău", "cod" => "BZ"],
    ["nume" => "Calarasi", "numeDiacritice" => "Călărași", "cod" => "CL"],
    ["nume" => "Caras-Severin", "numeDiacritice" => "Caraș-Severin", "cod" => "CS"],
    ["nume" => "Cluj", "numeDiacritice" => "Cluj", "cod" => "CJ"],
    ["nume" => "Constanta", "numeDiacritice" => "Constanța", "cod" => "CT"],
    ["nume" => "Covasna", "numeDiacritice" => "Covasna", "cod" => "CV"],
    ["nume" => "Dambovita", "numeDiacritice" => "Dâmbovița", "cod" => "DB"],
    ["nume" => "Dolj", "numeDiacritice" => "Dolj", "cod" => "DJ"],
    ["nume" => "Galati", "numeDiacritice" => "Galați", "cod" => "GL"],
    ["nume" => "Giurgiu", "numeDiacritice" => "Giurgiu", "cod" => "GR"],
    ["nume" => "Gorj", "numeDiacritice" => "Gorj", "cod" => "GJ"],
    ["nume" => "Harghita", "numeDiacritice" => "Harghita", "cod" => "HR"],
    ["nume" => "Hunedoara", "numeDiacritice" => "Hunedoara", "cod" => "HD"],
    ["nume" => "Ialomita", "numeDiacritice" => "Ialomița", "cod" => "IL"],
    ["nume" => "Iasi", "numeDiacritice" => "Iași", "cod" => "IS"],
    ["nume" => "Ilfov", "numeDiacritice" => "Ilfov", "cod" => "IF"],
    ["nume" => "Maramures", "numeDiacritice" => "Maramureș", "cod" => "MM"],
    ["nume" => "Mehedinti", "numeDiacritice" => "Mehedinți", "cod" => "MH"],
    ["nume" => "Mures", "numeDiacritice" => "Mureș", "cod" => "MS"],
    ["nume" => "Neamt", "numeDiacritice" => "Neamț", "cod" => "NT"],
    ["nume" => "Olt", "numeDiacritice" => "Olt", "cod" => "OT"],
    ["nume" => "Prahova", "numeDiacritice" => "Prahova", "cod" => "PH"],
    ["nume" => "Salaj", "numeDiacritice" => "Sălaj", "cod" => "SJ"],
    ["nume" => "Satumare", "numeDiacritice" => "Satu Mare", "cod" => "SM"],
    ["nume" => "Sibiu", "numeDiacritice" => "Sibiu", "cod" => "SB"],
    ["nume" => "Suceava", "numeDiacritice" => "Suceava", "cod" => "SV"],
    ["nume" => "Teleorman", "numeDiacritice" => "Teleorman", "cod" => "TR"],
    ["nume" => "Timis", "numeDiacritice" => "Timiș", "cod" => "TM"],
    ["nume" => "Tulcea", "numeDiacritice" => "Tulcea", "cod" => "TL"],
    ["nume" => "Valcea", "numeDiacritice" => "Vâlcea", "cod" => "VL"],
    ["nume" => "Vaslui", "numeDiacritice" => "Vaslui", "cod" => "VS"],
    ["nume" => "Vrancea", "numeDiacritice" => "Vrancea", "cod" => "VN"],
    ["nume" => "Bucuresti", "numeDiacritice" => "București", "cod" => "B"]
];

$judeteResults = [];
foreach ($judete as $judet) {
    if (
        strpos(strtolower($judet['nume']), $query) !== false ||
        strpos(strtolower($judet['numeDiacritice']), $query) !== false ||
        strpos(strtolower($judet['cod']), $query) !== false
    ) {
        $judeteResults[] = $judet;
    }
}

$judeteMap = [];
foreach ($judete as $judet) {
    $judeteMap[strtoupper($judet['nume'])] = $judet;
}

$judeteFolderMap = [
    'ALBA' => 'Alba', 'ARAD' => 'Arad', 'ARGES' => 'Arges', 'BACAU' => 'Bacau',
    'BIHOR' => 'Bihor', 'BISTRITA-NASAUD' => 'Bistrita-Nasaud', 'BOTOSANI' => 'Botosani',
    'BRASOV' => 'Brasov', 'BRAILA' => 'Braila', 'BUZAU' => 'Buzau', 'CALARASI' => 'Calarasi',
    'CARAS-SEVERIN' => 'Caras-Severin', 'CLUJ' => 'Cluj', 'CONSTANTA' => 'Constanta',
    'COVASNA' => 'Covasna', 'DAMBOVITA' => 'Dambovita', 'DOLJ' => 'Dolj', 'GALATI' => 'Galati',
    'GIURGIU' => 'Giurgiu', 'GORJ' => 'Gorj', 'HARGHITA' => 'Harghita', 'HUNEDOARA' => 'Hunedoara',
    'IALOMITA' => 'Ialomita', 'IASI' => 'Iasi', 'ILFOV' => 'Ilfov', 'MARAMURES' => 'Maramures',
    'MEHEDINTI' => 'Mehedinti', 'MURES' => 'Mures', 'NEAMT' => 'Neamt', 'OLT' => 'Olt',
    'PRAHOVA' => 'Prahova', 'SALAJ' => 'Salaj', 'SATUMARE' => 'Satumare', 'SIBIU' => 'Sibiu',
    'SUCEAVA' => 'Suceava', 'TELEORMAN' => 'Teleorman', 'TIMIS' => 'Timis', 'TULCEA' => 'Tulcea',
    'VALCEA' => 'Valcea', 'VASLUI' => 'Vaslui', 'VRANCEA' => 'Vrancea', 'BUCURESTI' => 'Bucuresti'
];

$oraseResults = [];
$basePath = __DIR__ . '/../ROMANIA';

foreach ($judeteFolderMap as $folderName => $judetNume) {
    $judetPath = $basePath . '/' . $folderName;
    if (!is_dir($judetPath)) continue;

    $files = ['orase.php', 'municipii.php'];
    foreach ($files as $file) {
        $filePath = $judetPath . '/' . $file;
        if (!file_exists($filePath)) continue;

        $content = file_get_contents($filePath);
        
        $pattern = '/create(Oras|Municipiu)\("([^"]+)"/i';
        if (preg_match_all($pattern, $content, $matches)) {
            foreach ($matches[2] as $orasName) {
                $orasNameLower = strtolower($orasName);
                if (strpos($orasNameLower, $query) !== false) {
                    $tip = (strpos($file, 'municipii') !== false) ? 'municipiu' : 'oras';
                    $oraseResults[] = [
                        'nume' => $orasName,
                        'tip' => $tip,
                        'judet' => $judeteMap[$judetNume]
                    ];
                }
            }
        }
    }
}

$allResults = [];

if (count($judeteResults) === 1) {
    $allResults[] = [
        'type' => 'judet',
        'data' => $judeteResults[0]
    ];
} elseif (count($judeteResults) > 1) {
    foreach ($judeteResults as $j) {
        $allResults[] = [
            'type' => 'judet',
            'data' => $j
        ];
    }
}

if (count($oraseResults) === 1) {
    $allResults[] = [
        'type' => $oraseResults[0]['tip'],
        'data' => $oraseResults[0]
    ];
} elseif (count($oraseResults) > 1) {
    foreach ($oraseResults as $o) {
        $allResults[] = [
            'type' => $o['tip'],
            'data' => $o
        ];
    }
}

if (count($allResults) === 0) {
    $response = ["results" => [], "message" => "Nu s-au găsit rezultate pentru '$query'"];
} else {
    $response = ["results" => $allResults];
}

echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
