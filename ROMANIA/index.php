<?php
// test on https://onlinephp.io/
// based on https://legislatie.just.ro/Public/DetaliiDocument/189
// created by sebiboga && dianadascalu2

function createLoc($nume, $tip, $locuri = []) {
    $loc = new stdClass();
    $loc->nume = $nume;
    $loc->tip = $tip;

    // Set the loc property only if $locuri is defined and not an empty array
    if (!empty($locuri)) {
        $loc->loc = $locuri;
    }

    return $loc;
}


function createComuna($nume, $locuri = []) {
    $comuna = new stdClass();
    $comuna->nume = $nume;
    $comuna->loc = $locuri;
    return $comuna;
}

function createOras($nume, $locuri = []) {
    $oras = new stdClass();
    $oras->nume = $nume;
    $oras->loc = $locuri;
    return $oras;
}

function createMunicipiu($nume, $locuri = []) {
    $municipiu = new stdClass();
    $municipiu->nume = $nume;
    $municipiu->loc = $locuri;
    return $municipiu;
}

function createJudet($nume, $municipii = [], $orase = [], $comune = []) {
    $judet = new stdClass();
    $judet->nume = $nume;
    $judet->municipiu = $municipii;
	$judet->oras = $orase;
	$judet->comuna = $comune;
    return $judet;
}

function createTara($proiect, $url, $nume, $judete = [], $municipii = []) {
    $tara = new stdClass();
    $tara->proiect = $proiect;
    $tara->url = $url;
    $tara->nume = $nume;
    $tara->judet = $judete;
	$tara->municipiu = $municipii;
    return $tara;
}


// aici cream Romania
$tara = createTara(
    "LEGE nr. 2 din 16 februarie 1968",
    "https://legislatie.just.ro/Public/DetaliiDocument/189",
    "România",$judete,$municipii);
	
echo json_encode($tara, JSON_PRETTY_PRINT);
?>