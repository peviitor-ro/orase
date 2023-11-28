<?php
// test on https://onlinephp.io/
// based on https://legislatie.just.ro/Public/DetaliiDocument/189
// created by sebiboga 


$tara = new stdClass();
$tara -> proiect = "LEGE nr. 2 din 16 februarie 1968";
$tara -> url = "https://legislatie.just.ro/Public/DetaliiDocument/189";
$tara -> nume = "România";
$tara -> judet = array();
$tara -> judet[1] = new stdClass();
$tara -> judet[1] -> nume = "ALBA";
$tara -> judet[1] -> municipiu = array();
$tara -> judet[1] -> municipiu[1] = new stdClass();;
$tara -> judet[1] -> municipiu[1] -> nume = "ALBA IULIA";
$tara -> judet[1] -> municipiu[1] -> loc = array();
$tara -> judet[1] -> municipiu[1] -> loc[1] = "ALBA IULIA";
$tara -> judet[1] -> municipiu[1] -> loc[2] = "Bărăbanț";
$tara -> judet[1] -> municipiu[1] -> loc[3] = "Micești";
$tara -> judet[1] -> municipiu[1] -> loc[4] = "Oarda";
$tara -> judet[1] -> municipiu[1] -> loc[4] = "Pâclișa";

$tara -> judet[1] -> municipiu[2] = "AIUD";
$tara -> judet[1] -> municipiu[3] = "BLAJ";
$tara -> judet[1] -> municipiu[4] = "SEBES";
$tara -> judet[1] -> nume = "ALBA";

$tara -> judet[2] = new stdClass();
$tara -> judet[2] -> nume = "ARAD";
echo json_encode($tara);

?>
