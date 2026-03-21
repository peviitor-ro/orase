<?php

function removeDiacritics($text) {
    $diacritics = [
        'ă' => 'a', 'â' => 'a', 'ș' => 's', 'ț' => 't', 'î' => 'i',
        'Ă' => 'A', 'Â' => 'A', 'Ș' => 'S', 'Ț' => 'T', 'Î' => 'I',
        'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
        'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U'
    ];
    return strtr($text, $diacritics);
}

function createAdresaCompleta($textWithDiacritics, $textWithoutDiacritics = null) {
    if ($textWithoutDiacritics === null) {
        $textWithoutDiacritics = removeDiacritics($textWithDiacritics);
    }
    return [$textWithDiacritics, $textWithoutDiacritics];
}

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


function createComuna($nume, $locuri = [], $adresaCompleta = null) {
    $comuna = new stdClass();
    $comuna->nume = $nume;
    $comuna->loc = $locuri;
    if ($adresaCompleta !== null) {
        $comuna->adresaCompleta = $adresaCompleta;
    }
    return $comuna;
}

function createOras($nume, $locuri = [], $adresaCompleta = null) {
    $oras = new stdClass();
    $oras->nume = $nume;
    $oras->loc = $locuri;
    if ($adresaCompleta !== null) {
        $oras->adresaCompleta = $adresaCompleta;
    }
    return $oras;
}

function createMunicipiu($nume, $locuri = [], $adresaCompleta = null) {
    $municipiu = new stdClass();
    $municipiu->nume = $nume;
    $municipiu->loc = $locuri;
    if ($adresaCompleta !== null) {
        $municipiu->adresaCompleta = $adresaCompleta;
    }
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

?>