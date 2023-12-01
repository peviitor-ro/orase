<?php
// test on https://onlinephp.io/
// based on https://legislatie.just.ro/Public/DetaliiDocument/189
// created by sebiboga && dianadascalu2



require_once 'ALBA/index.php';

$judete = [$alba];

// aici cream Romania
$tara = createTara(
    "LEGE nr. 2 din 16 februarie 1968",
    "https://legislatie.just.ro/Public/DetaliiDocument/189",
    "România",$judete,$municipii);
	
echo json_encode($tara, JSON_PRETTY_PRINT);
?>