<?php
// test on https://onlinephp.io/
// based on https://legislatie.just.ro/Public/DetaliiDocument/189
// created by sebiboga && dianadascalu2




require_once "functions.php";

require_once "BUCURESTI/bucuresti.php";

require_once "ALBA/alba.php";
require_once "ARAD/arad.php";
require_once "ARGES/arges.php";

$judete = [$alba,$arad,$arges];

// aici cream Romania
$tara = createTara(
    "LEGE nr. 2 din 16 februarie 1968",
    "https://legislatie.just.ro/Public/DetaliiDocument/189",
    "România",$judete,$municipii);
	
echo json_encode($tara, JSON_PRETTY_PRINT);
?>