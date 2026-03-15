<?php
$orase = [

    createOras("ARDUD", [
				createAdresaCompleta("SATU MARE"),
        createLoc("ARDUD", "oras", [
            createLoc("Ardud-Vii", "sat"),
            createLoc("Baba Novac", "sat"),
            createLoc("Gerăușa", "sat"),
            createLoc("Sărătura", "sat"),

        ]),
        createLoc("Mădăras", "sat"),

    ]),

    createOras("LIVADA", [
				createAdresaCompleta("SATU MARE"),
        createLoc("LIVADA", "oras"),
        createLoc("Adrian", "sat"),
        createLoc("Dumbrava", "sat"),
        createLoc("Livada Mică", "sat"),
    ]),

    createOras("NEGREȘTI-OAȘ", [
				createAdresaCompleta("SATU MARE"),
        createLoc("NEGREȘTI-OAȘ", "oras"),
        createLoc("Luna", "sat"),
        createLoc("Tur", "sat"),
    ]),

    createOras("TĂȘNAD", [
				createAdresaCompleta("SATU MARE"),
        createLoc("TĂȘNAD", "oras"),
        [
            createLoc("Blaja", "sat"),
            createLoc("Cig", "sat"),
            createLoc("Rațiu", "sat"),
            createLoc("Sărăuad", "sat"),
            createLoc("Valea Morii", "sat"),
        ]

    ]),


];
