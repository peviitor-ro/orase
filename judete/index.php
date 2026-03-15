<?php
header("Access-Control-Allow-Origin: *");

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

$result = ["judete" => $judete];

echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
