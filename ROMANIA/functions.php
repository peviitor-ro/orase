<?php

if (!function_exists('createLoc')) {
function createLoc($nume, $tip, $locuri = [], $adresaCompleta = null) {
    $loc = new stdClass();
    $loc->nume = $nume;
    $loc->tip = $tip;

    if (!empty($locuri)) {
        $loc->localitate = $locuri;
    }

    if ($adresaCompleta !== null) {
        $loc->adresaCompleta = $adresaCompleta;
    }

    return $loc;
}
}


if (!function_exists('createComuna')) {
function createComuna($nume, $locuri = [], $adresaCompleta = null) {
    $comuna = new stdClass();
    $comuna->nume = $nume;
    $comuna->localitate = $locuri;
    if ($adresaCompleta !== null) {
        $comuna->adresaCompleta = $adresaCompleta;
    }
    return $comuna;
}
}

if (!function_exists('createOras')) {
function createOras($nume, $locuri = [], $adresaCompleta = null) {
    $oras = new stdClass();
    $oras->nume = $nume;
    $oras->localitate = $locuri;
    if ($adresaCompleta !== null) {
        $oras->adresaCompleta = $adresaCompleta;
    }
    return $oras;
}
}


if (!function_exists('createAdresaCompleta')) {
function createAdresaCompleta($adresaCuDiacritice) {
    $adresaFaraDiacritice = str_replace(
        ['ă', 'â', 'ș', 'ț', 'Ă', 'Â', 'Ș', 'Ț', 'é', 'É', 'î', 'Î'],
        ['a', 'a', 's', 't', 'A', 'A', 'S', 'T', 'e', 'E', 'i', 'I'],
        $adresaCuDiacritice
    );
    return [$adresaCuDiacritice, $adresaFaraDiacritice];
}
}

if (!function_exists('createMunicipiu')) {
function createMunicipiu($nume, $locuri = [], $adresaCompleta = null) {
    $municipiu = new stdClass();
    $municipiu->nume = $nume;
	
	   if (!empty($locuri)) {
        $municipiu->localitate = $locuri;
    }
    
    if ($adresaCompleta !== null) {
        $municipiu->adresaCompleta = $adresaCompleta;
    }
 
    return $municipiu;
}
}


if (!function_exists('createJudet')) {
function createJudet($nume, $municipii = [], $orase = [], $comune = []) {
    $judet = new stdClass();
    $judet->nume = $nume;
    $judet->municipiu = $municipii;
	$judet->oras = $orase;
	$judet->comuna = $comune;
    return $judet;
}
}

if (!function_exists('createTara')) {
function createTara($proiect, $url, $nume, $judete = [], $municipii = []) {
    $tara = new stdClass();
    $tara->proiect = $proiect;
    $tara->url = $url;
    $tara->nume = $nume;
    $tara->judet = $judete;
	$tara->municipiu = $municipii;
    return $tara;
}
}


if (!function_exists('createBucuresti')) {
function createBucuresti($nume, $locuri = []) {
    $municipiu = new stdClass();
    $municipiu->nume = $nume;
	
	   if (!empty($locuri)) {
        $municipiu->sector = $locuri;
    }
 
    return $municipiu;
}
}

?>