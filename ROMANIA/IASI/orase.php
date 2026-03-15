<?php
$orase = [
    createOras("HÂRLĂU", [
				createAdresaCompleta("IASI", "IASI"),
        createLoc("HÂRLĂU", "oras", [
            createLoc("Pârcovaci", "sat"),
        ]),
    ]),

    createOras("PODU ILOAIEI", [
				createAdresaCompleta("IASI", "IASI"),
        createLoc("Podu Iloaiei", "sat", [
            createLoc("Cosițeni", "sat"),
            
            createLoc("Holm", "sat"),
            createLoc("Scobâlțeni", "sat"),
        ]),
	       createLoc("Budăi", "sat"),
    ]),

    createOras("TÂRGU FRUMOS", [
				createAdresaCompleta("IASI", "IASI"),
        createLoc("TÂRGU FRUMOS", "oras"),
    ]),
];

?>
