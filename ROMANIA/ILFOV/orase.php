<?php
$orase = [
    createOras("BRAGADIRU", [
				createAdresaCompleta("ILFOV"),
        createLoc("BRAGADIRU", "oras"),
    ]),

    createOras("BUFTEA", [
				createAdresaCompleta("ILFOV"),
        createLoc("BUFTEA", "oras", [
            createLoc("Buciumeni", "sat"),
        ]),
    ]),

    createOras("CHITILA", [
				createAdresaCompleta("ILFOV"),
        createLoc("CHITILA", "oras"),
        createLoc("Rudeni", "sat"),
    ]),

    createOras("MĂGURELE", [
				createAdresaCompleta("ILFOV"),
        createLoc("MĂGURELE", "oras"),
        createLoc("Alunișu", "sat"),
        createLoc("Dumitrana", "sat"),
        createLoc("Pruni", "sat"),
        createLoc("Vârteju", "sat"),
    ]),

    createOras("OTOPENI", [
				createAdresaCompleta("ILFOV"),
        createLoc("OTOPENI", "oras", [
            createLoc("Odăile", "sat"),
        ]),
    ]),

    createOras("PANTELIMON", [
				createAdresaCompleta("ILFOV"),
        createLoc("PANTELIMON", "oras"),
    ]),

    createOras("POPEȘTI-LEORDENI", [
				createAdresaCompleta("ILFOV"),
        createLoc("POPEȘTI-LEORDENI", "oras"),
    ]),

    createOras("VOLUNTARI", [
				createAdresaCompleta("ILFOV"),
        createLoc("VOLUNTARI", "oras"),
    ]),
];


?>
