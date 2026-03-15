<?php
$orase = [
    createOras("HÂRLĂU", [
				createAdresaCompleta("orasul HÂRLĂU, judetul IASI, România", "orasul HARLAU, judetul IASI, Romania"),
        createLoc("HÂRLĂU", "oras", [
            createLoc("Pârcovaci", "sat"),
        ]),
    ]),

    createOras("PODU ILOAIEI", [
				createAdresaCompleta("orasul HÂRLĂU, judetul IASI, România", "orasul HARLAU, judetul IASI, Romania"),
        createLoc("Podu Iloaiei", "sat", [
            createLoc("Cosițeni", "sat"),
            
            createLoc("Holm", "sat"),
            createLoc("Scobâlțeni", "sat"),
        ]),
	       createLoc("Budăi", "sat"),
    ]),

    createOras("TÂRGU FRUMOS", [
				createAdresaCompleta("orasul HÂRLĂU, judetul IASI, România", "orasul HARLAU, judetul IASI, Romania"),
        createLoc("TÂRGU FRUMOS", "oras"),
    ]),
];

?>
