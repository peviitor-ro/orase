<?php

if (!function_exists('createLoc')) {
function createLoc($nume, $tip, $locuri = []) {
    $loc = new stdClass();
    $loc->nume = $nume;
    $loc->tip = $tip;

    // Set the loc property only if $locuri is defined and not an empty array
    if (!empty($locuri)) {
        $localitate->loc = $locuri;
    }

    return $loc;
}
}


if (!function_exists('createComuna')) {
function createComuna($nume, $locuri = []) {
    $comuna = new stdClass();
    $comuna->nume = $nume;
    $comuna->loc = $locuri;
    return $comuna;
}
}

if (!function_exists('createOras')) {
function createOras($nume, $locuri = []) {
    $oras = new stdClass();
    $oras->nume = $nume;
    $oras->loc = $locuri;
    return $oras;
}
}


if (!function_exists('createMunicipiu')) {
function createMunicipiu($nume, $locuri = []) {
    $municipiu = new stdClass();
    $municipiu->nume = $nume;
	
	   if (!empty($locuri)) {
        $municipiu->loc = $locuri;
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