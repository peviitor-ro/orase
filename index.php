<?php
// test on https://onlinephp.io/
// based on https://legislatie.just.ro/Public/DetaliiDocument/189
// created by sebiboga 

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

function createJudet($nume, $municipii = [], $orase = []) {
    $judet = new stdClass();
    $judet->nume = $nume;
    $judet->municipiu = $municipii;
	$judet->oras = $orase;
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
                createMunicipiu("AIUD",[
				    createLoc("AIUD", "oras",[
					   createLoc("Ciumbrud", "sat"),
					   createLoc("Gârbova de Jos", "sat"),
					   createLoc("Gârbova de Sus", "sat"),
					   createLoc("Gârbovița", "sat"),
					   createLoc("Sâncrai", "sat"),
					   createLoc("Țifra", "sat"),
					                         ]),
					createLoc("Aiudul de Sus", "sat"),
					createLoc("Gâmbaș", "sat"),
					createLoc("Măgina", "sat"),
					createLoc("Păgida", "sat"),
				]),
                createMunicipiu("BLAJ",[
					createLoc("BLAJ", "oras",[
					       createLoc("Mănărade", "sat"),
					       createLoc("Spătac", "sat"),	   
					                             ]),
					createLoc("Deleni-Obârșie", "sat"),
					createLoc("Flitești", "sat"),
					createLoc("Izvoarele", "sat"),
					createLoc("Petrisat", "sat"),
					createLoc("Tiur", "sat"),
					createLoc("Veza", "sat"),
				          ]),
                createMunicipiu("SEBEȘ",[
				    createLoc("SEBEȘ", "oras",[
					      createLoc("Răhău", "sat"),
					    ]),
					createLoc("Lancrăm", "sat"),
					createLoc("Petrești", "sat"),
				]),
				
            ],
			[
			createOras("ABRUD",[
			    createLoc("ABRUD", "oras"),
				createLoc("Abrud-Sat", "sat"),
				createLoc("Gura Cornei", "sat"),
				createLoc("Soharu", "sat"),
			                   ]),
			createOras("BAIA DE ARIEȘ",[
			    createLoc("BAIA DE ARIEȘ", "oras",[
				     createLoc("Brăzești", "sat"),
					 createLoc("Cioara de Sus", "sat"),
					 createLoc("Muncelu", "sat"),
					 createLoc("Sartăș", "sat"),
					 createLoc("Simulești", "sat"),
				                                  ]),
				
			                             ]),
			createOras("CÂMPENI", [
			    createLoc("CÂMPENI", "oras"),
				createLoc("Boncești", "sat"),
				createLoc("Borlești", "sat"),
				createLoc("Botești", "sat"),
				createLoc("Certege", "sat"),
				createLoc("Coasta Vâscului", "sat"),
				createLoc("Dănduț", "sat"),
				createLoc("Dealu Bistrii", "sat"),
				createLoc("Dealu Capsei", "sat"),
				createLoc("Dric", "sat"),
				createLoc("Fața Abrudului", "sat"),
				createLoc("Florești", "sat"),
				createLoc("Furduiești", "sat"),
				createLoc("Mihoești", "sat"),
				createLoc("Motorăști", "sat"),
				createLoc("Peste Valea Bistrii", "sat"),
				createLoc("Poduri", "sat"),
				createLoc("Sorlița", "sat"),
				createLoc("Tomușești", "sat"),
				createLoc("Valea Bistrii", "sat"),
				createLoc("Valea Caselor", "sat"),
				createLoc("Vârși", "sat"),
			                     ])
			]
        ),
        createJudet("ARAD"),
    ]
);

echo json_encode($tara, JSON_PRETTY_PRINT);

?>