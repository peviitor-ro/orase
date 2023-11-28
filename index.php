<?php
// test on https://onlinephp.io/
// based on https://legislatie.just.ro/Public/DetaliiDocument/189
// created by sebiboga 

function createLoc($nume, $tip) {
    $loc = new stdClass();
    $loc->nume = $nume;
    $loc->tip = $tip;
    return $loc;
}

function createMunicipiu($nume, $locuri = []) {
    $municipiu = new stdClass();
    $municipiu->nume = $nume;
    $municipiu->loc = $locuri;
    return $municipiu;
}

function createJudet($nume, $municipii = []) {
    $judet = new stdClass();
    $judet->nume = $nume;
    $judet->municipiu = $municipii;
    return $judet;
}

function createTara($proiect, $url, $nume, $judete = []) {
    $tara = new stdClass();
    $tara->proiect = $proiect;
    $tara->url = $url;
    $tara->nume = $nume;
    $tara->judet = $judete;
    return $tara;
}

$tara = createTara(
    "LEGE nr. 2 din 16 februarie 1968",
    "https://legislatie.just.ro/Public/DetaliiDocument/189",
    "România",
    [
        createJudet(
            "ALBA",
            [
                createMunicipiu("ALBA IULIA", [
                    createLoc("ALBA IULIA", "oras"),
                    createLoc("Bărăbanț", "sat"),
                    createLoc("Micești", "sat"),
                    createLoc("Oarda", "sat"),
                    createLoc("Pâclișa", "sat"),
                ]),
                createMunicipiu("AIUD"),
                createMunicipiu("BLAJ"),
                createMunicipiu("SEBES"),
            ]
        ),
        createJudet("ARAD"),
    ]
);

echo json_encode($tara, JSON_PRETTY_PRINT);

?>